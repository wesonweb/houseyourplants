
	<?php get_header(); ?>
    <div class="results container">
      <h2 class="page-title">Here are the plants we found for:
      <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
    </div>
    <div class="plant-container">
				<ul>
          <?php if(have_posts()) : while(have_posts()) : the_post(); //begin the loop ?>
          <li class="card">
            <a href="<?php the_permalink();?>" class="results-link-image">
              <?php the_post_thumbnail(); ?>
              <div class="summary">
                <h2 class="entry-title"><?php the_title(); ?></h2>
                <?php the_excerpt(); ?>
                <!-- <span class="plant-entry-cta">View the <?php the_title(); ?></span> -->
              </div>
            </a>
          </li> <!-- end plant entry -->
          <?php endwhile;
            endif;  ?>
        </ul>
		</div> <!-- end plant container div -->
    <!-- include pagination -->
    <?php include ('inc/hyp_pagination.php'); ?>
    <?php include ('inc/what-now-nav.php'); ?>
<?php get_footer(); ?>
