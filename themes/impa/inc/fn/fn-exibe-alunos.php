<?php

function exibe_alunos() {
	
	$args = array(
		'post_type' => 'alunos'
	);
	$the_query = new WP_Query( $args );
	
	// The Loop
	if ( $the_query->have_posts() ) {
		?>
		<table id="alunos" class="tablepress">
			<thead>
				<tr>
					<th><?php echo __( 'Students', 'impa' ); ?></th>
					<th><?php echo __( 'Program', 'impa' ); ?></th>
					<th><?php echo __( 'Branch', 'impa' ); ?></th>
					<th><?php echo __( 'Room', 'impa' ); ?></th>
					<th><?php echo __( 'Email', 'impa' ); ?></th>
				</tr>
			</thead>
			<?php
			while( $the_query->have_posts() ) : $the_query->the_post();
				
				$programa = get_field( 'al_programa' );
				$email = get_field( 'al_email' );
				$ramal = get_field( 'al_ramal' ) ? get_field( 'al_ramal' ) : '-';
				$sala = get_field( 'al_sala' ) ? get_field( 'al_sala' ) : '-';
				
				?>
				<tr>
					<td><?php the_title(); ?></td>
					<td><?php echo $programa; ?></td>
					<td><?php echo $ramal; ?></td>
					<td><?php echo $sala; ?></td>
					<td><?php echo $email; ?></td>
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