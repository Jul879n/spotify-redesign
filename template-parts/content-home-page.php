<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spotify_template
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="fondo" class="container-fluid">
	<img id="menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/2048px-Spotify_logo_without_text.svg.png" alt="">
		<div class="row">
			<div id="reproducir" class="col-12 col-sm-4">
				<div class="card tema bg-secondary text-white mt-3 mb-3 ">
					<div id="info-reproduccion" class="card-body d-flex flex-column align-items-center justify-content-center">
						<img class="mitad rounded-3" src="" alt="">
						<form class="mt-3 mitad" action="">
							<input class="w-100" type="range" name="tiempo-reproduccion" id="tiempo-reproduccion">
							<div class="d-flex justify-content-around" id="botones-reproducir">
								<button class="btn text-white"><i class="fa-solid fa-shuffle"></i></button>
								<button class="btn text-white"><i class="fa-solid fa-backward-step"></i></button>
								<button class="btn text-white fs-1"><i class="fa-solid fa-circle-play"></i></button>
								<button class="btn text-white"><i class="fa-solid fa-forward-step"></i></button>
								<button class="btn text-white"><i class="fa-solid fa-repeat"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="card tema bg-secondary text-white">
					<div class="card-body">
						<h1 class="text-white">Artista</h1>
						<p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, beatae officiis iure ratione delectus ad cupiditate nam, quos veritatis accusantium id illo voluptatum eveniet veniam sit consequatur vitae possimus dolor.</p>
						<p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, beatae officiis iure ratione delectus ad cupiditate nam, quos veritatis accusantium id illo voluptatum eveniet veniam sit consequatur vitae possimus dolor.</p>
						<p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, beatae officiis iure ratione delectus ad cupiditate nam, quos veritatis accusantium id illo voluptatum eveniet veniam sit consequatur vitae possimus dolor.</p>
					</div>
				</div>
			</div>
			<div id="principal" class="col-12 col-sm">
			
				<div id="contenido" class="card tema bg-secondary text-white mt-3 mb-3">

					<div class="card-body">
						<h1 class="text-white">Playlists</h1>
					</div>
				</div>
				<div id="reproductor-2" class="card tema bg-secondary text-white mt-3 mb-3">
					<div id="info-reproduccion" class="card-body d-flex flex-column align-items-center justify-content-center">
						<img class="mitad rounded-3" src="" alt="">
						<form class="w-75" action="">
							<input class="w-100" type="range" name="tiempo-reproduccion" id="tiempo-reproduccion">
							<div class="d-flex justify-content-around" id="botones-reproducir">
								<button class="btn text-white"><i class="fa-solid fa-shuffle"></i></button>
								<button class="btn text-white"><i class="fa-solid fa-backward-step"></i></button>
								<button class="btn text-white fs-1"><i class="fa-solid fa-circle-play"></i></button>
								<button class="btn text-white"><i class="fa-solid fa-forward-step"></i></button>
								<button class="btn text-white"><i class="fa-solid fa-repeat"></i></button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div><!-- #post-<?php the_ID(); ?> -->