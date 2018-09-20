<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

	<div class="container">

				<h2 class="page-title">	<?php the_title() ?></h2>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php the_content( ); ?>

		         	<?php endwhile; endif;  ?>

  </div>
	<!-- end inner-wrap div -->

<?php get_footer(); ?>
