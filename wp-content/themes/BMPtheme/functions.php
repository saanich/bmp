<?php

// Register some sidebars
// =======================================================

 register_sidebar(array(
 'name' => __( 'Front page Low Impact box' ),
 'id' => 'lowimpact',
 'description' => __( 'lowimpact' ),
 'before_widget' => '<div class="lowimpact">',
 'after_widget' => '</div>',
 'before_title' => '<h3>',
 'after_title' => '</h3>',
 ));

register_sidebar(array(
 'name' => __( 'Front page Adrenaline box' ),
 'id' => 'adrenaline',
 'description' => __( 'adrenaline' ),
 'before_widget' => '<div class="adrenaline">',
 'after_widget' => '</div>',
 'before_title' => '<h3>',
 'after_title' => '</h3>',
 ));


register_sidebar(array(
 'name' => __( 'Front page field area' ),
 'id' => 'frontpage',
 'description' => __( 'frontpage' ),
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3>',
 'after_title' => '</h3>',
 ));

register_sidebar(array(
 'name' => __( 'News and Events page Side Bar' ),
 'id' => 'news',
 'description' => __( 'news' ),
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h2 class="pagetitle">',
 'after_title' => '</h2>',
 ));

register_sidebar(array(
 'name' => __( 'Fields page Side Bar' ),
 'id' => 'fields',
 'description' => __( 'fields' ),
 'before_widget' => '<div class="fields">',
 'after_widget' => '</div>',
 'before_title' => '<h2>',
 'after_title' => '</h2>',
 ));

register_sidebar(array(
 'name' => __( 'Hi-adrenaline Page Side Bar' ),
 'id' => 'hisidebar',
 'description' => __( 'Hi-adrenaline Page Side Bar' ),
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h2 class="pagetitle">',
 'after_title' => '</h2>',
 ));

register_sidebar(array(
 'name' => __( 'Low-Impact Page Side Bar' ),
 'id' => 'lowsidebar',
 'description' => __( 'Low-Impact Page Side Bar' ),
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h2 class="pagetitle">',
 'after_title' => '</h2>',
 ));

register_sidebar(array(
 'name' => __( 'Contact Page Sidebar' ),
 'id' => 'contactsidebar',
 'description' => __( 'Contact Page Sidebar' ),
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h2 class="pagetitle">',
 'after_title' => '</h2>',
 ));

register_sidebar(array(
 'name' => __( 'footer' ),
 'id' => 'footer',
 'description' => __( 'footer' ),
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3>',
 'after_title' => '</h3>',
 ));
// Add featured image support
// ======================================================= 
add_theme_support( 'post-thumbnails' ); 

// Change the [...] at the end of the excerpt
// ======================================================= 
function new_excerpt_more( $more ) {
    return ' <div class="excerpt"><span>...</span></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Change the length the excerpt
// ======================================================= 
function custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Register two menus
// ======================================================= 
function register_my_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
      'secondary-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



// Variable & intelligent excerpt length.
// ======================================================= 
function print_excerpt($length) { // Max excerpt length. Length is set in characters
    global $post;
    $text = $post->post_excerpt;
    if ( '' == $text ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    }
    $text = strip_shortcodes($text); // optional, recommended
    $text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags

    $text = substr($text,0,$length);
    $excerpt = reverse_strrchr($text, '.', 1);
    if( $excerpt ) {
        echo apply_filters('the_excerpt',$excerpt);
    } else {
        echo apply_filters('the_excerpt',$text);
    }
}

// Returns the portion of haystack which goes until the last occurrence of needle
function reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}

function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
        
     }
}
?>