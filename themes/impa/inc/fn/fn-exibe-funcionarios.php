<?php

function exibe_funcionarios() {
	
	$args = array(
		'post_type' => 'funcionarios'
	);
	$the_query = new WP_Query( $args );
	
	// The Loop
	if ( $the_query->have_posts() ) {
		?>
		<table id="alunos" class="tablepress">
			<thead>
				<tr>
					<th><?php echo __( 'Employees', 'impa' ); ?></th>
					<th><?php echo __( 'Branch', 'impa' ); ?></th>
					<th><?php echo __( 'Room', 'impa' ); ?></th>
				</tr>
			</thead>
			<?php
			while( $the_query->have_posts() ) : $the_query->the_post();
				
				$ramal = get_field( 'fc_ramal' ) ? get_field( 'fc_ramal' ) : '-';
				$sala = get_field( 'fc_sala' ) ? get_field( 'fc_sala' ) : '-';
				
				?>
				<tr>
					<td><?php the_title(); ?></td>
					<td><?php echo $ramal; ?></td>
					<td><?php echo $sala; ?></td>
				</tr>
				<?php
			endwhile;
			?>
		</table>
		<!-- /#alunos -->
		<?php
	} else {
		 // no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();
}