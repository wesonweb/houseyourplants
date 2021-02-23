<?php /* Template Name: Find Your Plant */ ?>
	<?php get_header(); ?>

		<!-- content START -->
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php endwhile; endif; ?>
					<div class="plantfinder-intro">
						<div class="container">
							<h2><span class="entry-title">Find a plant</span></h2>
							<p>Use the plant finder below to search for your plant by room, location and how hard or easy you'd like it to be to look after</p>
						</div>
					</div><!--end plantfinder intro -->
				<div class="form-container">
				<form method="POST"	action="../find-your-plant-search" id="plant-searchform" class="searchform container clearfix">

							<div class="searchform-contents clearfix">
								<!-- choose a room -->
								<div class="room-choice">
									<!-- <h3>I want a plant for...</h3> -->
										<label for='room'>Which room is the plant for?</label>
											<div class="form-select">
												<?php
												//create first taxonomy drop down for room
												$terms = get_terms('room'); // retrieve taxonomy term called room
												if(!empty($terms) && !is_wp_error($terms) ):
												echo '<select id="room" name="room" required>' ;
														?><option value="">choose a room</option> <?php
												foreach ($terms as $term) :
												echo '<option value="' . $term->slug . '">' .$term->name.'</option>';
												endforeach;
												echo '</select>';
												endif; ?>
											</div><!-- end room select -->
									</div> <!-- end room choice div -->

									<!-- create second drop down taxonomy for position		 -->
									<div class="position-choice">
										<!-- <h3>And where in the room do you want to put it?</h3> -->
											<label for="position">Where do you want to put it?</label>
											<div class="form-select">
												<?php
												$terms = get_terms('position'); // retrieve taxonomy term called room
												if(!empty($terms) && !is_wp_error($terms) ): //check if any terms have been returned and for any errors
												echo '<select name="position" required>' ;
												?><option value="">choose a position</option> <?php
												foreach ($terms as $term) : //loop through the $terms object to show terms in form
												echo '<option value="' . $term->slug . '">' .$term->name.'</option>';
												endforeach;
												echo '</select>';
												endif;
												?> <!-- end php block -->
										</div><!-- end form select -->
									</div> <!-- end position choice div -->

								<div class="care-level-choice">
									<!-- <h3>And do you want the plant to be easy to care for? Or more difficult?</h3> -->
									<label for='care_level'>How difficult to look after?</label>
										<div class="form-select">
											<?php
											//create third drop down taxonomy for position
											$terms = get_terms('care_level'); // retrieve taxonomy term called care_level
											if(!empty($terms) && !is_wp_error($terms) ):
											echo '<select name="care_level" id="care" required>';
											?><option value="">choose care level</option> <?php
											foreach ($terms as $term) :
											echo '<option value="' . $term->slug . '">' .$term->name.'</option>';
											endforeach;
											echo '</select>';
											endif;
											?> <!-- end php block -->
									</div><!-- end form select -->
								</div> <!-- end care-level choice div -->
							</div>
							<!-- end searchform-contents-->

					<input type="hidden" name="submitted" value="Y">
					<input id="search-button" type="submit" value="Search &raquo; ">
				</div><!-- end form container -->
			</form>

<?php get_footer(); ?>
<script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
