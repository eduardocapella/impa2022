
		</div>
		<!-- #page -->
			<footer id="site-footer">
				<div class="container">
					<div class="site-info row">
						<div class="col-sm-6">
							<nav id="footer-navigation" class="secondary-navigation">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-2',
										'menu_id'        => 'footer-menu',
									)
								);
								?>
							</nav>
							<!-- #site-navigation -->
						</div>
						<!-- /.col-sm-6 -->
						<div class="col-sm-6">
							<div class="social-group">
								<div class="social-group-container">
									<h4><?php echo __( 'Follow IMPA', 'impa' ); ?></h4>
									<?php menu_redes_sociais(); ?>
								</div>
								<!-- /.social-group-container -->
							</div>
							<!-- /.social-group -->
						</div>
						<!-- /.col-sm-6 -->
	
					</div><!-- .site-info.row -->
				</div>
				<!-- /.container -->
					
				<div class="container-fluid governo">
					<div class="row">
						<div class="col-sm-12">
							<figure>
								<?php $logos_governo = get_field( 'config_logos_do_governo', 'option'); ?>
								<img src="<?php echo $logos_governo['url'] ?>" alt="<?php echo $logos_governo['alt'] ?>">
							</figure>
						</div>
						<!-- /.col-sm-12 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid governo -->
					
			</footer><!-- #colophon -->
				
		</div><!-- #page -->
		
		<?php wp_footer(); ?>
	
	</body>
</html>