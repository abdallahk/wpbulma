<?php 
/* Template Name: Full-width Page*/
?>

<?php get_header();?>

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<?php the_content(); ?>

<?php endwhile; ?>
	<?php else : ?>
	<h2 class="center">Not Found</h2>
		<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
<?php endif; ?>


<?php get_footer(); ?>