<?php get_header();

$page_for_posts_id = get_option('page_for_posts');

?>

  <section class="hero <?php if(get_theme_mod( 'titlebar_color' ) != ""){ echo get_theme_mod( 'titlebar_color' ); } else { echo "is-primary"; }?> <?=get_theme_mod( 'titlebar_size' )?>">
  <!-- Hero head: will stick at the top -->
  <div class="hero-head">
  </div>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container">
      <div class="columns">
        <div class="column is-half"><h1 class="is-size-4 is-left is-paddingless is-marginless"><?=get_post_field( 'post_title', $page_for_posts_id );?></h1></div>
        <div class="column is-half" style="padding-top:1rem;">
          <nav class="breadcrumb is-right" aria-label="breadcrumbs">

            <?php wordpress_breadcrumbs(); ?>
            
            </nav>
          </div>          
        </div>     
      </div>
    </div>
  </section>

<section class="section">
  <div class="container is-widescreen">
    <div class="columns">
      <div class="column">
        <div class="columns is-multiline is-mobile">


          <?php

          global $post;
          $args = array( 'posts_per_page' => 5 );

          $myposts = get_posts( $args );
          foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

            <article class="media">
              <div class="columns">
                <div class="column is-3">
                  <figure class="media-left">
                    <p class="image">
                      <a href="<?php the_permalink(); ?>"><?=the_post_thumbnail('thumbnail_300');?></a>
                    </p>
                  </figure>
                </div>
                <div class="column">
                  <div class="media-content">
                    <div class="content">
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <small><code><i class="fas fa-calendar-alt"></i> <?php the_time('F jS, Y'); ?></code> / <code><i class="fas fa-user"></i> <?php the_author_posts_link(); ?></code> / <code><i class="fas fa-folder-open"></i> <?php the_category(", "); ?></code></small>
                      <?php the_excerpt(); ?>
                      <small class="tags"><?php the_tags( '<div class="tags"><code class="tag is-danger"><i class="fas fa-tags"></i> </code><span class="tag">', '</span><span class="tag">', '</span></div>' ); ?></small>
                    </div>
                  </div>
                </div>
                
              </div>
              
              
            </article>


          <?php endforeach; ?>

          <div style="padding: 1.5rem 0;">

            <?php bulmawp_pagination(); ?>

          </div>
        </div>
      </div>

      <div class="column is-3">
        <div class="sidebar widget-area">
          <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
      </div>
    </div>

  </div>

</section>


<?php get_footer(); ?>


