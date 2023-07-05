jQuery(document).ready(function ($) {
  var algo = GridStack.init();
  function grid() {
    if ($(window).width() > 768) {
      $("#fondo .row").addClass("grid-stack");
      $(
        "#card-menu, #registrate, #izquierda, #principal, #artista, #info-cancion, #footer"
      )
        .addClass("grid-stack-item")
        .removeClass("mt-2 mb-3");
      console.log("volvio");
      algo.enable();
    } else if ($(window).width() < 768) {
      if (
        $("#fondo .row").hasClass("grid-stack") ||
        $("#fondo .row").attr("style")
      ) {
        $("#fondo .row").removeClass("grid-stack").removeAttr("style");
        $(
          "#card-menu, #registrate, #izquierda, #principal, #artista, #info-cancion, #footer"
        )
          .removeClass("grid-stack-item")
          .addClass("mt-2 mb-3");
        console.log("funciono");
        algo.disable();
      }
    }
  }
  $(window).resize(function () {
    console.log("se cambio");
    grid();
  });
  // llamada inicial a la función
  grid();
  //temas
  $("#selector-tema .card").click(function () {
    $(this)
      .addClass("shadow bg-body-secondary seleccionado")
      .css("z-index", "100000")
      .animate({ width: "300px" }, 500);
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
  var clickLoop = false;
  var clickCancion = false;
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
  //navegacion artista
  $(document).on("click", ".enlace-cancion", function (event) {
    clickCancion = true;
    inicioCancion = $("#info-cancion .card-body").html();
    event.preventDefault();
    var href = $(this).attr("href");
    $("#info-cancion .card-body").fadeOut("fast", function () {
      $(this).load(href + " .canciones", function () {
        $(this).fadeIn("fast");
      });
      $("html, body").animate(
        {
          scrollTop: $("#info-cancion").offset().top,
        },
        500
      );
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
  }
  $(".siguiente").click(function () {
    posicion++;
    cargarCancion();
  });
  $(".atras").click(function () {
    posicion--;
    cargarCancion();
  });
});
