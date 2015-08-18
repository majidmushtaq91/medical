<?php get_header(); ?>
<style>
	body {
		background:url(<?php bloginfo('template_url')?>/images/body_bg2.png) repeat-x #fff;
	}
</style>
		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
			<div class="pages_title">
				<h2><?php single_cat_title(); ?></h2>
			</div>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<div class="pages_title">
				<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
			</div>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>

			<div class="pages_title">
				<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
			</div>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				
			<div class="pages_title">
				<h2>Archive for <?php the_time('F, Y'); ?></h2>
			</div>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				
			<div class="pages_title">
				<h2>Archive for <?php the_time('Y'); ?></h2>
			</div>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				
			<div class="pages_title">
				<h2>Author Archive</h2>
			</div>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				
			<div class="pages_title">
				<h2>Blog Archives</h2>
			</div>
			
			<?php } ?>

			
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			 while (have_posts()) : the_post(); ?>
			
				<div class="blogEntries">
				
				<p><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></p>
				<div class="blogMeta">
				<?php include (TEMPLATEPATH . '/inc/blog.php' ); ?>
				</div>
				<div class="blogCatView">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php $content=get_the_content();excerpt($content, '180');?>
				</div>
				<div class="clear"></div>
				<a class="blogMore" href="<?php the_permalink() ?>">Read More</a>
					
				</div>

			<?php endwhile; ?>
			<div class="clear"></div>
			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>