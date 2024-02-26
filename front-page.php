<?php get_header(); ?>

  <div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/screenshot.png') ?>);"></div>
    <div class="page-banner__content container t-center c-white">
      <h1 class="headline headline--large">Welcome Gamers!</h1>
      <h2 class="headline headline--medium"></h2>
      <h3 class="headline headline--small">Check out some of the greatest games this past decade</h3>
      <a href="<?php echo site_url('/ratings'); ?>" class="btn btn--large btn--blue">Ratings</a>
    </div>
  </div>

  <div class="full-width-split group">
    <div class="full-width-split__one">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">Upcoming Games</h2>

        <?php 
          $today = date('Ymd');
          $homepageGames = new WP_Query(array(
            'posts_per_page' => 4,
            'post_type' => 'game',
            'meta_key' => 'release_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
              array(
                'key' => 'release_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
              )
            )
          ));

          while($homepageGames->have_posts()) {
            $homepageGames->the_post(); ?>
            <div class="event-summary">
              <a class="event-summary__date t-center" href="#">
              <span class="event-summary__month"><?php 
                $releaseDate = new DateTime(get_field('release_date'));
                echo $releaseDate->format('M') 
              ?></span>
              <span class="event-summary__day"><?php 
                echo $releaseDate->format('d')
              ?></span>  
              </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p><?php if(has_excerpt()) {
                  echo get_the_excerpt();
                } else {
                  echo wp_trim_words(get_the_content(), 18);
                } ?><a href="<?php the_permalink(); ?>" class="nu gray"> Learn more</a></p>
            </div>
        </div>
        <?php }
        ?>
        <p class="t-center no-margin"><a href="<?php echo site_url('/games'); ?>" class="btn btn--blue">More Upcoming Games</a></p>
      </div>
    </div>
    <div class="full-width-split__two">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">Recently Played</h2>
        <?php 
          $homepagePosts = new WP_Query(array(
            'posts_per_page' => 4,
			'post_type' => 'post',
            'meta_key' => 'rating',
			'meta_query' => array(
              array(
                'key' => 'rating'
          ))));

          while ($homepagePosts->have_posts()) {
            $homepagePosts->the_post(); ?> 
            <div class="event-summary">
              <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                <span class="event-summary__day"><?php 
					$rating = get_field('rating');
                	echo $rating?>
				</span>  
              </a>
              <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php if(has_excerpt()) {
                  echo get_the_excerpt();
                } else {
                  echo wp_trim_words(get_the_content(), 18);
                } ?><a href="<?php the_permalink(); ?>" class="nu gray"> Read more</a></p>
              </div>
            </div>
          <?php } wp_reset_postdata();
        ?>
        
        <p class="t-center no-margin"><a href="<?php echo site_url('/reviews'); ?>" class="btn btn--yellow">View Reviews</a></p>
      </div>
    </div>
  </div>

  <div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
    <div class="glide__slides">
    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/weed.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Free Weed</h2>
        <p class="t-center">Gamers need weed.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
      </div>
    </div>
  </div>
  <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/games.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Free Games</h2>
        <p class="t-center">Gamers need games.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
      </div>
    </div>
  </div>
  <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/beer.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Free Beer</h2>
        <p class="t-center">Gamers need BEER.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
      </div>
    </div>
  </div>
    </div>
      <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]">
      </div>
    </div>
  </div>
<?php 
	get_footer();
?>
