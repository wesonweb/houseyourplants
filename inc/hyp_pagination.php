<?php if (show_posts_nav()) :

	echo '<div class="post-navigation">' ; ?>

	<div class="container">

		<h2>View more plants</h2>

			<?php the_posts_pagination( array(
				'prev_text'          => __( ' previous', 'houseyourplants' ),
				'next_text'          => __( 'next', 'houseyourplants' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'houseyourplants' ) . ' </span>',
			) );

	echo '</div>'; //close post navigation div


	endif; ?>

</div>
