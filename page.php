<?php get_header();?>

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<?php bt_get_titlebar(get_the_title(), array()); ?>

<section class="section">
	<div class="container is-widescreen">
		<div class="post">
			<div class="entry"><?php the_content(); ?> </div>
		</div>
<?php endwhile; ?>
	<?php else : ?>
	<h2 class="center">Not Found</h2>
		<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>