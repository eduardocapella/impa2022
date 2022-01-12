<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
	
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#site-main"><?php esc_html_e( 'Skip to content', 'rah' ); ?></a>
			
			<header id="header">
				<div id="header-linha1">
					<div class="container">
						<h1 class="site-branding">
							<?php
							the_custom_logo();
							?>	
						</h1>
						<!-- .site-branding -->
						
						<div class="secondary-navigation">
							<div id="header-search">
								<button><i class="fas fa-search"></i></button>
							</div>
							<!-- /#header-search -->
	
							<?php
							do_action('wpml_add_language_selector');
							?>
							<!-- .wpml-ls idiomas -->
								
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
						</div>
						<!-- /.secondary-navigation -->
					</div>
					<!-- /.container -->
				</div>
				<!-- .header-linha1 -->
					
				<div id="header-linha-2">
						<?php echo get_search_form(); ?>
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav>
						<!-- #site-navigation -->
				</div>
				<!-- /#linha-2 -->
				
				<?php if(! is_page('home') ) { ?>
				<div id="breadcrumbs">
					<div class="container">
						<?php
						if ( function_exists('yoast_breadcrumb') ) {
			  				yoast_breadcrumb( '<p>','</p>' );
						}
						?>
					</div>
					<!-- /.container -->
				</div>
				<!-- /#breadcrumbs -->
				<?php } ?>

			</header>
		
			