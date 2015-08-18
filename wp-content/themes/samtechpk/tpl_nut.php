<?php
/**
 * Template Name: Nutritional Information
 */
get_header();
#print_r($_GET);
global $wp_query;
$query_page = $wp_query->query_vars['website_page'];
echo 'Food : ' . $query_page;
echo '<br />';
echo 'Variety : ' . $wp_query->query_vars['variety'];
// ... more ...
print_r($wp_query->query_vars);
get_footer();
?>