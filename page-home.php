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
				
			<!-- <img src="<?php bloginfo('stylesheet_directory'); ?>/images/bg/plumber.jpg" alt="Kenson gas and plumbing" class="welcome__bg"> -->

			<div class="welcome-top">

				<div class="welcome__wrap">

					<div class="slider">
						<?php oe_main_slider(1); ?>
					</div>
				</div>

				 <a href="#next-section" class="_icon"></a>

				<?php oe_testimonialFeatured(1); ?>

			</div>
			
			<?php if( oneengine_option('contact_form_general') != '' ) {?>
			<div id="get-a-quote">
				
				<label for="get-a-quote-btn">Get quote!</label>
				<input type="checkbox" name="get-quote" id="get-a-quote-btn">
				<div class="quick-form">
					<?php echo do_shortcode( oneengine_option('contact_form_general') ); ?>
				</div>
				<div class="_close">&times;</div>
			</div>
			<?php }?>
			
			
			<?php
				$the_query = new WP_Query( 'tag=about' );

				if ( $the_query->have_posts() ) {
				    echo '<div class="about-and-testimonials" id="next-section">';

				        $the_query->the_post();
				        echo '<div class="about-post">';
					        echo '<h2>' . get_the_title() .'</h2>';
					        echo "" . get_the_content() . "";
					    echo '</div>';
					    echo '<div class="testimonials_wrap">';
					    	echo '' .oe_testimonial(2). '';
					    echo '</div>';
				    echo '</div>';
				} else {
					echo '<div class="testimonials_wrap">';
				    	echo '' .oe_testimonial(2). '';
				    echo '</div>';
				}
				/* Restore original Post Data */
				wp_reset_postdata();
			?>

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