<?php
/**
 * Template name: Home
 */

get_header(); ?>

	<div id="contentCont">
        <h1><img src="<?php echo $cdn; ?>/images/tmi_rupaul_logo.png" alt="RuPaul’s Drag Race"></h1>
        <?php

            $content = $post->post_content;
            echo wpautop($content);

			$args = array(
				'post_type'       => 'entry',
				'post_status'     => 'publish',
				'posts_per_page'  => 1,
			);
			$gallery = new WP_Query($args);
			while ($gallery->have_posts()) : $gallery->the_post();
				$meta = get_post_meta($post->ID);
				$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$medium_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		?>
        <div class="photoCont" style="background-image: url('<?php echo $medium_image[0]; ?>'');">
            <h3><a class="fancybox" href="<?php echo $full_image[0]; ?>" title="<?php echo $meta['wpcf-entry-name'][0]; ?> from <?php echo $meta['wpcf-entry-company'][0]; ?>">Taking entries now!</a></h3>
        </div>
        <?php endwhile; ?>
        <p>Upload your fabulousness here, and remember to christen yourselves with the perfect Drag Name!</p>
        <p class="linkButton"><a href="/upload">Upload now</a></p>
        <p>Keep an eye out on your competition and we’ll announce the winner on Tuesday 26th May.</p>
        <p>Good Luck Bitches</p>
        <p>The TMi team</p>
    </div>

<?php get_footer();