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
		
		if ( $the_query->have_posts() ) :

			while( $the_query->have_posts() ) : $the_query->the_post();
					
					if( get_field( 'evento_data_de_inicio' ) ) {
						$class = 'evento';
						$data = get_field( 'evento_data_de_inicio' );
						$linha = get_field( 'evento_local_do_evento' );
						$linha1 = $linha[ 'local' ];
						
					} else if( get_field( 'dt_datas_data_da_defesa' ) ) {
						$class = 'educacao';
						$data = get_field( 'dt_datas_data_da_defesa' );
					}
					
					$data_obj = DateTime::createFromFormat('d/m/Y g:i a', $data);
					$data_num = $data_obj->getTimestamp();
					$data_day = $data_obj->format( 'd' );
					$data_month = $data_obj->format( 'M' );
					$data_year = $data_obj->format( 'Y' );
					
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
						<h3 class="<?php echo $class; ?>"><?php the_title(); ?></h3>
						<?php if( $linha1 ) {
							echo '<p>' . $linha1 . '</p>';
						} ?>	
					</li>
					<?php					

			endwhile;
			
		endif;
		
		?>
	</ul>
	<!-- /#agenda -->
	<?php
}