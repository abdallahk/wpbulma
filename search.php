<?php get_header();?>

  <section class="hero <?php if(get_theme_mod( 'titlebar_color' ) != ""){ echo get_theme_mod( 'titlebar_color' ); } else { echo "is-primary"; }?> <?=get_theme_mod( 'titlebar_size' )?>">
  <!-- Hero head: will stick at the top -->
  <div class="hero-head">
  </div>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container">
      <div class="columns">
        <div class="column is-half"><h1 class="is-size-4 is-left is-paddingless is-marginless">Search Results for: <?=get_query_var('s')?></h1></div>
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
            $s=get_search_query();
            $args = array(
                's' =>$s
            );
            
            // The Query
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) {
                
                while ( $the_query->have_posts() ) {
                 $the_query->the_post();
                 ?>
                 <div class="box">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                 </div>
                 
                 
                <?php
            }
        }else{
            ?>
            <div class="highlight">
            <h2>Nothing Found</h2>
              <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
          </div>
      <?php } ?>

  </div>
</div>

<div class="column is-one-quarter">
    <div class="widget-area sidebar">
      <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </div><!-- .widget-area -->
</div>
</div>

</div>

</section>


<?php get_footer(); ?>
