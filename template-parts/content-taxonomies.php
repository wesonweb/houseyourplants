	<div class="plant__taxonomies">
	  <?php
    //check to see if there is any taxonomy info to return
    $tax_text = "";
    //create variables to store taxonomy information
    $room_list = get_the_term_list($post->ID, 'room', 'You chose a plant that most suits the ', ' or ');
    $position_list = get_the_term_list($post->ID, 'position', ', the position for this plant is  ', ' or ');
    $care_level_list = get_the_term_list($post->ID, 'care_level', ' and the level of care for this plant is ', ', ');
    //add room taxonomy if it is in this post
    if ('' != $room_list) {
      $tax_text .= "$room_list";
    }

    if ('' != $position_list) {
      $tax_text .= "$position_list";
    }

    if ('' != $care_level_list) {
      $tax_text .= "$care_level_list";
    }

    if ('' != $tax_text) {
    ?>
	    <div class="plant__taxonomy-items">
	      <?php echo '<p class="text-center">' . $tax_text . '</p>'; ?>
	    </div>

	  <?php
    } //end if
    ?>
	</div>
