<?php
/**
 * Template name: Terms
 */

get_header(); 

	while ( have_posts() ) : the_post(); 
		echo '<div id="contentCont">
				<h1><img src="'.$cdn.'/images/tmi_rupaul_logo.png" alt="RuPaul’s Drag Race"></h1>';
			echo the_content();
		echo '</div>';
		
	endwhile;

get_footer();