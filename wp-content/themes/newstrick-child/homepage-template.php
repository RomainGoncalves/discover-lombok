<?php
/*
	Template Name: Homepage

	 * @package WordPress
	 * @subpackage CrossRoad - Responsive WordPress Magazine Blog Theme
	 * @since CrossRoad 1.0

*/

get_header(); 

global $data;

?>


<!-- NAVBAR
    ================================================== -->

    <div class="banner navbar navbar-static-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">

          <a class="brand" href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo stripslashes( $data['ct_logo_upload'] ) ?>"></a>

          <!-- Responsive Navbar -->
          <div id="nav-main">
            <!-- <ul id="menu" class="nav">
              <li class="active"><a href="index.html">Home</a></li>
              <li><a href="knowledge-base.html">Knowledge Base</a></li>
              <li><a href="articles.html">Articles</a></li>
              <li><a href="faq.html">Faq</a></li>
              <li><a href="features.html">Features</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                <ul class="dropdown-menu">
                  <li><a href="contact.html">Contact</a></li>
                  <li><a href="full.html">Full</a></li>
                </ul>
              </li>
            </ul> -->
            <?php 

            class UL_Class_Walker extends Walker_Nav_Menu {
				function start_lvl(&$output, $depth) {
					$indent = str_repeat("\t", $depth);
					$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
				}
			}

            //if ( has_nav_menu('main_menu') ) wp_nav_menu( array('theme_location' => 'main_menu', 'menu_class' => 'nav', 'walker' => new UL_Class_Walker() )); ?>
            <ul class="pull-right unstyled social-icons">
              <li class="pull-left">
                <a href="https://www.facebook.com/pages/Discover-Lombok/452346518178357">
                  <img src="<?php echo get_stylesheet_directory_uri() ; ?>/homepage-template/assets/img/facebook.png" class="icons">
                </a>
              </li>
              <li class="pull-left">
                <a href="https://twitter.com/Discover_Lombok">
                  <img src="<?php echo get_stylesheet_directory_uri() ; ?>/homepage-template/assets/img/twitter.png" class="icons">
                </a>
              </li>
              <li class="pull-left">
                <a href="http://instagram.com/discoverlombok">
                  <img src="<?php echo get_stylesheet_directory_uri() ; ?>/homepage-template/assets/img/instagram.png" class="icons">
                </a>
              </li>
              <li class="pull-left">
                <a href="https://plus.google.com/u/0/105008338029322758204/">
                  <img src="<?php echo get_stylesheet_directory_uri() ; ?>/homepage-template/assets/img/google.png" class="icons">
                </a>
              </li>
              <li class="pull-left">
                <a href="http://feeds.feedburner.com/DiscoverLombok">
                  <img src="<?php echo get_stylesheet_directory_uri() ; ?>/homepage-template/assets/img/rss.png" class="icons">
                </a>
              </li>
              <li class="pull-left">
                <a href="http://www.flickr.com/photos/mondeailleurs/sets/72157633148779264/">
                  <img src="<?php echo get_stylesheet_directory_uri() ; ?>/homepage-template/assets/img/flickr.png" class="icons">
                </a>
              </li>
            </ul>
          </div><!--/.nav-collapse -->

        </div> <!-- /.container -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->


    <!-- HERO -->
    <div id="hero">
      <div class="container">

        <!-- Hero title -->
        <div class="hero-title">
          <h1>
            <a href="<?php echo get_bloginfo('url'); ?>">
              <?php echo bloginfo($show='name') ?>
            </a>
          </h1>
        </div>

        <!-- Hero search -->
        <div class="hero-search">
          <form role="search" method="get" id="searchform" class="form-search" action="#">
            <label class="hide" for="s">Search for:</label>
            <input type="text" id="autocomplete-dynamic" name="s" class="searchajax search-query" autocomplete="off" placeholder="Find help! Enter search term here.">
            <input type="submit" id="searchsubmit" value="Search" class="btn-black">
          </form>
        </div>

        <!-- Hero boxes -->
        <div class="row boxes">
          <div class="span4">

            <?php

              switch_to_blog(3, $validate = true) ;

              //Get articles from all blogs
              $args = array('post_type' => 'post', 'status' => 'published', 'posts_per_page' => 1, 'category_name' => 'featured') ;
              $query = new WP_Query($args) ;

              //Number of article and random
              $number = 4;

              while($query->have_posts()){
                $query->the_post();
                ?>
                <div class="box">
                  <div class="box-icon">
                    <a href="<?php echo the_permalink(); ?>">
                      <?php echo get_the_post_thumbnail($post_id = null, $size = 'post-thumbnails-square', $attr = array('class' => 'span4')); ?>
                    </a>
                  </div>
                  <div class="box-title">
                    <h2><a href="<?php echo the_permalink(); ?>"><?php the_title_max_charlength(40) ; ?></a></h2>
                  </div>
                  <div class="box-text">
                    <p><?php the_excerpt_max_charlength(140); ?></p>
                    <a class="btn-black" href="<?php echo the_permalink(); ?>">Continue</a>
                  </div>
                </div>

                <?php

              }
              restore_current_blog();
            ?>
            
          </div>
          <div class="span4">
            <div class="box">
              <div class="box-icon">
                <i class="icon-check"></i>
              </div>
              <div class="box-title">
                <h2><a href="#">?_?</a></h2>
              </div>
              <div class="box-text">
                <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                <a class="btn-black" href="#">Continue</a>
              </div>
            </div>
          </div>
          <div class="span4">
            <?php

              switch_to_blog(2, $validate = true) ;

              //Get articles from all blogs
              $args = array('post_type' => 'post', 'status' => 'published', 'posts_per_page' => 1, 'category_name' => 'featured') ;
              $query = new WP_Query($args) ;

              //Number of article and random
              $number = 4;

              while($query->have_posts()){
                $query->the_post();
                ?>
                <div class="box">
                  <div class="box-icon">
                    <a href="<?php echo the_permalink(); ?>">
                      <?php echo get_the_post_thumbnail($post_id = null, $size = 'post-thumbnails-square', $attr = array('class' => 'span4')); ?>
                    </a>
                  </div>
                  <div class="box-title">
                    <h2><a href="<?php echo the_permalink(); ?>"><?php the_title_max_charlength(40) ; ?></a></h2>
                  </div>
                  <div class="box-text">
                    <p><?php the_excerpt_max_charlength(140); ?></p>
                    <a class="btn-black" href="<?php echo the_permalink(); ?>">Continue</a>
                  </div>
                </div>

                <?php

              }
              restore_current_blog();
            ?>
          </div>
        </div>

      </div>
    </div>

    <!-- FEATURED RECENT ARTICLES -->
    <div id="section-container">

      <div class="container">

        <div class="row recent-posts">

          <div class="row recent-title">
          <h2 class="span12">Last articles in English</h2>
        </div>

        <?php

        switch_to_blog(3, $validate = true) ;

        //Get articles from all blogs
        $args = array('post_type' => 'post', 'status' => 'published', 'posts_per_page' => 4) ;
        $query = new WP_Query($args) ;

        //Number of article and random
        $number = 4;


      ?>
          <?php
          if($query->have_posts()){

            while ($query->have_posts()) {
              
              ?><?php $query->the_post(); ?>
          <div class="span3">
                  <article id="post-695" class="post-695 post type-post status-publish format-image hentry category-troubleshooting">
                    <header>
                      <h4><!-- <i class="icon-picture"></i>  --><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                    </header>
                    <div class="entry-content">
                      <div>
                        <a href="<?php echo the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                          <?php echo get_the_post_thumbnail($post_id = null, $size = 'post-thumbnails-square', $attr = array('class' => 'span3')); ?>
                        </a>
                        </div>
                      <div class="">
                       <p><?php the_excerpt_max_charlength(160); ?><br /><span class="label label-color"><a href="<?php echo the_permalink(); ?>"> Read More <i class="icon-chevron-right"></i></a></span></p>
                      </div>
                    </div>
                  </article>
                </div>

              <?php

            }

            //Restore correct blog ID
            restore_current_blog();
          }

          ?>
        </div>

          <?php

        switch_to_blog(2, $validate = true) ;

        //Get articles from all blogs
        $args = array('post_type' => 'post', 'status' => 'published', 'posts_per_page' => 4) ;
        $query = new WP_Query($args) ;

        //Number of article and random
        $number = 4;


      ?>

        <div class="row recent-title">
          <h2 class="span12">Les derniers articles en fran&ccedil;ais</h2>
        </div>

        <div class="row recent-posts">

        	<?php
        	if($query->have_posts()){

        		while ($query->have_posts()) {
        			
        			?><?php $query->the_post(); ?>
					<div class="span3">
			            <article id="post-695" class="post-695 post type-post status-publish format-image hentry category-troubleshooting">
			              <header>
			                <h4><!-- <i class="icon-picture"></i>  --><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
			              </header>
			              <div class="entry-content">
			                <div class="">
			                  <a href="<?php echo the_permalink(); ?>" title="Responsive Design">
			                    <?php echo get_the_post_thumbnail($post_id = null, $size = 'post-thumbnails-square', $attr = ''); ?>
                        </a>
			                  </div>
			                <div class="">
			                 <p><?php echo the_excerpt_max_charlength(160); ?><br /><span class="label label-color"><a href="<?php echo the_permalink(); ?>"> Lire la suite <i class="icon-chevron-right"></i></a></span></p>
			                </div>
			              </div>
			            </article>
			          </div>

        			<?php

        		}


        	}

            //Restore correct blog ID
            restore_current_blog();
        	?>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <footer>
      <!-- Sub footer -->
      <div class="sub-footer">
        <div class="container">
          
          <div class="copyright-text">Copyright &copy; Editions Tucana 2013.
          </div>  
        </div>   
      </div>
    </footer>

<?php get_footer() ; ?>