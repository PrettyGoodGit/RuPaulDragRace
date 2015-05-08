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
?>
<!DOCTYPE HTML>
<!--[if IE 7]>
<html <?php body_class('ie ie7'); ?>>
<![endif]-->
<!--[if IE 8]>
<html <?php body_class('ie ie8'); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php body_class(); ?>>
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge;chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $cdn; ?>/images/favicon.ico">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600' rel='stylesheet' type='text/css'>
        <link type="text/css" rel="stylesheet" media="all" href="<?php echo $cdn; ?>/css/layout.css">
        <script type="text/javascript" src="<?php echo $cdn; ?>/scripts/jquery-1.11.1.min.js"></script>
        <!--[if (lt IE 9) & !(IEMobile)]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script src="<?php echo $cdn; ?>/scripts/selectivizr.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="pageWrapper">
            <div class="columnWrapper">
                <header id="header">
                    <?php
						$home = get_page_by_title('Home');
					    $meta = get_post_meta($home->ID);

					    if ($meta['wpcf-competition-over'][0] != 0) {
				    ?>
						<nav id="mainNav">
							<?php
								if (is_page('Home') OR is_page('Winner')) {
									echo '<a class="home active" href="/winner">Home</a>';
								} else {
									echo '<a class="home" href="/winner">Home</a>';
								}
								if (is_page('Gallery')) {
									echo '<a class="gallery active" href="/gallery">Gallery</a>';
								} else {
									echo '<a class="gallery" href="/gallery">Gallery</a>';
								}
							?>
						</nav>
				    <?php
				    	} else {
		    		?>
		    			<nav id="mainNav">
							<?php
								if (is_page('Home')) {
									echo '<a class="home active" href="/home">Home</a>';
								} else {
									echo '<a class="home" href="/home">Home</a>';
								}

								if (is_page('Upload')) {
									echo '<a class="upload active" href="/upload">Upload</a>';
								} else {
									echo '<a class="upload" href="/upload">Upload</a>';
								}

								if (is_page('Gallery')) {
									echo '<a class="gallery active" href="/gallery">Gallery</a>';
								} else {
									echo '<a class="gallery" href="/gallery">Gallery</a>';
								}
							?>
						</nav>
		    		<?php
				    	}
	    			?>
                </header>