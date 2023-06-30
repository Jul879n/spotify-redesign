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
		<div id="menu" class="card rounded-5 vidrio">
			<div class="card-body d-flex">
				<button class="ms-2 me-2 btn bg-dark circulo text-white d-flex justify-content-center align-items-center"><i class="fa-solid fa-angle-left"></i></button>
				<button class="ms-2 me-2 btn bg-dark circulo text-white d-flex justify-content-center align-items-center"><i class="fa-solid fa-angle-right"></i></button>
				<button  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="ms-2 me-2 btn bg-dark circulo text-white d-flex justify-content-center align-items-center"><i class="fa-solid fa-bars"></i></button>
			</div>
			
		</div>

		<div class="row">
			<div id="reproducir" class="col-12 col-sm-4">
				<div class="card tema bg-secondary text-white mt-3 mb-3 ">
					<div id="info-reproduccion" class="card-body d-flex flex-column align-items-center justify-content-center">
						<img class="mitad rounded-3" src="" alt="">
						<div class="song" style="display: none;" data-src="https://laraya.laboratoriodiseno.cl/spotify/wp-content/uploads/2023/05/Tjarnheden-Farsjon.mp3" data-title="Canción 1"></div>
						<div class="song" style="display: none;" data-src="https://radios.liberaturadio.org/mestiza.ogg" data-title="Canción 2"></div>
						<audio style="display: none;" id="cancion" controls>
							<source src="" type="audio/mp3">
						</audio>
						<form class="mt-3 mitad" action="">
							<input class="w-100 border-0 progress-bar" type="range" name="tiempo-reproduccion" id="tiempo-reproduccion">
							<div class="d-flex justify-content-between">
								<span class="text-white" id="tiempo-actual">00:00</span>
								<span class="text-white" id="duracion">00:00</span>
							</div>
							<div class="d-flex justify-content-around" id="botones-reproducir">
								<button class="btn text-white mix"><i class="fa-solid fa-shuffle"></i></button>
								<button class="btn text-white atras"><i class="fa-solid fa-backward-step"></i></button>
								<button class="btn text-white fs-1 play"><i class="fa-solid fa-circle-play"></i></button>
								<button class="btn text-white siguiente"><i class="fa-solid fa-forward-step"></i></button>
								<button class="btn text-white repetir"><i class="fa-solid fa-repeat"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div id="artista" class="card tema bg-secondary text-white no-ver">
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
						<h1 class="text-white nombre-artista">Playlists</h1>
					</div>
				</div>
				<div id="reproductor-2" class="card tema bg-secondary text-white mt-3 mb-3">
					<div id="info-reproduccion" class="card-body d-flex flex-column align-items-center justify-content-center">
						<img class="mitad rounded-3" src="" alt="">
						<audio style="display: none;" id="cancion" controls>
							<source src="" type="audio/mpeg">
						</audio>
						<form class="mt-3 mitad" action="">
							<input class="w-100" type="range" name="tiempo-reproduccion" id="tiempo-reproduccion">
							<div class="d-flex justify-content-between">
								<span class="text-white" id="tiempo-actual">00:00</span>
								<span class="text-white" id="duracion">00:00</span>
							</div>
							<div class="d-flex justify-content-around" id="botones-reproducir">
								<button class="btn text-white"><i class="fa-solid fa-shuffle"></i></button>
								<button class="btn text-white"><i class="fa-solid fa-backward-step"></i></button>
								<button class="btn text-white fs-1 play"><i class="fa-solid fa-circle-play"></i></button>
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