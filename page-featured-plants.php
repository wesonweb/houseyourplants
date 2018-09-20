<?php /* Template Name: Featured Plants */ ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php endwhile; endif;
wp_reset_postdata(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main featured-plants-homepage">
			<div class="plantfinder-intro">
				<h2 class="entry-title"><?php the_title(); ?></h2>
			</div>
				<div class="container">
						<p>In this section we'll take a more in-depth look at some indoor plants and some of the more unusual plants that you can bring to your home.</p>
				</div>

				<div class="container">
					<ul class="featuredplant-container">
						<?php $featuredplants = new WP_Query( array (
							'post_type' 		=> 'featured_plants',
							'post_per_page' => -1
						)
					);
					while ($featuredplants->have_posts() ): $featuredplants->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
						<div>
							<?php the_post_thumbnail(); ?>
							<h2><?php the_title(); ?></h2>
						</div>
						<?php the_excerpt(); ?>
					</a>
					</li>
						<?php endwhile; ?>
				</ul>
			</div>
	<?php get_template_part('template-parts/pagination'); ?>
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
