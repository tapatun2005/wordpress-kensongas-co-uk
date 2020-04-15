<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package OneEngine
 */
?>

		<?php if(is_front_page()){ ?>
		<?php 
			$color		= oneengine_option('footer_blog_color');
			$color		= ( ! empty ( $color ) )  	? 'background-color:'. $color .';' : '';
			/** Style Container */
			$style = ( 
				! empty( $img ) ||
				! empty( $color ) || 
				! empty( $repeat ) ||
				! empty( $cover ) ||
				! empty( $parallax ) ) ? 
					sprintf( '%s %s %s %s %s', $img, $color, $repeat, $cover, $parallax ) : '';
			$css = '';
			if ( ! empty( $style ) ) {			
				$css = 'style="'. $style .'" ';
			}
        ?>
		<footer id="contact" class="site-footer template-wrap" role="contentinfo" style="<?php echo $color ?>">
	    	
			<?php 
                $color_title		= oneengine_option('footer_blog_title_color'); 
                $color_sub_title	= oneengine_option('footer_blog_subtitle_color');
                    
                $color_title		= ( ! empty ( $color_title ) ) 		? 'color:'. $color_title .';' : '';
                $color_sub_title	= ( ! empty ( $color_sub_title ) )  ? 'color:'. $color_sub_title .';' : '';
                
                /** Style Container */
                $title_color = ( 
                    ! empty( $color_title ) ) ? 
                        sprintf( '%s', $color_title) : '';
                $css_title_color = '';
                if ( ! empty( $title_color ) ) {			
                    $css_title_color = 'style="'. $title_color .'" ';
                }
                
                $sub_title_color = ( 
                    ! empty( $color_sub_title ) ) ? 
                        sprintf( '%s', $color_sub_title) : '';
                $css_sub_title_color = '';
                if ( ! empty( $sub_title_color ) ) {			
                    $css_sub_title_color = 'style="'. $sub_title_color .'" ';
                }
            ?>
            <div class="fx">
            	<div class="footer_text">
		            <div class="heading-title-wrapper" style="color">
		                <h2 class="title" <?php echo $css_title_color ?>><?php echo oneengine_option('footer_blog_title') ?></h2>
		                <span class="line-title" style="background-color:#fff"></span>
		                <span class="sub-title" <?php echo $css_sub_title_color ?>><?php echo oneengine_option('footer_blog_subtitle') ?></span>
		            </div>

					<div class="footer_phone">
						<h2 class="form_title">Contact Number</h2>
						<div class="phone fx">
	                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/phone.svg" alt="Kenson gas and Plumbing Contact Number">
	                        <ul class="ul-reset">
	                            <li>
	                                <a href="tel:<?php echo oneengine_option('phone_general') ?>"><?php echo oneengine_option('phone_general') ?></a>
	                            </li>
	                            <?php if(oneengine_option('extra_phone_general') != '') {?>
	                            <!-- <li>
	                                <a href="tel:<?php echo oneengine_option('extra_phone_general') ?>"><span><?php echo oneengine_option('extra_phone_general') ?></span></a>
	                            </li> -->
	                            <?php } ?>
	                        </ul>
	                    </div>
                    </div>

		            <?php if(oneengine_option('contact_form') != '') {?>
			            <div class="contact-form-wrapper">
			            	<?php echo do_shortcode( oneengine_option('contact_form') ); ?>
			            </div>
		            <?php } ?>
	            </div>
	            
	            
				<?php if(oneengine_option('map_footer') != '') {?>
					<div class="footer_map">
			        	<?php echo (oneengine_option('map_footer')); ?>
		        	</div>
		        <?php } ?>
	        </div>
			<div class="copyright">
				<?php echo nl2br(oneengine_option('copyright')); ?>
			</div>					
		</footer><!-- #colophon -->
		<?php } ?>

	
	</div>  <!-- #content -->
</div><!-- #app -->
	<?php wp_footer(); ?>

	<?php if(oneengine_option('schema_json') != '') {?>
		<?php echo (oneengine_option('schema_json')); ?>
	<?php } ?>
</body>
</html>
