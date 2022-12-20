<div class="pagination">
	<?php if (show_posts_nav()) : ?>
		<div class="page-number-section">
			<h3>See more</h3>
				<?php the_posts_pagination( array(
					'mid_size' => 2,
					'prev_text' => __( '&larr; Previous', 'textdomain' ),
					'next_text' => __( 'Next &#8594;', 'textdomain' ),
				) ); ?>
				<?php endif; ?>
		</div>
</div>
