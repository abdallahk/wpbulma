<?php get_header();?>

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<?php bt_get_titlebar(get_the_title(), array('Home', 'Sample Page')); ?>

<section class="section">
	<div class="container is-widescreen">
		<div class="columns">
  <div class="column is-three-quarters">
    <div class="post">
    	<div class="featured-image image"><?=the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => get_the_title(), 'alt' => get_the_title()]);?></div>

    	<div class="notification" style="margin-top:1rem;">    	
    	<small class="is-size-7"><?php the_time('F jS, Y'); ?> / By <?php the_author_posts_link(); ?> / <?php _e( 'In: ' ); ?> <?php the_category( ', ' ); ?> / <a href="#comments"><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a></small>
    	</div>

			<div class="entry"><?php the_content(); ?> </div>
	</div>
	<div class="categories"><p class="postmetadata categories"><?php _e( 'Categories: ' ); ?> <?php the_category( ', ' ); ?></p></div>
	<div class="tags">Tagged with: &nbsp; <?php the_tags( '<div class="tags"><span class="tag">', '</span><span class="tag">', '</span></div>' ); ?></div>

	<?php comments_template(); ?>

	<?php endwhile; ?>
	<?php else : ?>
	<h2 class="center">Not Found</h2>
		<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
	<?php endif; ?>
  </div>
		
	



  <div class="column">
    <div class="widget-area">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- .widget-area -->
  </div>
</div>

</div>

</section>


<?php get_footer(); ?>