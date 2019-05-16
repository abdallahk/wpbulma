<?php if (!is_front_page()) { ?>

  <section class="hero <?php if(get_theme_mod( 'titlebar_color' ) != ""){ echo get_theme_mod( 'titlebar_color' ); } else { echo "is-primary"; }?> <?=get_theme_mod( 'titlebar_size' )?>">
    
  <!-- Hero head: will stick at the top -->
  <div class="hero-head">
  </div>


  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container">
      <div class="columns">
        <div class="column is-half"><h1 class="is-size-4 is-left is-paddingless is-marginless"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
        <div class="column is-half" style="padding-top:1rem;">
          <nav class="breadcrumb is-right" aria-label="breadcrumbs">

            <?php if(get_theme_mod( 'titlebar_breadcrumb' )){ wordpress_breadcrumbs(); } ?>
            
            </nav>
          </div>          
        </div>     
      </div>
    </div>
  </section>


<?php } else { ?>

<?php } ?>