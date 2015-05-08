<?php
/**
 * Template name: Winner
 */

global $winner;
$winner = true;

get_header(); ?>

	<div id="contentCont">
		<h1><img src="<?php echo $cdn; ?>/images/tmi_rupaul_logo.png" alt="RuPaul’s Drag Race"></h1>
		<?php
			$meta = get_post_meta($post->ID);
			if (isset($meta['wpcf-winner-image']) && $meta['wpcf-winner-image'][0] != '') {

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

				 echo '<div class="photoCont" style="background-image: url('.$meta['wpcf-winner-image'][0].');">';
                    echo '<h3>
                            <a class="fancybox" href="'.$meta['wpcf-winner-image'][0].'" title="'.$title.'">';
                                if ($entry_name != '') {
                                  echo '<div class="entry_name">'.$meta['wpcf-entry-name'][0].'</div>';
                                }
                                if ($entry_company != '') {
                                  echo '<div class="entry_company">'.$meta['wpcf-entry-company'][0].'</div>';
                                }
                    echo '</a>
                        </h3>';
                echo '</div>';
			}

			if (isset($meta['wpcf-text-after-winner-image']) && $meta['wpcf-text-after-winner-image'][0] != '') {
			  echo wpautop($meta['wpcf-text-after-winner-image'][0]);
			}

			$content = $post->post_content;
			echo wpautop($content);

		?>

	</div>

<?php
get_footer();