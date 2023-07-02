jQuery(document).ready(function ($) {
  var algo = GridStack.init();
  function grid() {
    if ($(window).width() > 768) {
        $("#fondo .row").addClass("grid-stack");
        $("#card-menu, #registrate, #izquierda, #principal, #artista").addClass("grid-stack-item").removeClass("mt-2 mb-3");
        console.log("volvio");
        algo.enable();
    } else if ($(window).width() < 768) {
      if ($("#fondo .row").hasClass("grid-stack") || $("#fondo .row").attr("style")) {
        $("#fondo .row").removeClass("grid-stack").removeAttr("style");
        $("#card-menu, #registrate, #izquierda, #principal, #artista").removeClass("grid-stack-item").addClass("mt-2 mb-3");
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

  $("#selector-tema .card").click(function () {
    $(this)
      .addClass("shadow bg-body-secondary seleccionado")
      .css("z-index", "100000")
      .animate({ width: "300px" }, 500);
  });

  $("#tema-blanco").click(function () {
    $("#izquierda").removeClass("tema-oscuro tema-amoled");
    $("#card-menu").removeClass("tema-oscuro tema-amoled");
    $("#principal").removeClass("tema-oscuro tema-amoled");
    $("#artista").removeClass("tema-oscuro tema-amoled");
    $("#izquierda")
      .addClass("tema-blanco")
      .find(".text-white")
      .addClass("text-dark")
      .removeClass("text-white");
    $("#principal")
      .addClass("tema-blanco")
      .find(".text-white")
      .addClass("text-dark")
      .removeClass("text-white");
    $("#card-menu")
      .addClass("tema-blanco")
      .find(".text-dark")
      .addClass("text-white")
      .removeClass("text-dark");
    $("#artista")
      .addClass("tema-blanco")
      .find(".text-white")
      .addClass("text-dark")
      .removeClass("text-white");
    $("*").find(".card").removeClass("border-light");
    $("#card-menu")
      .find(".bg-white")
      .addClass("bg-dark")
      .removeClass("bg-white");
    $("#card-menu .spotify").removeClass("text-white");
    $("#confirmar").removeClass("disabled");
  });

  $("#tema-oscuro").click(function () {
    $("#izquierda").removeClass("tema-blanco tema-amoled");
    $("#principal").removeClass("tema-blanco tema-amoled");
    $("#card-menu").removeClass("tema-blanco tema-amoled");
    $("#artista").removeClass("tema-blanco tema-amoled");
    $("#izquierda").addClass("tema-oscuro");
    $("#principal").addClass("tema-oscuro");
    $("#artista").addClass("tema-oscuro");
    $("*").find(".card").removeClass("border-light");
    $(".tema-oscuro .tema")
      .find(".text-dark")
      .addClass("text-white")
      .removeClass("text-dark");
    $("#card-menu").addClass("tema-oscuro");
    $("#menu").find(".bg-dark").addClass("bg-white").removeClass("bg-dark");
    $("#menu")
      .find(".text-white")
      .addClass("text-dark")
      .removeClass("text-white");
    $("#menu .spotify").addClass("text-white");
    $("#confirmar").removeClass("disabled");
  });
  $("#tema-amoled").click(function () {
    $("#izquierda").removeClass("tema-blanco tema-oscuro");
    $("#principal").removeClass("tema-blanco tema-oscuro");
    $("#card-menu").removeClass("tema-blanco tema-oscuro");
    $("#artista").removeClass("tema-blanco tema-oscuro");
    $("#izquierda").addClass("tema-amoled");
    $("#card-menu").addClass("tema-amoled");
    $("#principal").addClass("tema-amoled");
    $("#artista").addClass("tema-amoled");
    $(".tema-amoled").find(".card").addClass("border-light");
    $(".tema-amoled .tema")
      .find(".text-dark")
      .addClass("text-white")
      .removeClass("text-dark");
    $("#menu").find(".bg-dark").addClass("bg-white").removeClass("bg-dark");
    $("#menu")
      .find(".text-white")
      .addClass("text-dark")
      .removeClass("text-white");
    $("#menu .spotify").addClass("text-white");
    $("#menu").addClass("border-light");
    $("#confirmar").removeClass("disabled");
  });
  $("#confirmar").click(function () {
    $("#selector-tema").fadeOut("1000", function () {
      $(this).remove();
      $("*").removeClass("transparente");
      $("*").removeClass("placeholder");
      $(".efecto-texto").glitch({
        chars: "!<>-_\\/[]{}—=+*^?#________",
        charTime: 10,
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
  $("#formm").click(function () {
    $.get(
      "https://localhost/spotify-redesign/wp-login.php?action=register&id=registerform"
    )
      .done(function (data) {
        var registroForm = $("<div>")
          .append($.parseHTML(data))
          .find("#registerform")[0].outerHTML;
        $("#registro").append(registroForm);

        // Verificar si el registro se ha realizado correctamente
        if (data.includes("Registro completado con éxito")) {
          alert("El registro se ha realizado correctamente");
        } else {
          alert("Ha ocurrido un error al realizar el registro");
        }
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Error en la petición AJAX: " + textStatus, errorThrown);
        alert("Ha ocurrido un error en la petición AJAX");
      });
  });
});
