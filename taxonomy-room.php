
	<?php get_header(); ?>


			<div class="results container">

				<h2 class="page-title">Here are the plants we found for:

				<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>

			</div>

		<div class="plant-container container">


				<?php if(have_posts()) : while(have_posts()) : the_post(); //begin the loop ?>

				 <div class="plant-entry">

							<h2 class="entry-title"><?php the_title(); ?></h2>

									<div class="summary">

									 	<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?> </a>

										<?php the_excerpt(); ?>



									<a href="<?php the_permalink(); ?>" class="button">View <?php the_title(); ?></a>
									</div>


						</div> <!-- end plant entry -->

				<?php endwhile;

				endif;  ?>

				</div> <!-- end plant container div -->





			<!-- include pagination -->
			<?php include ('inc/hyp_pagination.php'); ?>

			<?php include ('inc/what-now-nav.php'); ?>

	</div> <!-- end page content div -->

<?php get_footer(); ?>
