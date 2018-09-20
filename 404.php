
<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */


get_header(); ?>

<div class="wrapper">

		<main id="main" class="site-main" role="main">

			<section class="error-404 page-content">


					<h1 class="page-title"><?php _e( 'Oops! No plants growing here.'); ?></h1>

					<p><?php _e( 'Looks as if the page you were looking for isn\'t here. '); ?><br />
					You could use the main site navigation above or choose from the options below to follow your journey.</p>

					


					<!-- what now navigation include -->
					<?php include ('inc/what-now-nav.php'); ?>

					


			</section><!-- .error-404 -->

	</div><!-- .content-area -->

<?php get_footer(); ?>

</div> <!-- end wrapper div -->
