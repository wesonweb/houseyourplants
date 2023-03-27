<?php /* Template Name: Plant page */ ?>
<?php get_header(); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();	?>
				<!-- this appears at the top of the page, showing the room, location and care level that the user chose  -->
				<div class="plant__taxonomies">
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
					<div class="plant__taxonomy-items">
						<?php echo '<p class="text-center">' .$tax_text.'</p>'; ?>
					</div>

					<?php
						} //end if
					?>
				</div>
				<article class="single-plant">
					<div class="single-plant__intro">
						<section class="single-plant__img-section">
							<div class="single-plant__img-container">
								<img src=<?php the_field("primary_plant_photo"); ?>
								class="single-plant__img"  alt="<?php the_title(); ?>" />
							</div> <!-- end main-plant-image div -->
							<div class="main-plant__name">
								<h2 class="plant-title"><?php the_title(); ?></h2>
								<span class="scientific-name"><?php the_field("scientific_name") ?></span>
							</div>
						</section>

						<section class="single-plant__quick-care">
							<h3 class="section-title text-center">Quick care guide</h3>
								<ul class="single-plant__list icons">

									<li class="single-plant__item">
										<img src="<?php echo get_stylesheet_directory_uri(); 							?>/images/icons/sunshine.svg"
										class="single-plant__icon"
										alt="lighting icon" width="42" height="42" />
										<div class="plant-info">
                      <h3 class="single-plant__icon-title">Lighting</h3>
										<p class="text-center"><?php the_field("lighting"); ?></p>
										</div>
									</li>

									<li class="single-plant__item">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/watering.svg"
										class="single-plant__icon"
										alt="watering icon" width="42" height="42" />
										<div class="plant-info">
											<h3 class="single-plant__icon-title">Watering</h3>
											<p class="text-center"><?php the_field("watering"); ?></p>
										</div>
									</li>


                  <li class="single-plant__item">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/humidity.svg"
                    class="single-plant__icon"
                    alt="humidity icon" width="42" height="42" />
                    <div class="plant-info">
                      <h3 class="single-plant__icon-title">Humidity</h3>
                      <p class="text-center"><?php the_field("humidity"); ?></p>
                    </div>
                  </li>


                  <li class="single-plant__item">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/feeding.svg"
                    class="single-plant__icon"
                    alt="feeding icon" width="42" height="42" />
                    <div class="plant-info">
                      <h3 class="single-plant__icon-title">Feeding</h3>
                      <p class="text-center"><?php the_field("feeding"); ?></p>
                    </div>
                  </li>


                  <li class="single-plant__item">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/temperature.svg"
                    class="single-plant__icon"
                    alt="temperature icon" width="42" height="42" />
                    <div class="plant-info">
                      <h3 class="single-plant__icon-title">Temperature</h3>
                      <p class="text-center"><?php the_field("temperature"); ?>
                      </p>
                    </div>
                  </li>

                  <li class="single-plant__item">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/pests.svg"
                    class="single-plant__icon"
                    alt="pest icon" width="42" height="42" />
                    <div class="plant-info">
                      <h3 class="single-plant__icon-title">Pests</h3>
                      <p class="text-center"><?php the_field("quick-care_pests"); ?></p>
                    </div>
                  </li>

							</ul>
						</section>
          </div>

					<!-- plant description section starts -->
					<section class="single-plant__description">
						<div class="container">
							<h3 class="section-title text-center">About the <?php the_title(); ?></h3>
							<?php the_field("introduction"); ?>
						</div>
					</section>
					<!-- end plant description section -->

					<!-- main care section starts -->
					<section class="single-plant__care container">
						<h3 class="section-title text-center">Caring for your <?php the_title(); ?></h3>

            <ul class="single-plant__list">

              <li class="single-plant__item">
								<div class="care-info__header">
									<img src="<?php echo get_stylesheet_directory_uri(); 							?>/images/icons/sunshine.svg"
									class="single-plant__icon"
									alt="lighting icon" width="40" height="40" />
									<h3>lighting</h3>
								</div>
								<p><?php the_field("detailed_lighting"); ?></p>
							</li>

							<li class="single-plant__item">
								<div class="care-info__header">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/watering.svg"
										class="single-plant__icon"
										alt="watering icon" width="40" height="40" />
									<h3>watering</h3>
								</div>
								<p><?php the_field("detailed_watering"); ?></p>
							</li>

							<li class="single-plant__item">
								<div class="care-info__header">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/humidity.svg"
										class="single-plant__icon"
										alt="watering icon" width="40" height="40" />
									<h3>humidity</h3>
								</div>
								<p><?php the_field("detailed_humidity"); ?></p>
							</li>

							<li class="single-plant__item">
								<div class="care-info__header">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/feeding.svg"
										class="single-plant__icon"
										alt="watering icon" width="40" height="40" />
									<h3>feeding</h3>
								</div>
								<p><?php the_field("detailed_feeding"); ?></p>
              </li>

              <li class="single-plant__item">
								<div class="care-info__header">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/temperature.svg"
										class="single-plant__icon"
										alt="watering icon" width="40" height="40" />
									<h3>temperature</h3>
								</div>
								<p><?php the_field("detailed_temperature"); ?></p>
							</li>

							<li class="single-plant__item">
								<div class="care-info__header">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/pests.svg"
										class="single-plant__icon"
										alt="watering icon" width="40" height="40" />
									<h3>pests</h3>
								</div>
								<p><?php the_field("pests"); ?></p>
							</li>

						</ul>
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
