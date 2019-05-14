<?php get_header();?>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php bt_get_titlebar(get_the_title(), array('Home', '')); ?>

		<section class="section">
			<div class="container is-widescreen">
				<div class="columns">
					<div class="column is-three-quarters">
						<div class="post">
							<div class="featured-image image" style="margin-bottom: 1em;"><?=the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => get_the_title(), 'alt' => get_the_title()]);?></div>
							<h2><?php the_title(); ?></h2>

							<div class="" style="margin:1em 0;">
							<small><code><i class="fas fa-calendar-alt"></i> <?php the_time('F jS, Y'); ?></code> / <code><i class="fas fa-user"></i> <?php the_author_posts_link(); ?></code> / <code><i class="fas fa-folder-open"></i> <?php the_category(", "); ?></code> / <code><i class="fas fa-comments"></i> <a href="#comments"><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a></code></small>
							</div>

							<div class="entry"><?php the_content(); ?> </div>
						</div>
						<hr>
						<small class="tags"><?php the_tags( '<div class="tags"><code title="tags" class="tag is-danger"><i class="fas fa-tags"></i>&nbsp;Tags: </code><span class="tag">', '</span><span class="tag">', '</span></div>' ); ?></small>
						<hr>

						<div class="columns">
							<div class="column is-half">
								<?php previous_post_link( '<small class="is-size-7 is-family-monospace has-text-grey">Previous Post</small><br><p><i class="fas fa-chevron-left"></i> %link</p>' ); ?>
							</div>

							<div class="column is-half has-text-right">								
								<?php next_post_link( '<small class="is-size-7 is-family-monospace has-text-grey">Next Post</small><br><p>%link <i class="fas fa-chevron-right"></i></p>' ); ?>
							</div>
						</div>
	 
						<hr>

						<?php comments_template(); ?>

					<?php endwhile; ?>
					<?php else : ?>
						<h2 class="center">Not Found</h2>
						<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
					<?php endif; ?>
				</div>


				<div class="column">
					<div class="sidebar widget-area">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div>
				</div>
			</div>

		</div>

	</section>


	<?php get_footer(); ?>