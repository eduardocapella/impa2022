<?php

function exibeAgenda() {
	?>
	<ul id="agenda" class="row">
		<?php
		$today = date( 'd-m-Y g:i a' );
		// echo $today;
		// echo '<br>';

		// NÃO USAR / / nas datas ao querer comparar datas
		// O ERRO ESTÁ AQUI!! A conversão da data de hoje para timestamp que gera uma data alucicrazy
		$today_int = strtotime( $today );
		// print_r( $today_int );

		$the_query = new WP_Query(array(
			'post_type'			=> array( 'defesa-de-tese', 'eventos-cientificos' ),
			'posts_per_page'	=> -1,
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key'     => 'evento_data_de_inicio',
					'type' 	 => 'DATE',
					'value'   => $today_int,
					'compare' => '>',
				),
				array(
					'key'     => 'dt_datas_data_da_defesa',
					'type' 	 => 'DATE',
					'value'   => $today_int,
					'compare' => '>',
				),
			),
			'orderby'			=> 'meta_value',
			'order'				=> 'ASC'
		));

		$seminarios = busca_seminarios();
		print_r( $seminarios );

		foreach ( $seminarios as $seminario ) {
			$sem_obj             = new stdClass();
			$sem_obj->ID         = '0';
			$sem_obj->sem_obj    = $seminario->id;
			$sem_obj->post_title = $seminario->titulo;
			$sem_obj->post_type  = 'seminario';

			$sem_obj->post_date  = wp_convert_to_timezone( $seminario->dataHora, wp_timezone_string() );
			$sem_obj->post_date = date( 'd/m/Y g:i a', strtotime( $sem_obj->post_date ) );

			array_push( $the_query->posts, $sem_obj );
		}


		// Insere os seminários ordenando pela data.
		usort( $the_query->posts, function ( $a, $b ) {

			if ( $a->post_type == 'eventos-cientificos' ) {
				$data_a = get_field( 'evento_data_de_inicio', $a->ID );
			} else if ( $a->post_type == 'defesa-de-tese' ) {
				$data_a = get_field( 'dt_datas_data_da_defesa', $a->ID );
			} else {
				$data_a = $a->post_date;
			}

			$data_a = DateTime::createFromFormat( 'd/m/Y g:i a', $data_a );
			$data_a = $data_a->getTimestamp();

			if ( $b->post_type == 'eventos-cientificos' ) {
				$data_b = get_field( 'evento_data_de_inicio', $b->ID );
			} else if ( $b->post_type == 'defesa-de-tese' ) {
				$data_b = get_field( 'dt_datas_data_da_defesa', $b->ID );
			} else {
				$data_b = $b->post_date;
			}

			$data_b = DateTime::createFromFormat( 'd/m/Y g:i a', $data_b );
			$data_b = $data_b->getTimestamp();

			return $data_a - $data_b;
		});

		if ( $the_query->have_posts() ) :

			foreach ( $the_query->posts as $post ) :

					if( get_field( 'evento_data_de_inicio', $post->ID ) ) {
						$class = 'evento';
						$data = get_field( 'evento_data_de_inicio', $post->ID );
						$linha = get_field( 'evento_local_do_evento', $post->ID );
						$linha1 = $linha[ 'local' ];

					} else if( get_field( 'dt_datas_data_da_defesa', $post->ID ) ) {
						$class = 'educacao';
						$data = get_field( 'dt_datas_data_da_defesa', $post->ID );
					} else {
						$class = 'educacao seminario';
						$data  = $post->post_date;
					}

					$data_obj   = DateTime::createFromFormat( 'd/m/Y g:i a', $data );
					$data_num   = $data_obj->getTimestamp();
					$data_day   = $data_obj->format( 'd' );
					$data_month = $data_obj->format( 'M' );
					$data_year  = $data_obj->format( 'Y' );

					if( $today_int > $data_num ) {
						// echo 'Já ocorreu';
						continue;
					}
					?>
					<li class="col-sm-4">
						<div class="header">
							<div class="data">
								<time class="year"><?php echo $data_year; ?></time>
								<time class="day"><?php echo $data_day; ?></time>
								<time class="month"><?php echo $data_month; ?></time>
							</div>
							<!-- /.data -->
						</div>
						<!-- /.header -->
						<h3 class="<?php echo $class; ?>"><?php echo $post->post_title; ?></h3>
						<?php if( $linha1 ) {
							echo '<p>' . $linha1 . '</p>';
						} ?>
					</li>
					<?php

			endforeach;

		endif;

		?>
	</ul>
	<!-- /#agenda -->
	<?php
}

function busca_seminarios() {

	$cacheLive = 600; // 600 s = 10 minutos
	$cacheDate = get_option( 'seminarios_data' );
	$cache     = get_option( 'seminarios_cache' );

	if ( empty( $cacheDate ) || empty( $cache ) || ( $cacheDate + $cacheLive ) < time() ) {

		$sem_url = 'https://seminarios.impa.br/seminario/proximos';

		$response   = wp_remote_get( $sem_url );
		$seminarios = wp_remote_retrieve_body( $response );

		if ( empty( $seminarios ) ) {
			$seminarios = $cache;
		}

		update_option( 'seminarios_cache', $seminarios );
		update_option( 'seminarios_data', time() );

	} else {

		$seminarios = $cache;
	}

	$seminarios = json_decode( $seminarios );

	if ( ! empty( $seminarios->seminarios ) ) {
		return (array) $seminarios->seminarios;
	} else {
		return array();
	}

}


/**
 * wp_convert_to_timezone useful for adjusting an imported DateTime to your site GMT/UTC offset
 *
 * @link http://www.php.net/manual/en/timezones.php Accepted $timezone strings
 * @link http://www.cs.tut.fi/~jkorpela/iso8601.html Reason for default return as ISO 8601
 *
 * @param string $datetime
 * @param string $timezone default GMT
 * @param string $return_format default ISO 8601
 * @return string $datetime as $return_format
 */
function wp_convert_to_timezone( $datetime, $timezone = 'GMT', $return_format = 'c' ){

	// get site timezone offset
	$gmt_offset = get_option( 'gmt_offset' );

	// setup date object with timezone
	$datetime_obj = new DateTime( $datetime, new DateTimeZone( $timezone ) );

	// reset date timezone to be neutral for offset
	$datetime_obj->setTimezone(new DateTimeZone('GMT'));

	// modify the timezone with offset
	$datetime_obj->modify( $gmt_offset . ' hours' );

	// return datetime
	$datetime = $datetime_obj->format( $return_format );

	return $datetime;
}
