<!-- last updated 13 Aug 2015 -->


<?php /* Template Name: Plant page */ ?>

<?php get_header(); ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();	?>
				<!-- this appears at the top of the page, showing the room, location and care level that the user chose  -->
				<div class="chosen-plant-summary">
					<?php
						//check to see if there is any taxonomy info to return
							$tax_text = "";
						//create variables to store taxonomy information
							$room_list = get_the_term_list( $post->ID, 'room', 'You chose a plant that most suits the ',' or ' );
							$position_list = get_the_term_list( $post->ID, 'position', ', the position for this plant is  ' ,' or ' );
							$care_level_list = get_the_term_list( $post->ID, 'care_level', ' and the level of care for this plant is ',', ' );
						//add room taxonomy if it is in this post
							if ( '' !=$room_list) {
								$tax_text .= "$room_list";
							}

							if ( '' !=$position_list) {
								$tax_text .= "$position_list";
							}

							if ( '' !=$care_level_list) {
								$tax_text .= "$care_level_list";
							}

							if( '' !=$tax_text) {
						?>

					<div class="taxonomy-info container">
						<?php echo '<p>' .$tax_text. '</p>'; ?>
					</div>

					<?php
						} //end if
					?>
				</div> <!-- end chosen plant summary div -->
				<article class="plant-content-container ">
					<div class="intro-container clearfix">
						<section class="plant-intro-section clearfix">
							<div class="main-plant-image-container">
								<img src=<?php the_field("primary_plant_photo"); ?>
								class="main-plant-image"  alt="<?php the_title(); ?>" />
							</div> <!-- end main-plant-image div -->
							<div class="main-plant__name">
								<h2 class="plant-title"><?php the_title(); ?></h2>
								<span class="scientific-name"><?php the_field("scientific_name") ?></span>
							</div>
							
						</section>
						<!-- end plant intro section -->
						<!-- quick care info section starts -->
						<section class="quick-care-section container clearfix">
							<h3 class="section-title">Quick care guide</h3>
								<ul class="quick-care-guide container">

									<li class="quick-care-info">
										<img src="<?php echo get_stylesheet_directory_uri(); 							?>/images/icons/sunshine.svg"
										class="quick-care-icon"
										alt="lighting icon" width="60" height="60" />
										<div class="plant-info">
										<h3><span class="sunshine">Lighting</span></h3>
										<p><?php the_field("lighting"); ?></p>
										</div>
									</li>
									<!-- end quick care info -->

									<li class="quick-care-info">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/watering.svg"
										class="quick-care-icon"
										alt="watering icon" width="60" height="60" />
										<div class="plant-info">
											<h3><span class="watering">Watering</span></h3>
											<p><?php the_field("watering"); ?></p>
										</div>
									</li>
									<!-- end quick care info -->

								<li class="quick-care-info">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/humidity.svg"
									class="quick-care-icon"
									alt="humidity icon" width="60" height="60" />
									<div class="plant-info">
										<h3><span class="humidity">Humidity</span></h3>
										<p><?php the_field("humidity"); ?></p>
									</div>
								</li>
								<!-- end quick care info -->

								<li class="quick-care-info">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/feeding.svg"
									class="quick-care-icon"
									alt="feeding icon" width="60" height="60" />
									<div class="plant-info">
										<h3><span class="feeding">Feeding</span></h3>
										<p><?php the_field("feeding"); ?></p>
									</div>
								</li>
								<!-- end quick care info -->

								<li class="quick-care-info">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/temperature.svg"
									class="quick-care-icon"
									alt="temperature icon" width="60" height="60" />
									<div class="plant-info">
										<h3><span class="temperature">Temperature</span></h3>
										<p><?php the_field("temperature"); ?>
										</p>
									</div>
								</li>
								<!-- end quick care info -->

								<li class="quick-care-info">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/pests.svg"
									class="quick-care-icon"
									alt="pest icon" width="60" height="60" />
									<div class="plant-info">
										<h3><span class="pests">Pests</span></h3>
										<p><?php the_field("quick-care_pests"); ?></p>
									</div>
								</li>
								<!-- end quick care info -->
							</ul>
								<!-- end quick care guide -->

						</section>
					<!-- end quick care section -->
				</div><!-- end intro container -->

					<!-- plant description section starts -->
					<section class="plant-description-section container clearfix">
						<div class="plant-description-info container">
							<h3 class="section-title">About the <?php the_title(); ?></h3>
							<?php the_field("introduction"); ?>
						</div>
					</section>
					<!-- end plant description section -->

					<!-- main care section starts -->
					<section class="house-plant-care-section container clearfix">
						<h3 class="section-title">Caring for your <?php the_title(); ?></h3>
						<ul class="detailed-care-info clearfix">
							<li class="care-info">
								<h3><span class="lighting">lighting</span></h3>
								<p><?php the_field("detailed_lighting"); ?></p>
							</li>
							<!-- end care info div -->
							<li class="care-info">
								<h3><span class="watering">watering</span></h3>
								<p><?php the_field("detailed_watering"); ?></p>
							</li>
							<!-- end care info div -->

							<li class="care-info">
								<h3><span class="humidity">humidity</span></h3>
									<p><?php the_field("detailed_humidity"); ?></p>
							</li>
							<!-- end care info div -->

							<li class="care-info">
								<h3><span class="feeding">feeding</span></h3>
									<p><?php the_field("detailed_feeding"); ?></p>
							</li>
							<!-- end care info div -->

							<li class="care-info">
								<h3><span class="temperature">temperature</span></h3>
									<p><?php the_field("detailed_temperature"); ?></p>
							</li>
							<!-- end care info div -->

							<li class="care-info">
								<h3><span class="pests">pests</span></h3>
									<p><?php the_field("pests"); ?></p>
							</li>
							<!-- end care info div -->
						</ul> <!-- end detailed care info div -->
					</section>
					<!-- end house plant care section -->

				<!-- first aid section starts -->
				<section class="first-aid-section container clearfix">
					<h3 class="section-title">First aid for your <?php the_title(); ?></h3>
						<h3>Common problems</h3>

						<div class="first-aid-problem">
							<h4><span class="plant-problem"><?php the_field("plant_problem_1"); ?></span></h4>
							<p class="plant-answer"><?php the_field("plant_solution_1"); ?>
						</div>
						<!-- end first aid problem -->

						<div class="first-aid-problem">
							<h4><span class="plant-problem"><?php the_field("plant_problem_2"); ?></span></h4>
							<p class="plant-answer"><?php the_field("plant_solution_2"); ?>
						</div>
						<!-- end first aid problem -->
				</section>
				<!-- end first aid section -->

				<section class="disqus container">
					<h3 class="section-title">Need some more help?</h3>
						<p>Do you own this plant and have any tips to offer? <br />
						Is your plant not doing too well and you'd like some advice on how to help it?<br />
						Why not ask others for help or leave some advice below.</p>
						<?php disqus_embed('houseyourplants'); ?>
				</section>
				<!-- end disqus section -->
		</article>

		<!-- what now navigation include -->
		<?php include ('inc/what-now-nav.php'); ?>

		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, we cannnot find any plants that match what you are looking for.' ); ?></p>
		<?php endif; ?>

<?php get_footer(); ?>
