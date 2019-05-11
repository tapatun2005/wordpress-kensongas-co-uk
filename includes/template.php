<?php
/*-----------------------------------------------------------------------------------*/
/* Get next or previous post by id
/*-----------------------------------------------------------------------------------*/	
function get_next_previous_port_id( $post_id, $next_or_prev ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;

    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;

    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );

    // Get the post object for the previous post
    $previous_post = $next_or_prev == "prev" ? get_previous_post() : get_next_post();

    // Reset our global object
    $post = $oldGlobal;

    if ( '' == $previous_post ){
    	$port = get_posts(array(
    		'post_type' => 'portfolio',
    		'order'		=> $next_or_prev == "prev" ? 'DESC' : 'ASC',
    		'posts_per_page' => 1,
    		));
    	return $port[0]->ID;
    }

    return $previous_post->ID;
}
/*-----------------------------------------------------------------------------------*/
/* Check post is like or not
/*-----------------------------------------------------------------------------------*/	
function is_like_post($id){
	if(isset($_COOKIE['et_like_'.$id]) && $_COOKIE['et_like_'.$id] == 1)
		return 'active';
}

/*-----------------------------------------------------------------------------------*/
/* OE Main Slider
/*-----------------------------------------------------------------------------------*/ 
function oe_main_slider($numbers = -1){
    global $post;
    $query = new WP_Query(array(
            'post_type' => 'slider',
            'posts_per_page' => $numbers
        ));
    $imgArray = array();
    if($query->have_posts()){
        while ($query->have_posts()) {
            $query->the_post();
            $slide_color = get_post_meta( $post->ID, 'oe_slider_bg', true );
            $image = get_the_post_thumbnail_url( $post_id, 'large' );
        echo '<div class="slide">';
    ?>

        <div class="slider_bg" style="background-image:url(<?php echo $image; ?>)"></div>
        <div class="intro" style="background-color:<?php echo $slide_color; ?>;">
                <h1><?php the_title() ?></h1>
                <p><?php the_content(); ?>
                </p>
        </div>
        
    <?php
    echo '</div>';
        }
    }
    wp_reset_query();
    
}

/*-----------------------------------------------------------------------------------*/
/* OE Main Section
/*-----------------------------------------------------------------------------------*/ 
function oe_main_section ($numbers = -1){
    global $post;
    $query = new WP_Query(array(
            'post_type' => 'section',
            'posts_per_page' => $numbers
        ));
    $counter = 0;
    $imgArray = array();
    if($query->have_posts()){
        while ($query->have_posts()) {
            $query->the_post();
            
            $counter++;
            $class="";
            $slide_color = get_post_meta( $post->ID, 'oe_section_bg', true );
            $slide_text_color = get_post_meta( $post->ID, 'oe_section_color', true );
            $slide_id = get_post_meta( $post->ID, 'oe_section_id', true );
            $order = get_post_meta( $post->ID, 'oe_section_order', true );
            if( $counter % 2 == 0 ) { $class="-right"; } else {$class="";};
    ?>
        <section class="section__service <?php echo $class; ?>" style="background-color:<?php echo $slide_color; ?>; color:<?php echo $slide_text_color; ?>;" id="<?php echo $slide_id; ?>">
            
            <div class="section__content">
                <h2 style="color:<?php echo $slide_text_color; ?>;"><?php the_title() ?></h2>
                <div class="section__p">
                    <?php
                        the_content();
                    ?>
                    <a href="#contact" title="Contact us" class="btn">Get a quote</a>
                </div>
            </div>
            <?php the_post_thumbnail( 'full' ); ?>
        </section>
        
    <?php
        }
        echo '</section>';
    }
    wp_reset_query(); 
}

