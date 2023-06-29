<div class="container footer mt-5">
	<div class="row">
		<div class="col-12 col-sm-2">
		<?php if (is_active_sidebar('footer1')):
							dynamic_sidebar('footer1');
						endif; ?>
		</div>
		<div class="col-12 col-sm-2">
		<?php if (is_active_sidebar('footer2')):
							dynamic_sidebar('footer2');
						endif; ?>
		</div>
		<div class="col-12 col-sm-2">
		<?php if (is_active_sidebar('footer3')):
							dynamic_sidebar('footer3');
						endif; ?>
		</div>
		<div class="col-12 col-sm-3">
		</div>
		<div class="col-12 col-sm-3">
			<div class="d-flex justify-content-around">
				<a class="bg-black rounded-circle boton d-flex justify-content-center align-items-center" href="#"><i class="fa-brands fa-instagram fs-4"></i></a>
				<a class="bg-black rounded-circle boton d-flex justify-content-center align-items-center" href="#"><i class="fa-brands fa-twitter fs-4"></i></a>
				<a class="bg-black rounded-circle boton d-flex justify-content-center align-items-center" href="#"><i class="fa-brands fa-facebook fs-4"></i></a>
			</div>
		</div>
		
		<div class="col-12">
		<hr>
			<span>© 2023 Spotify AB</span>
		</div>
	</div>
</div>
