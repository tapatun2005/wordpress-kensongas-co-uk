<?php 
/**
 * Template Name: Home Template
 */
?>
<?php 
global $post; 
get_header();
?>
<?php if (have_posts()) : ?>                
	<?php
        while(have_posts()) : the_post();
    ?>
<!-- Container
======================================================================== -->
	<main>
		
			


		<section class="welcome">
				
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/bg/plumber.jpg" alt="Kenson gas and plumbing" class="welcome__bg">

			<div class="welcome-top">

				<div class="welcome__wrap">

					<div class="slider">
						<?php oe_main_slider(1); ?>
					</div>


				</div>
				
				<?php if( oneengine_option('contact_form_general') != '' ) {?>
					<?php echo do_shortcode( oneengine_option('contact_form_general') ); ?>
				<?php }?>

				
			
			</div>

			<div class="gallery_wrap">
				<h2>Latest work</h2>
				<?php oe_portfolio(6); ?>
			</div>

		</section>

		
        <?php oe_main_section(); ?>

    </main>
<!-- Container / End -->
	<?php endwhile; ?>
<?php endif; ?>  
<?php get_footer(); ?>