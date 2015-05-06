<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
header('Content-Type: text/html; charset=UTF-8');
global $cdn;
$cdn = get_template_directory_uri().'/assets';
?><!DOCTYPE HTML>
<html <?php body_class(); ?>>
	<head>
		<meta charset="utf-8">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta http-equiv="X-UA-Compatible" content="ie=edge;chrome=1">
		<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $cdn; ?>/images/favicon.ico">
		<link type="text/css" rel="stylesheet" media="all" href="<?php echo $cdn; ?>/css/layout.css">
		<script type="text/javascript" src="<?php echo $cdn; ?>/scripts/jquery-1.11.1.min.js"></script>
		<meta name="author" content="Pretty Good Digital - www.prettygooddigital.com">
		<!--[if (lt IE 9) & !(IEMobile)]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<link type="text/css" rel="stylesheet" media="all" href="<?php echo $cdn; ?>/css/ie.css">
		<![endif]-->
		<!--[if IE 7]>
			<link type="text/css" rel="stylesheet" media="all" href="<?php echo $cdn; ?>/css/ie7.css">
		<![endif]-->
		<!--[if (gte IE 6)&(lte IE 8)]>
			<script src="<?php echo $cdn; ?>/scripts/selectivizr.js"></script>
		<![endif]-->
		<?php //wp_head(); ?>
	</head>
	<body>

		<div class="pageWrapper">
			<div class="content">
			
			<?php
				$home = get_page_by_title('Home');
			    $meta = get_post_meta($home->ID);

			    if ($meta['wpcf-competition-over'][0] != 0) {
		    ?>
				<nav id="mainNav">
					<?php
						if (is_page('Home') OR is_page('Winner')) {
							echo '<a class="home active" href="/winner"><img src="'.$cdn.'/img/home-active.png" alt="Home"></a>';
						} else {
							echo '<a class="home" href="/winner"><img src="'.$cdn.'/img/home.png" alt="Home"></a>';
						}
						if (is_page('Gallery')) {
							echo '<a class="gallery active" href="/gallery"><img src="'.$cdn.'/img/gallery-active.png" alt="Gallery"></a>';
						} else {
							echo '<a class="gallery" href="/gallery"><img src="'.$cdn.'/img/gallery.png" alt="Gallery"></a>';
						}
					?>
				</nav>
		    <?php
		    	} else {
    		?>
    			<nav id="mainNav">
					<?php
						if (is_page('Home')) {
							echo '<a class="home active" href="/home"><img src="'.$cdn.'/img/home-active.png" alt="Home"></a>';
						} else {
							echo '<a class="home" href="/home"><img src="'.$cdn.'/img/home.png" alt="Home"></a>';
						}

						if (is_page('Upload')) {
							echo '<a class="upload active" href="/upload"><img src="'.$cdn.'/img/upload-active.png" alt="Upload"></a>';
						} else {
							echo '<a class="upload" href="/upload"><img src="'.$cdn.'/img/upload.png" alt="Upload"></a>';
						}

						if (is_page('Gallery')) {
							echo '<a class="gallery active" href="/gallery"><img src="'.$cdn.'/img/gallery-active.png" alt="Gallery"></a>';
						} else {
							echo '<a class="gallery" href="/gallery"><img src="'.$cdn.'/img/gallery.png" alt="Gallery"></a>';
						}
					?>
				</nav>
    		<?php
		    	}