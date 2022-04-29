<?php

function exibeSeminarios2() {
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


		$seminarios = busca_seminarios2();
		// print_r( $seminarios );
		
		if ( !empty( $seminarios) ) {
			foreach ( $seminarios as $seminario ) {
				$sem_obj             = new stdClass();
				$sem_obj->ID         = '0';
				$sem_obj->sem_obj    = $seminario->id;
				$sem_obj->post_title = $seminario->titulo;
				$sem_obj->post_type  = 'seminario';
				$sem_obj->local	   = $seminario->local;
				$sem_obj->expositor  = $seminario->expositor;
				$sem_obj->area 		= $seminario->area;
				$sem_obj->instituicaoExpositor = $seminario->instituicaoExpositor;
				
	
				$sem_obj->post_date  = wp_convert_to_timezone2( $seminario->dataHora, wp_timezone_string() );
				$sem_obj->post_date = date( 'd/m/Y g:i a', strtotime( $sem_obj->post_date ) );
				
				echo $sem_obj->post_title;
				
				print_r( $seminario );
				
			}
	} else {
		echo 'Não há Seminários no momento!';
	}


		

		?>
	</ul>
	<!-- /#agenda -->
	<?php
}

function busca_seminarios2() {

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
function wp_convert_to_timezone2( $datetime, $timezone = 'GMT', $return_format = 'c' ){

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
