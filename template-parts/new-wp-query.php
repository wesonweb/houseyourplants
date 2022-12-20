<?php

// begin the query
$loop = new WP_Query (

array (
'post_type' => 'XXXXXX', //post type to show
'posts_per_page' => 1, //number of posts per page
'meta_key' => 'XX-date of post-XX', //name of date field to order by date
'orderby' => 'meta_value_num', // order by date
'order' => 'ASC' // in ascending order
)
);

if ($loop->have_posts() ):

while ($loop->have_posts() ):
$loop->the_post(); ?>

<!-- content goes here -->

<?php endwhile; wp_reset_postdata(); ?>

<?php else : // if there are no posts then show this instead

?>

<?php endif; ?>

<!-- end the loop -->