/*-----------------------------------------------------------------------------------*/
/* OE Portfolio
/*-----------------------------------------------------------------------------------*/ 
function oe_portfolio($numbers = -1){
    global $post;
    $query = new WP_Query(array(
            'post_type' => 'portfolio',
            'posts_per_page' => $numbers
        ));
    $count = 0;
    $countTo = 0;
    $imgArray = array();
    echo '<ul class="gallery">';
    
    if($query->have_posts()){
        
        while ($query->have_posts()) {
            $query->the_post();
            $count++
    ?>
        <li data-portfolio="portfolio-<?php echo $count; ?>">
            <?php the_post_thumbnail( 'full' ); ?>
        </li>
        
    <?php
    
        }
    }
    echo '</ul>';

    echo '<div class="gallery_full">';
    
    if($query->have_posts()){
        
        while ($query->have_posts()) {
            $query->the_post();
            $countTo++
    ?>
        <div class="popup-portfolio" id="portfolio-<?php echo $countTo; ?>">
            <div class="close-gallery">X</div>
            <div class="_content">
                <div class="_img">
                    <?php the_post_thumbnail( 'full' ); ?>
                </div>
                <div class="_desc">
                    <h2><?php the_title();?></h2>
                    <?php the_content();?>
                </div>
            </div>
        </div>
        
    <?php
    
        }
    }
    echo '</div>';
    wp_reset_query(); 
}


/*-----------------------------------------------------------------------------------*/


/* OE oe_testimonial
/*-----------------------------------------------------------------------------------*/ 
function oe_testimonial($numbers = -1){
    global $post;
    $query = new WP_Query(array(
            'post_type' => 'testimonial',
            'posts_per_page' => $numbers
        ));
    $count = 0;
    $countTo = 0;
    $imgArray = array();
    echo '<ul class="testimonials">';
    
    if($query->have_posts()){
        
        while ($query->have_posts()) {
            $query->the_post();
            $count++
    ?>
        <li class="testimonial <?php if($count === 1) { echo 'is-active'; } ?>">
            <?php the_post_thumbnail( 'full' ); ?>
            <h2><?php the_title();?></h2>
            <?php the_content();?>
        </li>
        
    <?php
    
        }
    }
    echo '</ul>';
    echo '<div class="_navs"><div id="prev"><</div><div id="next">></div></div>';
    wp_reset_query(); 
}


function oe_testimonialFeatured($numbers = -1){
    global $post;
    $query = new WP_Query(array(
            'post_type' => 'testimonial',
            'posts_per_page' => $numbers
        ));
    $count = 0;
    $countTo = 0;
    $imgArray = array();
    
    
    if($query->have_posts()){
        
        while ($query->have_posts()) {
            $query->the_post();
            $count++
    ?>
        <div class="latest-review">
            <div class="_img">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
            <div class="_text"><?php the_content();?></div>
        </div>
        
    <?php
    
        }
    }
    wp_reset_query(); 
}


/*-----------------------------------------------------------------------------------*/
/* Get Taxonomy Icon
/*-----------------------------------------------------------------------------------*/ 
function oe_get_tax_icon($tax_id){
    $term_meta = get_option( "taxonomy_{$tax_id}" );
    return '<i class="fa '.$term_meta['icon'].'"></i>';
}

function oe_comment_template($comment, $args, $depth){
    $GLOBALS['comment'] = $comment;
?>
    <li class="oe-comment" id="comment-<?php echo $comment->comment_ID ?>">
        <div class="oe-comment-left">
            <div class="oe-comment-thumbnail">
                <?php echo get_avatar($comment->user_id); ?>
            </div>
        </div>
        <div class="oe-comment-right">
            <div class="oe-comment-header">
                <a href="<?php comment_author_url() ?>"><strong class="oe-comment-author"><?php comment_author() ?></strong></a>
                <span class="oe-comment-time icon" data-icon="t"><?php comment_date() ?></span>
            </div>
            <div class="oe-comment-content">
                <?php comment_text() ?>
                <p class="oe-comment-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
            </div>
        </div>
        <div class="clearfix"></div>
<?php   
}

?>