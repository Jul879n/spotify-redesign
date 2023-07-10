<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spotify_template
 */

?>

<footer id="colophon" class="card-body placeholder container">
	<div class="row transparente">
		<?php if (is_active_sidebar('footer1')):
							dynamic_sidebar('footer1');
						endif; ?>
		<?php if (is_active_sidebar('footer2')):
							dynamic_sidebar('footer2');
						endif; ?>
		<?php if (is_active_sidebar('footer3')):
							dynamic_sidebar('footer3');
						endif; ?>
		<div class="col-12 col-sm-3">
			<div class="d-flex justify-content-around">
				<a class="bg-tema rounded-circle boton d-flex justify-content-center align-items-center" href="#"><i class="text-tema fa-brands fa-instagram fs-4"></i></a>
				<a class="bg-tema rounded-circle boton d-flex justify-content-center align-items-center" href="#"><i class="text-tema fa-brands fa-twitter fs-4"></i></a>
				<a class="bg-tema rounded-circle boton d-flex justify-content-center align-items-center" href="#"><i class="text-tema fa-brands fa-facebook-f fs-4"></i></a>
			</div>
		</div>
		<div class="col-12 efecto-texto text-tema">
		<span>© 2023 Spotify AB</span>
		</div>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
