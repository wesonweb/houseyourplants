<?php /* Template Name: Find Your Plant */ ?>
<?php get_header(); ?>
<!-- content START -->
	<div class="find-your-plant" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/houseplant.jpg)">
    <div class="find-your-plant-container br--md">
      <div class="plantfinder-intro bg--dark ">
          <div class="plantfinder-intro__content">
            <h2 class="text-white text-center">Find a plant</h2>
            <p class="text-white">Use the plant finder below to search for your plant by room, location and how hard or easy you'd like it to be to look after</p>
          </div>
        </div>
      <form method="POST" action="../find-your-plant-search" id="plant-searchform" class="searchform bg--dark">
        <div class="searchform-contents clearfix">
          <!-- choose a room -->
          <div class="room-choice">
            <label for='room'>Which room is the plant for?</label>
            <div class="form-select">

              <?php
              //create first taxonomy drop down for room
              $terms = get_terms('room'); // retrieve taxonomy term called room
              if (!empty($terms) && !is_wp_error($terms)) :
                echo '<select id="room" name="room" required>';
              ?>
                <option value="">choose a room</option>
              <?php
                foreach ($terms as $term) :
                  echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
                endforeach;
                echo '</select>';
              endif; ?>
            </div><!-- end room select -->
          </div> <!-- end room choice div -->

          <!-- create second drop down taxonomy for position		 -->
          <div class="position-choice">
            <label for="position">Where do you want to put it?</label>
            <div class="form-select">
              <?php
              $terms = get_terms('position'); // retrieve taxonomy term called room
              if (!empty($terms) && !is_wp_error($terms)) : //check if any terms have been returned and for any errors
                echo '<select name="position" required>';
              ?><option value="">choose a position</option>
              <?php
                foreach ($terms as $term) : //loop through the $terms object to show terms in form
                  echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
                endforeach;
                echo '</select>';
              endif;
              ?>

            </div><!-- end form select -->
          </div> <!-- end position choice div -->

          <div class="care-level-choice">
            <label for='care_level'>How difficult should it be to look after?</label>
            <div class="form-select">
              <?php
              //create third drop down taxonomy for position
              $terms = get_terms('care_level'); // retrieve taxonomy term called care_level
              if (!empty($terms) && !is_wp_error($terms)) :
                echo '<select name="care_level" id="care" required>';
              ?><option value="">choose care level</option>
              <?php
                foreach ($terms as $term) :
                  echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
                endforeach;
                echo '</select>';
              endif;
              ?>

            </div>
          </div>
        </div>

        <input type="hidden" name="submitted" value="Y">
        <input class="btn btn--primary br--md m-auto" id="search-button" type="submit" value="Search ">

      </form>
    </div>
  </div>
<?php get_footer(); ?>
<script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
