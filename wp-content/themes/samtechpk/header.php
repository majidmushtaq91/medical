<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<!-- CSS
	================================================== -->
	<!--<link rel="shortcut icon" href="/favicon.ico">-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	
	<!-- Java Script
	================================================== -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link href='//fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>

    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-migrate-1.1.1.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.mobilemenu.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/camera.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.ui.totop.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/sam_v1.0.js"></script>
    <script>
        $(document).ready(function(){
            $('#slider').camera({
                height: '35.75%',
                loader: true,
                minHeight: '200px',
                navigation: false,
                navigationHover: false,
                pagination:true,
                playPause: false,
                thumbnails: false,
                fx: 'simpleFade'
            });
        });
    </script>

    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
    <link rel="stylesheet" media="screen" href="<?php bloginfo('template_directory'); ?>/css/ie.css">
    <![endif]-->

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>

</head>


<body>
<!--======================== header ============================-->
<header>
    <div class="container">
        <div class="row">
            <div class="grid_12">
                <!--======================== logo ============================-->
                <div class="wrapper">
                    <h1>
                        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="logo"></a>
                    </h1>

                    <form id="search" action="search.php" method="GET" accept-charset="utf-8" class="search_form">
                        <input type="text" name="s" placeholder="Search...">
                        <a onclick="document.getElementById('search').submit()" href="#">
                            <span class="fa fa-search"></span>
                        </a>
                    </form>

                    <div class="header_contacts">
                        <h6>
                            One of our representatives will happily contact you within
                            <span>24 hours.</span>
                            For urgent needs call us at
                        </h6>
                        <h5>
                            (800) 2345-6789
                        </h5>
                    </div>

                </div>
                <!--======================== menu ============================-->
                <nav>
                    <ul class="sf-menu clearfix">

                        <li class="current">
                            <span></span>
                            <a href="#">Home</a>
                        </li>

                        <li>
                            <span></span>
                            <a href="#">About</a>
                            <ul>
                                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                                <li><a href="#">Conse ctetur adipisicing </a>
                                    <ul>
                                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                                        <li><a href="#">Conse ctetur adipisicing </a></li>
                                        <li><a href="#">Elit sed do eiusmod tempor</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Elit sed do eiusmod tempor</a></li>
                            </ul>
                        </li>
                        <li>
                            <span></span>
                            <a href="#">Products</a>
                        </li>
                        <li>
                            <span></span>
                            <a href="#">Events</a>
                        </li>
                        <li>
                            <span></span>
                            <a href="#">Contacts</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <!--=================== slider ==================-->
                    <?php include (TEMPLATEPATH . '/slider.php' ); ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!--======================== content ===========================-->