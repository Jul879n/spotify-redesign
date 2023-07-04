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
  // Obtener la canción y configurar la fuente del reproductor de audio
  var cancion = $("#izquierda .song");
  var audio = $("#cancion");
  var source = audio.find("source");

  // Declarar una variable para llevar el registro de la canción actual
  var cancionActual = 0;

  // Funciones para cargar y izquierda la canción actual
  function cargarCancion() {
    var cancionActualElement = $(".song").eq(cancionActual % $(".song").length);
    var src = cancionActualElement.attr("data-src");
    var title = cancionActualElement.attr("data-title");
    source.attr("src", src);
    cancion.html(title);
    audio[0].load();

    // Establecer el valor inicial de la duración en "00:00"
    $("#duracion").html("00:00");

    // Establecer el valor inicial del rango en 0
    $("#tiempo-reproduccion").val(0);

    // Actualizar la barra de progreso
    audio[0].addEventListener("loadedmetadata", function () {
      var duracion = Math.floor(audio[0].duration);
      $("#duracion").html(formatTime(duracion));
      $("#tiempo-reproduccion").attr("max", duracion);
    });
  }

  function izquierdaCancion() {
    audio[0].play();
    $(".play")
      .find(".fa-circle-play")
      .addClass("fa-pause")
      .removeClass("fa-circle-play");
  }

  // Manejar el evento de finalización de la canción actual
  audio[0].addEventListener("ended", function () {
    if (cancionActual < $(".song").length - 1) {
      cancionActual++;
    } else {
      cancionActual = 0;
    }
    cargarCancion();
    izquierdaCancion();
  });

  // Manejar el evento de clic en el botón de siguiente
  $(".siguiente").on("click", function () {
    if (cancionActual < $(".song").length - 1) {
      cancionActual++;
    } else {
      cancionActual = 0;
    }
    cargarCancion();
    izquierdaCancion();
  });

  // Manejar el evento de clic en el botón de reproducción
  $(".play").on("click", function () {
    if (audio[0].paused) {
      izquierdaCancion();
    } else {
      audio[0].pause();
      $(".play")
        .find(".fa-pause")
        .addClass("fa-circle-play")
        .removeClass("fa-pause");
    }
  });

  // Actualizar la barra de progreso en función del tiempo de reproducción
  audio.on("timeupdate", function () {
    var duracion = audio[0].duration;
    var tiempoActual = audio[0].currentTime;

    // Actualizar el tiempo actual y la duración
    $("#izquierda #tiempo-actual").html(formatTime(tiempoActual));
    $("#izquierda #duracion").html(formatTime(duracion));

    // Actualizar la barra de progreso
    var porcentaje = (tiempoActual / duracion) * 100;
    $("#izquierda #tiempo-reproduccion").val(porcentaje);
  });

  // Manejar el evento de cambio en la barra de progreso
  $("#izquierda #tiempo-reproduccion").on("input", function () {
    var porcentaje = $(this).val();
    var duracion = audio[0].duration;

    // Actualizar la posición de reproducción
    audio[0].currentTime = (porcentaje / 100) * duracion;
  });

  // Función de ayuda para formatear el tiempo en formato mm:ss
  function formatTime(segundos) {
    var minutos = Math.floor(segundos / 60);
    var segundosRestantes = Math.floor(segundos % 60);

    return (
      minutos.toString().padStart(2, "0") +
      ":" +
      segundosRestantes.toString().padStart(2, "0")
    );
  }

  // Cargar la primera canción
  cargarCancion();

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
    if (clickLoop){
      $("#contenido .card-body").fadeOut("fast", function () {
        $(this).html(contenidoAnterior).fadeIn("fast"); // Restaura el contenido anterior
      });
    }
    if (clickCancion){
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
    girar();
  }
  girar();
  
});
