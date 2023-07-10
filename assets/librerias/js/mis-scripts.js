jQuery(document).ready(function ($) {
  var algo = GridStack.init();
  function grid() {
    if ($(window).width() > 999) {
      $("#fondo .row").addClass("grid-stack");
      $(
        "#card-menu, #registrate, #izquierda, #principal, #artista, #info-cancion, #footer"
      )
        .addClass("grid-stack-item")
        .removeClass("mt-2 mb-3");
      algo.enable();
    } else if ($(window).width() < 999) {
      if ($("#fondo .row").hasClass("grid-stack") || $("#fondo .row").attr("style")
      ) {
        $("#fondo .row").removeClass("grid-stack").removeAttr("style");
        $("#card-menu, #registrate, #izquierda, #principal, #artista, #info-cancion, #footer").removeClass("grid-stack-item").addClass("mt-2 mb-3");
        console.log("funciono");
        algo.disable();
      }
    }
  }
  $(window).resize(function () {
    grid();
  });
  // llamada inicial a la función
  grid();
  //temas
  $("#selector-tema .seleccion").click(function () {
    $(".seleccion").removeClass("shadow op");
    $(this).addClass("shadow op");
  });

  $("#tema-blanco").click(function () {
    $("body").removeClass("tema-oscuro tema-amoled").addClass("tema-blanco");
    $("#confirmar").removeClass("disabled");
  });

  $("#tema-oscuro").click(function () {
    $("body").removeClass("tema-claro tema-amoled").addClass("tema-oscuro");
    $("#confirmar").removeClass("disabled");
  });
  $("#tema-amoled").click(function () {
    $("body").removeClass("tema-oscuro tema-claro").addClass("tema-amoled");
    $("#confirmar").removeClass("disabled");
  });
  $("#confirmar").click(function () {
    $("#selector-tema").fadeOut("1000", function () {
      $(this).remove();
      $("*").removeClass("transparente");
      $("*").removeClass("placeholder");
      $(".efecto-texto").codex({
        duration: 500,
      });
    });
  });
  //evitar formulario
  $("form").on("submit", function (event) {
    event.preventDefault();
  });
  //navegacion
  var contenidoAnterior = "";
  var inicioCancion = "";
  var inicioArtista = "";
  var clickLoop = false;
  var clickCancion = false;
  var clickArtista = false;
  //navegacion playlist
  $(document).on("click", ".loop", function (event) {
    clickLoop = true;
    contenidoAnterior = $("#contenido .card-body").html();
    event.preventDefault();
    var href = $(this).attr("href");
    $("#contenido .card-body").fadeOut("fast", function () {
      $(this).load(href + " .playlists", function () {
        $(this).fadeIn("fast");
        cargarCancion();
      });
    });
  });
  //navegacion cancion
  $(document).on("click", ".enlace-cancion", function (event) {
    clickCancion = true;
    inicioCancion = $("#info-cancion .card-body").html();
    event.preventDefault();
    var href = $(this).attr("href");
    $.get(href, function (data, status) {
      var id = $(data).find('.type-canciones').attr("id");
      href = href.substr(0, href.length - 1);
      var enlace = href + "?id=" + id;
      $.get(enlace, function (ya, status) {
        var elemento = $(ya).find('[id="' + id + '"]');
        $("#info-cancion .card-body").html(elemento);
        $(".type-canciones").addClass("w-100");
        // Hacer scroll hasta #info-cancion
        $('html, body').animate({
          scrollTop: $("#info-cancion").offset().top
        }, 10);
        $("#info-cancion .efecto-texto").codex({
          duration: 800,
        });
      });
    });
  });
  //navegacion cancion
  $(document).on("click", ".perfil", function (event) {
    clickArtista = true;
    inicioArtista = $("#artista .card-body").html();
    event.preventDefault();
    var href = $(this).attr("href");
    $.get(href, function (data, status) {
      var id = $(data).find('.type-artistas').attr("id");
      href = href.substr(0, href.length - 1);
      var enlace = href + "?id=" + id;
      $.get(enlace, function (ya, status) {
        var elemento = $(ya).find('[id="' + id + '"]');
        $("#artista .card-body").html(elemento);
        $(".type-artistas").addClass("w-100");
        // Hacer scroll hasta #info-cancion
        $('html, body').animate({
          scrollTop: $("#artista").offset().top
        }, 10);
        $("#artista .efecto-texto").codex({
          duration: 800,
        });
      });
    });
  });
  $("#volver").click(function () {
    if (clickLoop) {
      $("#contenido .card-body").fadeOut("fast", function () {
        $(this).html(contenidoAnterior).fadeIn("fast"); // Restaura el contenido anterior
      });
    }
    if (clickCancion) {
      $("#info-cancion .card-body").fadeOut("fast", function () {
        $(this).html(inicioCancion).fadeIn("fast"); // Restaura el contenido anterior
      });
    }
    if (clickArtista) {
      $("#artista .card-body").fadeOut("fast", function () {
        $(this).html(inicioArtista).fadeIn("fast"); // Restaura el contenido anterior
      });
    }
  });

  $(".nombre-artista").click(function () {
    $("#artista").removeClass("no-ver");
    $.get(
      "https://laraya.laboratoriodiseno.cl/spotify-redesign/politica-privacidad/",
      function (data, status) {
        $("#artista .card-body").html(data);
        $("html, body").animate(
          {
            scrollTop: $("#artista").offset().top,
          },
          1000
        );
      }
    );
  });
  // Obtenemos la altura y anchura de la ventana del navegador
  var alturaVentana = $(window).height();
  var anchoVentana = $(window).width();
  // Obtenemos la altura y anchura del elemento que queremos centrar
  var alturaSelector = $("#selector-tema").outerHeight();
  var anchoSelector = $("#selector-tema").outerWidth();
  // Calculamos la posición en la que debemos mover el elemento para centrarlo
  var margenSuperior = (alturaVentana - alturaSelector) / 2;
  var margenIzquierda = (anchoVentana - anchoSelector) / 2;
  // Movemos el elemento al centro de la pantalla
  $("#selector-tema").css({
    "margin-top": margenSuperior,
    "margin-left": margenIzquierda,
  });
  //girar discos
  function girar() {
    $(".no-hay").animate({ rotate: "360deg" }, 90000);
  }
  girar();
  //carrusel playlist
  $("#carrusel-playlist").slick({
    slidesToShow: 5,
    slidesToScroll: 5,
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: true,
    dots: false,
    pauseOnHover: true,
    infinite: true,
    edgeFriction: 1,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          autoplay: true,
          autoplaySpeed: 4000,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          autoplay: true,
          autoplaySpeed: 4000,
        },
      },
      {
        breakpoint: 375,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 4000,
        },
      },
    ],
  });
  //carrusel spotify
  $("#carrusel-spotify").slick({
    slidesToShow: 5,
    slidesToScroll: 5,
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: true,
    dots: false,
    pauseOnHover: true,
    infinite: true,
    edgeFriction: 1,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          autoplay: true,
          autoplaySpeed: 4000,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          autoplay: true,
          autoplaySpeed: 4000,
        },
      },
      {
        breakpoint: 375,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 4000,
        },
      },
    ],
  });
  $(".slick-next").html('<i class="fs-3 text-tema  fa-solid fa-angle-right"></i>');
  $(".slick-prev").html('<i class="fs-3 text-tema  fa-solid fa-angle-left"></i>');

  //reproductor
  var posicion = 0;
  function cargarCancion() {
    var audioCancion = $('#contenido .song').eq(posicion).data('src');
    var nombre = $('#contenido .song').eq(posicion).data('title');
    var artista = $('#contenido .song').eq(posicion).data('artista');
    var imagen = $('#contenido .song').eq(posicion).data('img');

    // Colocar los valores en los elementos correspondientes del reproductor de audio
    $('#info-reproduccion img').attr('src', imagen);
    $('#info-reproduccion audio source').attr('src', audioCancion);
    $('#info-reproduccion #titulo-cancion').text(nombre);
    $('#info-reproduccion #artista-cancion').text(artista);
    $("#info-reproduccion .efecto-texto").codex({
      duration: 680,
    });
  }
  $(".siguiente").click(function () {
    posicion++;
    cargarCancion();
  });
  $(".atras").click(function () {
    posicion--;
    cargarCancion();
  });
  $('.corazon').click(function () {
    $(this).find('i').removeClass("fa-regular fa-heart").addClass("fa-solid fa-heart");
  });
