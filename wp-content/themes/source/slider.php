<div class="samtech home">
	<ul class="slides">
		<?php query_posts('post_type=Slider&showposts=10'); 
		 if (have_posts()) : while (have_posts()) : the_post();
		 $slider_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "slider-cropped"); ?>
			<li class=" slide_<?php the_ID();?>">
			<?php if ( has_post_thumbnail() ) {?>
				<img src="<?php echo $slider_img[0];?>" alt="" class="slide_<?php the_ID();?>" />
				
				<?php } else {?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/slider-img-01.jpg" alt="" />
				
				<?php } ?>
			
				<?php if (get_field('have_caption')): ?>
			
					<div class="slide-caption">
						<h3><?php the_title();?></h3>
						<p><?php $content=get_the_content();excerpt($content, '180');?></p>
					</div>

				<?php endif ?>
			</li> 
			
		<?php endwhile; else : ?>
		
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/slider-img-01.jpg" alt="" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/slider-img-02.jpg" alt="" /></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/slider-img-03.jpg" alt="" /></li>
			
		<?php endif; wp_reset_query();?>	
			
	</ul>
</div>