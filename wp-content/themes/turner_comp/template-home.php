<?php
/**
 * Template name: Home
 */

get_header(); ?>

	<img class="winMe" src="<?php echo $cdn; ?>/img/win-me.png" alt="Win Me">

	<h1>The Cartoon Network <br>Christmas Jumpers Competition</h1>

	<?php
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

			$medium_image_corrected = str_replace(' ', '%20', $medium_image[0]);
	?>
		<div class="winner_image">
			<div class="entry_inner">
				<img src="<?php echo $cdn; ?>/img/winner-frame-top.gif" alt=" ">
				<a rel="all_images" class="fancybox" href="<?php echo $full_image[0]; ?>" title="<?php echo $meta['wpcf-entry-name'][0]; ?> from <?php echo $meta['wpcf-entry-company'][0]; ?>" style="background: transparent url(<?php echo $medium_image_corrected; ?>) top center no-repeat; background-size: cover; display: block;"><img src="<?php echo $cdn; ?>/img/home-frame.png" alt="<?php echo $meta['wpcf-entry-name'][0]; ?> from <?php echo $meta['wpcf-entry-company'][0]; ?>"></a>
			</div>
		</div>
	<?php
		endwhile;
	?>

	<!-- <h2><img src="<?php echo $cdn; ?>/img/taking-entries-now.png" alt="Taking Entries Now"></h2> -->

	<p>Make everyone go Ooo* and win a cool camera this Christmas! Upload a ridiculous photo of yourself in your Adventure Time Christmas jumper, for a chance to win. </p>

	<p><a class="upload-now" href="/upload"><img src="<?php echo $cdn; ?>/img/upload-now.png" alt="Upload Now"></a></p>

	<p class="banner"><img src="<?php echo $cdn; ?>/img/merry-christmas.png" alt="Merry Christmas" width="852"></p>

	<p class="small">*Adventure Time, Cartoon Network’s Emmy&reg; award-winning animated comedy series, debuted in April 2010 and soon became a ratings and pop culture phenomenon. Currently in its sixth season, Finn and Jake are having their most epic adventures ever! Finn, the human boy with the awesome hat, and Jake, the wise dog with magical powers, are friends and partners in strange adventures in the astounding Land of Ooo. It’s one quirky and off-beat adventure after another, as they fly all over saving princesses, duelling evil-doers, and doing other fun stuff.</p>

	<p class="small"><img src="<?php echo $cdn; ?>/img/cartoon-network.png" alt="Cartoon Network"> <img src="<?php echo $cdn; ?>/img/adventure-time.png" alt="Adventure Time"></p>

<?php

// $content = $post->post_content;
// echo wpautop($content);

?>

<?php get_footer();