//nav
  $(".custom-logo").removeClass().addClass("w-75 mt-2")
  $("#menu-nav").removeClass().addClass("navbar-nav m-0");
  $("#menu-nav li").removeClass().addClass("nav-item");
  $("#menu-nav li a").removeClass().addClass("nav-link text-tema");
  $("#menu-nav li").eq(0).find("a").prepend('<i class="fa-solid fa-house tex-tema me-2"></i>');
  $("#menu-nav li").eq(1).find("a").prepend('<i class="fa-solid fa-magnifying-glass text-tema me-2"></i>');
  $("#menu-nav li").eq(2).find("a").prepend('<i class="fa-solid fa-book text-tema me-2"></i>');
  $("#menu-nav li").eq(3).find("a").prepend('<i class="fa-solid fa-square-xmark text-tema me-2"></i>');
  $("#menu-nav li").eq(4).find("a").prepend('<i class="fa-solid fa-heart text-tema me-2"></i>');
//nav central
  $("#menu-nav-central").removeClass().addClass("navbar-nav m-0");
  $("#menu-nav-central li").removeClass().addClass("nav-item");
  $("#menu-nav-central li a").removeClass().addClass("nav-link text-tema");
  $("#menu-nav-central li").eq(0).find("a").removeClass("text-tema").addClass("bg-tema btn w-50");
  //nav final
  $("#menu-nav-final").removeClass().addClass("navbar-nav m-0 flex-row row");
  $("#menu-nav-final li").removeClass().addClass("nav-item col-6");
  $("#menu-nav-final li a").removeClass().addClass("nav-link text-tema text-pequeno");
//footer
$("#menu-footer-1").removeClass().addClass("navbar-nav m-0");
$("#menu-footer-1 li").removeClass().addClass("nav-item");
$("#menu-footer-1 li a").removeClass().addClass("nav-link text-tema p-0");
//footer 2
$("#menu-footer-2").removeClass().addClass("navbar-nav m-0");
$("#menu-footer-2 li").removeClass().addClass("nav-item");
$("#menu-footer-2 li a").removeClass().addClass("nav-link text-tema p-0");
//footer 3
$("#menu-footer-3").removeClass().addClass("navbar-nav m-0");
$("#menu-footer-3 li").removeClass().addClass("nav-item");
$("#menu-footer-3 li a").removeClass().addClass("nav-link text-tema p-0");
});