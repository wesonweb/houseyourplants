<?php
/**
 *template for plants archive page houseyourplants/plants/
 */
?>

<?php get_header(); ?>

	<div class="wrapper">

	<div class="page-content">

		<div class="plant-introduction inner-wrap">

			<div class="results inner-wrap">
				<h2 class="page-title">All plants</h2>

				<p>You can browse all plants in this section.<br />
				Select a plant to find out more information about it.</p>

			</div>

		</div> <!-- end plant introduction div -->

		<div class="plant-container inner-wrap">

			<?php if(have_posts()) : while(have_posts()) : the_post(); //begin the loop ?>

				<article class="plant-entry">

						<div class="summary">

							<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?> </a>
							<h2 class="entry-title"><?php the_title(); ?></h2>

							<?php the_excerpt(); ?>


							<a href="<?php the_permalink(); ?>" class="button">View <?php the_title(); ?></a>
						</div>
						<!-- end summary div -->

					</article> <!-- end plant entry -->


					<?php endwhile; endif;  ?>

					<!-- include pagination -->
					<?php include ('inc/hyp_pagination.php'); ?>

				</div> <!-- end plant container div -->

		<?php include ('inc/what-now-nav.php'); ?>

	</div> <!-- end page content div -->

</div>
<!-- end wrapper -->
<?php get_footer(); ?>
