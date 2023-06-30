jQuery(document).ready(function ($) {
  $("#tema-blanco").click(function () {
    $("#reproducir").removeClass("tema-oscuro tema-amoled");
    $("#principal").removeClass("tema-oscuro tema-amoled");
    $("#reproducir").addClass("tema-blanco");
    $("#principal").addClass("tema-blanco");
    $("#menu").find(".bg-white").addClass("bg-dark").removeClass("bg-white");
    $("#menu")
      .find(".text-dark")
      .addClass("text-white")
      .removeClass("text-dark");
    $("#menu").addClass("vidrio").removeClass("border-light transparente");
    $(".tema-blanco .tema")
      .find(".text-white")
      .addClass("text-dark")
      .removeClass("text-white");
    $("#confirmar").removeClass("disabled");
  });
  $("#tema-oscuro").click(function () {
    $("#reproducir").removeClass("tema-blanco tema-amoled");
    $("#principal").removeClass("tema-blanco tema-amoled");
    $("#reproducir").addClass("tema-oscuro");
    $("#principal").addClass("tema-oscuro");
    $("#menu").find(".bg-dark").addClass("bg-white").removeClass("bg-dark");
    $("#menu").addClass("vidrio").removeClass("border-light transparente");
    $("#menu")
      .find(".text-white")
      .addClass("text-dark")
      .removeClass("text-white");
    $(".tema-oscuro .tema")
      .find(".text-dark")
      .addClass("text-white")
      .removeClass("text-dark");
    $("#confirmar").removeClass("disabled");
    $("#confirmar").removeClass("disabled");
  });
  $("#tema-amoled").click(function () {
    $("#reproducir").removeClass("tema-blanco tema-oscuro");
    $("#principal").removeClass("tema-blanco tema-oscuro");
    $("#reproducir").addClass("tema-amoled");
    $("#principal").addClass("tema-amoled");
    $("#menu").find(".bg-dark").addClass("bg-white").removeClass("bg-dark");
    $("#menu")
      .find(".text-white")
      .addClass("text-dark")
      .removeClass("text-white");
    $("#menu").removeClass("vidrio").addClass("border-light transparente");
    $(".tema-amoled").find(".card").addClass("border-light");
    $(".tema-amoled .tema")
      .find(".text-dark")
      .addClass("text-white")
      .removeClass("text-dark");
    $("#confirmar").removeClass("disabled");
  });
  $("#confirmar").click(function () {
    $("#selector-tema").remove();
  });
  // Obtener la canción y configurar la fuente del reproductor de audio
  var cancion = $("#reproducir .song");
  var audio = $("#cancion");
  var source = audio.find("source");

  // Declarar una variable para llevar el registro de la canción actual
  var cancionActual = 0;

  // Funciones para cargar y reproducir la canción actual
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

  function reproducirCancion() {
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
    reproducirCancion();
  });

  // Manejar el evento de clic en el botón de siguiente
  $(".siguiente").on("click", function () {
    if (cancionActual < $(".song").length - 1) {
      cancionActual++;
    } else {
      cancionActual = 0;
    }
    cargarCancion();
    reproducirCancion();
  });

  // Manejar el evento de clic en el botón de reproducción
  $(".play").on("click", function () {
    if (audio[0].paused) {
      reproducirCancion();
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
    $("#reproducir #tiempo-actual").html(formatTime(tiempoActual));
    $("#reproducir #duracion").html(formatTime(duracion));

    // Actualizar la barra de progreso
    var porcentaje = (tiempoActual / duracion) * 100;
    $("#reproducir #tiempo-reproduccion").val(porcentaje);
  });

  // Manejar el evento de cambio en la barra de progreso
  $("#reproducir #tiempo-reproduccion").on("input", function () {
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
  $(".nombre-artista").click(function() {
    $("#artista").removeClass("no-ver");
  });
});
