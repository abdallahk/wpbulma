<footer class="footer is-medium">
  <div class="container">
  	<div class="columns">
  	<?php dynamic_sidebar( 'footer-1' ); ?>
  	<?php dynamic_sidebar( 'footer-2' ); ?>
  	<?php dynamic_sidebar( 'footer-3' ); ?>
  	<?php dynamic_sidebar( 'footer-4' ); ?>
  	</div>

     <div><?=get_theme_mod( 'footer_copyright_text' )?></div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>