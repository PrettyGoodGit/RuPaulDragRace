<?php
/**
 * Template name: Winner
 */

global $winner;
$winner = true;

get_header(); ?>

<h1>The Cartoon Network <br>Christmas Jumpers Competition</h1>

<?php
$meta = get_post_meta($post->ID);

if (isset($meta['wpcf-winner-image']) && $meta['wpcf-winner-image'][0] != '') {
?>

  <div class="winner_image">
    <div class="entry_inner">
      <img src="<?php echo $cdn; ?>/img/winner-frame-top.gif" alt=" ">
      <a rel="all_images" class="fancybox" href="<?php echo $meta['wpcf-winner-image'][0]; ?>" title="<?php echo $meta['wpcf-entry-name'][0]; ?> from <?php echo $meta['wpcf-entry-company'][0]; ?>" style="background: transparent url(<?php echo $meta['wpcf-winner-image'][0]; ?>) top center no-repeat; background-size: cover; display: block;"><img src="<?php echo $cdn; ?>/img/winner-frame.png" alt="<?php echo $meta['wpcf-entry-name'][0]; ?> from <?php echo $meta['wpcf-entry-company'][0]; ?>"></a>
      <div class="entry_name"><?php echo $meta['wpcf-entry-name'][0]; ?></div>
      <div class="entry_company"><?php echo $meta['wpcf-entry-company'][0]; ?></div>
    </div>
  </div>

<?php
}

if (isset($meta['wpcf-text-before-winner-image']) && $meta['wpcf-text-before-winner-image'][0] != '') {
  echo wpautop($meta['wpcf-text-before-winner-image'][0]);
}

$content = $post->post_content;
echo wpautop($content);

?>

<p class="banner"><img src="<?php echo $cdn; ?>/img/merry-christmas.png" alt="Merry Christmas" width="852"></p>

<p class="small"><img src="<?php echo $cdn; ?>/img/cartoon-network.png" alt="Cartoon Network"> <img src="<?php echo $cdn; ?>/img/adventure-time.png" alt="Adventure Time"></p>

<?php
get_footer();