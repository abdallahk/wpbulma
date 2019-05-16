<footer class="footer" style="padding: 2em;">
	<div class="container">
		<div class="columns">
			<div class="column is-one-quarter"><?php dynamic_sidebar( 'footer-1' ); ?></div>
			<div class="column is-one-quarter"><?php dynamic_sidebar( 'footer-2' ); ?></div>
			<div class="column is-one-quarter"><?php dynamic_sidebar( 'footer-3' ); ?></div>
			<div class="column is-one-quarter"><?php dynamic_sidebar( 'footer-4' ); ?></div>
		</div>

		<div class="columns">
			<div class="column">
				<div><?=get_theme_mod( 'footer_copyright_text' )?></div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>