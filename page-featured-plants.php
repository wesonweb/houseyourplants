<?php /* Template Name: Featured Plants */ ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php endwhile; endif;
wp_reset_postdata(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main featured-plants-homepage">
			<div class="plantfinder-intro">
				<h2 class="page-title"><?php the_title(); ?></h2>
			</div>
				<div class="plantfinder-intro__standfirst container">
						<p>In this section we'll take a more in-depth look at some indoor plants and some of the more unusual plants that you can bring to your home.</p>
				</div>

				<div class="container">
					<ul class="grid">
						<?php $featuredplants = new WP_Query( array (
							'post_type' 		=> 'featured_plants',
							'post_per_page' => -1
						)
					);
					while ($featuredplants->have_posts() ): $featuredplants->the_post(); ?>
					<li class="grid-item featured-bg">
						<a href="<?php the_permalink(); ?>" class="featured-plant__link br--md">
              <div>
                <?php $thumb_url = get_the_post_thumbnail_url(); ?>
                <img src="<?php echo $thumb_url; ?>" alt="<?php the_title(); ?>" class="thumb">

                <div class="featured-plant__header p-sm">
                  <h2 class="text-center text-white"><?php the_title(); ?></h2>
                </div>
              </div>
              <div class="featured-plant__summary p-sm">
                <?php the_excerpt(); ?>
                <i class="fa-solid fa-circle-arrow-right"></i>
              </div>
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
