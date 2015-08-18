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
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.1.min.js"> </script>
	<script src="<?php bloginfo('template_directory'); ?>/js/sam_v1.0.js"> </script>
	<script src="<?php bloginfo('template_directory'); ?>/js/nav.js"> </script>


	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>

</head>




<body class=" <?php echo $sam; ?>samtechpk <?php body_classes(); ?>">

<!-- Wrapper Start -->
<div id="wrapper">

<!--Wrapper_inner-->
	<div class="wrapper_inner">

<!-- Header
================================================== -->
		<div id="header">
			
			
			<!-- Logo
			================================================== -->
			<a class="logo" href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>"></a>
			
			<!-- Navigation with dropdown
			================================================== -->
			<div id="navigation">

				<?php 
				  wp_nav_menu(array(
				  'walker' => new My_Walker_Nav_Menu(),
				  'menu'=>'navigation with more options',
				  'container' => '',
				  'menu_id'  => 'nav',
				  'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				  'menu_class' => 'menu')); 
				?>
			</div> 

		</div> 
<!-- Header /END
================================================== -->
	
	
<div class="clear"> </div>


		<!-- Slider
		================================================== -->
		<div class="slider_wrapper">
			<?php include (TEMPLATEPATH . '/slider.php' ); ?>
		</div>

<div class="container">