<?php get_header();?>



<section class="section">
  <div class="container is-widescreen">
    <div class="columns">
  
<?php

global $post;
$args = array( 'posts_per_page' => 5 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<div class="column">
  <div class="card">
  <div class="card-image">
    <figure class="image is-4by3">
      <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
    </figure>
  </div>
  <div class="card-content">

    <div class="content">
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>
      <p><?php the_excerpt(); ?></p>
      Categories: <?php the_category(", "); ?><br>
      <?php the_tags(); ?>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>
  </div>
</div>
</div>

<?php endforeach; 
wp_reset_postdata();?>

  
    
  



  <div class="column">
    <div class="widget-area">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- .widget-area -->
  </div>
</div>

</div>

</section>


<?php get_footer(); ?>


