<!DOCTYPE html>
<html>
    <head <?php language_attributes();?> >
		<meta charset="<?php bloginfo('charset');?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
        <header class="site-header">
      <div class="container">
        <h1 class="logo-text float-left">
          <a href="<?php echo site_url('/home')?>">Valsillios Gaming</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <ul>
              <li><a href="<?php echo site_url('/games')?>">Upcoming</a></li>
              <li><a href="<?php echo site_url('/ratings')?>">Ratings</a></li>
              <li><a href="<?php echo site_url('/reviews')?>">Reviews</a></li>
              <li><a href="<?php echo site_url('/favorites')?>">Favorites</a></li>
			        
            </ul>
          </nav>
          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up To Our Newsletter</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </header>











