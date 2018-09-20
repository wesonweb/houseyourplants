<?php get_header(); ?>
	<article class="featured-plant-post container">
		<h2 class="page-title">Featured Plant</h2>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="featured-plant-intro">
					<div class="featured-plant-name">
						<h2><?php the_field("common_name"); ?></h2>
							<h3><span class="scientific-name"><?php the_field("scientific_name"); ?></span></h3>
					</div> <!-- end featured plant name div -->
					<div class="featured-plant-image">
						<img src="<?php the_field("featured_plant_image"); ?>" />
					</div>
				</div> <!-- end featured plant intro -->

				<div class="featured-plant-content">
					<?php the_content(); ?>
				</div> <!-- end featured-plant-content -->

			<?php endwhile; else : ?>
				<p><?php _e( 'Sorry, there don\'t seem to be any plants.' ); ?></p>
			<?php endif; ?>

			<?php include ('inc/what-now-nav.php'); ?>
	</article> <!-- close featured plant -->
<?php get_footer(); ?>
