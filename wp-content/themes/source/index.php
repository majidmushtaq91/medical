<?php get_header(); ?>

<?php

    $db = mysqli_connect('localhost', 'root', 'root', 'wp');


    $sql = "SELECT * from wp_users WHERE id = 1";


    $query = mysqli_query($db, $sql);





?>




			<?php //echo get_template_directory_uri(); ?>
			<!--Widget-->
            <?php //if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("branding") ) : ?>
			<?php //endif; ?>
			<!--Widget-->
			
			<!--Post Query-->
			<?php //query_posts( 'p=1' ); if(have_posts()): while(have_posts()): the_post(); ?>
			<?php //the_ID();?>
			<?php //the_title();?>
			<?php //the_content();?>
			<?php //endwhile; endif; wp_reset_query(); ?>
			<!--Post Query-->
			
			<!--Post Query-->
			<?php //query_posts('post_type=Slider&showposts=3'); ?>
			<?php //if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>		
			<?php //the_post_thumbnail(''); ?>
			<?php //the_title(); ?>
			<?php //$content=get_the_content();excerpt($content, '200');?>
			<?php //endwhile; endif; wp_reset_query(); ?>
			<!--Post Query-->

			<?php //query_posts('page_id=2'); while (have_posts ()): the_post(); ?> 
			<?php //the_ID();?>
			<?php //the_title();?>
			<?php //the_content();?>
			<?php //endwhile; ?>

<?php
    my('Test', 1);
?>
?>
			
</div> <!--Container-->
<?php get_sidebar(); ?>

<?php get_footer(); ?>