<?php
/**
 * Template name: Terms
 */

get_header(); 

	while ( have_posts() ) : the_post(); 
		echo the_content();
	endwhile;

get_footer();