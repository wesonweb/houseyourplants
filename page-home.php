<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

			<div class="homepage-introduction">

				<div class="container">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="welcome-message">

						<h2><?php the_field("first_welcome_line", 39); ?></h2>

							<h3><?php the_field("second_welcome_line_", 39); ?></h3>

								<p><?php the_field("third_welcome_line", 39); ?></p>

									<a href="<?php echo get_permalink(41); ?>" class="button">Find me a plant</a>

								</div>
								<!-- END inner wrap -->

					</div> <!-- end welcome message -->

			</div><!-- end homepage-introduction div -->

			<div class="homepage-content">

				<div class="container">
					<div class="why-plants">
						<h2><?php the_field("why_keep_houseplants_title", 39); ?></h2>
						<p><?php the_field("why_keep_houseplants_content", 39); ?></p>
						<a href="<?php echo esc_url( get_permalink(61) ); ?>" class="button">Read more</a>
					</div><!-- end why-plants div -->

					<div class="featured-plant">
        	<?php $latest_plant = new WP_Query('post_type=featured_plants&posts_per_page=1');

	      		if ($latest_plant-> have_posts() ) : while ( $latest_plant->have_posts() ) : $latest_plant->the_post(); ?>

	            <div class="latest-post">
								<a href="<?php the_permalink(); ?>" class="">
									<h2>Featured Plant</h2>
									<?php the_post_thumbnail('medium'); ?>
									<div class="summary">
										<?php the_excerpt(); ?>
									</div>
									<h3><?php the_title(); ?></h3>
									</a>
				            </div> <!-- end latest post div -->
			         	<?php endwhile; endif; wp_reset_query(); ?>
			      	</div> <!-- end featured plant div -->
						<?php endwhile; endif; ?>
						</div>
						<!-- END INNER WRAP -->

			</div> <!-- end homepage-content -->


<?php get_footer(); ?>
