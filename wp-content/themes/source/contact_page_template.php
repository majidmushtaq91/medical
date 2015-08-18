<?php
/*
Template Name: Contact Page
Author : Majid Mushtaq
*/
?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post();

		if (get_field('location')) {
			
			$location = get_field('location');
			$location = $location['address'];
		} else {

			$location = '209 Broadway, New York, NY 10007';
		}

	 ?>
			
		<div class="post" id="contact_page">

			<div class="pages_title">
				<h2><?php the_title(); ?></h2>
			</div>
			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">
				
				<div class="contact_left">
				
				<?php if (get_field('form_title') !== '') : ?>
					<h2 class="contact_title"><i class="fa fa-pencil-square-o"></i> <?php echo get_field('form_title'); ?></h2>
				<?php endif ?>

					<?php echo do_shortcode( '[contact-form-7 id="contact_page_form" title="Contact form 1"]' ); ?>
					
				</div>
				<?php if (get_field('contact_detail')): ?>
						
					
					<div class="contact_right">

					<?php if (get_field('form_title') !== '') : ?>	
						<h2 class="contact_title"><i class="fa fa-check-square-o"></i> <?php echo get_field('contact_detail_title'); ?></h2>
					<?php endif ?>

						<?php if (get_field('show_map')): ?>

							<iframe width="400" height="300" style="border: 0px solid #000000" src="http://maps.google.com/?q=<?php echo $location; ?>&amp;z=14&amp;output=embed&amp;t=m"></iframe>

							<hr />
						<?php endif ?>

						<p class="company"><?php bloginfo('name'); ?></p>
						<p class="address"><i class="fa fa-thumb-tack"></i>  <?php echo $location; ?></p>

						<?php if (get_field('phone') !== '') : ?>
							<p><span><i class="fa fa-phone"></i>  Telephone: </span> <?php echo get_field('phone'); ?></p>
						<?php endif ?>

						<?php if (get_field('fax') !== '') : ?>
							<p><span><i class="fa fa-print"></i>  Fax: </span> <?php echo get_field('fax'); ?></p>
						<?php endif ?>
						
						<p><span><i class="fa fa-envelope-o"></i>  Email:</span> <a href="mailto:<?php echo get_field('email');?>"><?php echo get_field('email');?></a></p>

						
					</div>

				<?php endif ?>	

			</div>

		</div>
		

		<?php endwhile; endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>