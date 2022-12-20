<?php get_header(); ?>
<article class="content-container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1 class="page-heading"><?php the_title(); ?></h1>
			<?php the_content(); ?>

      <a href="<?php echo get_page_link(43); ?>" class="btn btn--primary br--md">view all featured plants</a>

		<?php endwhile;
	else : ?>
		<p><?php _e('Sorry, there don\'t seem to be any plants.'); ?></p>
	<?php endif; ?>
</article> <!-- close featured plant -->

<?php include('inc/what-now-nav.php'); ?>
<?php get_footer(); ?>
