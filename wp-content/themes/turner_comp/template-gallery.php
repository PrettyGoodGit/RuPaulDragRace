<?php
/**
 * Template name: Gallery
 */

get_header(); ?>

<?php

?>

<?php

$content = $post->post_content;
echo wpautop($content);

if (isset($_REQUEST['success'])) {
  echo '<p class="success">Thanks! Your image has been added to the system and is awaiting moderation. Please check back later to find your image in the gallery.</p>';
}

  /* gallery */


  $number_of_items = 6;
  $our_page = intval(get_query_var('page')) ? intval(get_query_var('page')) : 1;
  wp_reset_query();
  $args = array(
    'post_type'       => 'entry',
    'post_status'     => 'publish',
    'posts_per_page'  => $number_of_items,
    'paged'           => $our_page
  );
  $gallery = new WP_Query($args);
  if ($gallery->found_posts > 0) {
    echo '<div class="gallery_images">';
    echo '<ul class="clearfix">';
    while ($gallery->have_posts()) : $gallery->the_post();
      echo '<li>';
        $meta = get_post_meta($post->ID);
        $entry_name = '';
        if (isset($meta['wpcf-entry-name']) && $meta['wpcf-entry-name'][0] != '') {
          $entry_name = $meta['wpcf-entry-name'][0];
        }
        $entry_company = '';
        if (isset($meta['wpcf-entry-company']) && $meta['wpcf-entry-company'][0] != '') {
         $entry_company = $meta['wpcf-entry-company'][0];
        }
        $title = $entry_name;
        if ($title != '' && $entry_company != '') {
          $title .= ' from '.$entry_company;
        }
        if ($title == '') {
          $title = '[untitled]';
        }
        echo '<div class="entry_inner">';
        $full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $medium_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );

        $medium_image_corrected = str_replace(' ', '%20', $medium_image[0]);

        echo '<a href=""><img src="'.get_template_directory_uri().'/assets/img/gallery-frame-top.gif" alt=""></a>';
        echo '<a rel="all_images" class="fancybox" href="'.$full_image[0].'" title="'.$title.'" style="background: transparent url('.$medium_image_corrected.') top center no-repeat; background-size: cover; display: block;">';
        echo '<img src="'.get_template_directory_uri().'/assets/img/gallery-frame.png" alt="'.$title.'" />';
        echo '</a>';
        if ($entry_name != '') {
          echo '<div class="entry_name">'.$meta['wpcf-entry-name'][0].'</div>';
        }
        if ($entry_company != '') {
          echo '<div class="entry_company">'.$meta['wpcf-entry-company'][0].'</div>';
        }
        echo '<!-- post_id: '.$post->ID.' -->';
        echo '</div>';
      echo '</li>';
    endwhile;
    echo '</ul>';
    echo '</div>';

    if ( $gallery->max_num_pages > 1 ) {
      echo '<nav id="page_nav">';
      for ($x = 1; $x <= $gallery->max_num_pages; $x++) {
          if ($x == 1) {
            $page = '/gallery/';
          } else {
            $page = '/gallery/?page='.$x;
          }

          if ($x == $gallery->max_num_pages) {
            if ($x == $our_page) {
              echo '<a class="active" href="'.$page.'">'.$x.'</a>';
            } else {
              echo '<a href="'.$page.'">'.$x.'</a>';
            }
          } else {
            if ($x == $our_page) {
              echo '<a class="active" href="'.$page.'">'.$x.'</a><span>|</span>';
            } else {
              echo '<a href="'.$page.'">'.$x.'</a><span>|</span>';
            }
          }

      }
      echo '</nav>';
    }

    // if ( $gallery->max_num_pages > 1 ) {
    //   echo '<ul class="gallery_nav clearfix">';
    //   if ($our_page > 1) {
    //     $previous = $our_page - 1;
    //     echo '<li><a href="/gallery/?page='.$previous.'">Previous</a></li>';
    //   } else {
    //     echo '<li>&nbsp;</li>';
    //   }
    //   echo '<li></li>';
    //   echo '<li>'.$our_page.' of '.$gallery->max_num_pages.'</li>';
    //   if ($our_page < $gallery->max_num_pages) {
    //     $next = $our_page + 1;
    //     echo '<li><a href="/gallery/?page='.$next.'">Next</a></li>';
    //   } else {
    //     echo '<li>&nbsp;</li>';
    //   }
    //   echo '</ul>';
    // }

  }


?>

<p class="small"><img src="<?php echo $cdn; ?>/img/cartoon-network.png" alt="Cartoon Network"> <img src="<?php echo $cdn; ?>/img/adventure-time.png" alt="Adventure Time"></p>

<?php get_footer();