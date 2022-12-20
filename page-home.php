<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>
  <div class="homepage-introduction" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/houseplant.jpg)">">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="welcome-message br">
            <h2 class="welcome-head text-white"><?php the_field("first_welcome_line", 39); ?></h2>
            <h3 class="welcome-subhead text-white"><?php the_field("second_welcome_line_", 39); ?></h3>
            <a href="<?php echo get_permalink(41); ?>" class="btn btn--primary br--lg">Find me a plant</a>
          </div><!-- end homepage-introduction div -->
  </div>
	<div class="container">
    <div class="homepage-content">
      <div class="featured-plant">
        <?php $latest_plant = new WP_Query('post_type=featured_plants&posts_per_page=1');
				if ($latest_plant->have_posts()) : while ($latest_plant->have_posts()) : $latest_plant->the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="featured-plant__link home br--md">
            <div class="featured-plant__header p-sm">
							<h2 class="text-white text-center ls-md">Featured Plant</h2>
              <h3 class="text-white text-center"><?php the_title(); ?></h3>
            </div>
              <?php $thumb_url = get_the_post_thumbnail_url(); ?>
              <img src="<?php echo $thumb_url; ?>" alt="<?php the_title(); ?>" class="thumb">
							<div class="featured-plant__summary p-sm">
								<?php the_excerpt(); ?>
                <i class="fa-solid fa-circle-arrow-right"></i>
							</div>
						</a>
			<?php endwhile;
				endif;
				wp_reset_query(); ?>
      </div> <!-- end featured plant div -->

      <div class="why-plants">
        <h2 class=""><?php the_field("why_keep_houseplants_title", 39); ?></h2>
        <p class=""><?php the_field("why_keep_houseplants_content", 39); ?></p>
        <a href="<?php echo esc_url(get_permalink(61)); ?>" class="btn btn--primary br--lg">Read more</a>
      </div><!-- end why-plants div -->
    <?php endwhile;
		endif; ?>
    </div> <!-- end homepage-content -->
<?php get_footer(); ?>
  </div>
