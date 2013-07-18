<?php

function standard_add_additional_theme_menus() {
	
	register_nav_menus(
		array(
			'category_menu'		=> __( 'Category Menu', 'standard' )
		)
	);
	
} // end standard_add_additional_theme_menus
	
add_action( 'init', 'standard_add_additional_theme_menus' );

function get_category_navigation() {
	
	if( has_nav_menu( 'category_menu' ) ) { ?>
		<div id="menu-category" class="menu-navigation navbar navbar-fixed-top">
			<div class="navbar-inner ">
				<div class="container">
	
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".category-nav-collapse">
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</a>
				
					<div class="nav-collapse category-nav-collapse">													
						<?php
							wp_nav_menu( 
								array(
									'container_class'	=> 'menu-header-container',
									'theme_location'  	=> 'category_menu',
									'items_wrap'      	=> '<ul id="%1$s" class="nav nav-menu %2$s">%3$s</ul>',
									'fallback_cb'	  	=> 'standard_fallback_nav_menu',
									'walker'			=> new Standard_Nav_Walker()
							 	)
							 );
						?>

					</div><!-- /.nav-collapse -->
					<div id="social-networking" class="clearfix">
						<?php get_template_part( 'social-networking' ); ?>  
					</div><!-- /#social-networking -->
				</div> <!-- /container -->
			</div><!-- /navbar-inner -->
		</div> <!-- /#menu-above-header -->	
	<?php } // end if
	
} // end get_category_navigation

?>
