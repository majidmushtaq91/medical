<?php	
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
	
?>