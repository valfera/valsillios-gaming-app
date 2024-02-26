<?php 
    get_header();

	while(have_posts()) {
		the_post(); ?>
		<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php  echo get_theme_file_uri('/screenshot.png') ?>);"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
          <p>Replace this later</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/ratings'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Ratings</a> <span class="metabox__main"><?php the_title();?></span>
        </p>
        </div>
		<div class="generic-content">
			<?php
				the_post_thumbnail();
				the_content();
				echo get_field('rating');
			?>
		</div>

        <?php 
      
      $relatedReview = get_field('related_review');

      if($relatedReview) {
        echo '<hr class="section-break">';
        echo '<h3 class="headline headline--medium">Review</h3>';
        echo '<ul class="link-list min-list">';

        foreach($relatedReview as $rv) { ?>
            <li><a href="<?php echo get_the_permalink($rv); ?>"><?php
            echo get_the_title($rv); ?></a></li>
            <?php }
            echo '</ul>';
            } ?>
      
	</div>



<?php }
    get_footer();
?>