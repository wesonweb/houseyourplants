<?php /* Template Name: Find Your Plant Search Page */ ?>

<?php get_header(); ?>
<div class="results">
	<div class="container">
		<h2 class="page-title">Here are the plants we've found</h2>
	</div>
</div>

<?php if (!empty($_POST['submitted']) == 'Y') : //checks if hidden input field in plant search form has returned Y
	$room = esc_html($_POST['room']); //esc_html to prevent injection of harmful code
	$position = esc_html($_POST['position']);
	$care_level = esc_html($_POST['care_level']);
      endif;

  $args = array(
    'post_type' 			=> 	'plant', //return posts that are post type plant (individual plant posts)
    'posts_per_page'		=>	'-1', //displays all plant posts
    'orderby' 				=> 	'title', //order by title name
    'tax_query'				=> 	array(
      'relation'				=>	'AND',

      array(
        'taxonomy'		=> 	'room',
        'field'			=> 	'slug',
        'terms'			=>	$room
      ),

      array(
        'taxonomy'		=> 	'position',
        'field'			=> 	'slug',
        'terms'			=>	$position
      ),

      array(
        'taxonomy'		=> 	'care_level',
        'field'			=> 	'slug',
        'terms'			=>	$care_level
      ),

    ),
  );
?>

<?php
$loop = new WP_Query($args); ?>

<!-- Display the plant result summaries -->
<div class="plant-container">
	<ul>
		<?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
    <li class="card">
      <a href="<?php the_permalink(); ?>" class="results-link-image">
        <?php the_post_thumbnail(); ?>
        <div class="summary">
          <h2 class="entry-title"><?php the_title(); ?></h2>

          <?php the_excerpt(); ?>
        </div>
      </a>
    </li>
    <?php endwhile;
		else : ?>

    <div class="container">
      <p class="no-plants-found"> Sorry, it looks as if there aren't any plants that match what you're looking
        for.
        <br /> More plants will be added soon.
      </p>
    </div>
    <?php endif; ?>
	</ul> <!-- end plant container -->
</div>

<?php include('inc/what-now-nav.php'); ?>

<?php get_footer(); ?>
