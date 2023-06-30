jQuery(document).ready(function ($) {
  $("#tema-blanco").click(function () {
    $("#izquierda").removeClass("tema-oscuro tema-amoled");
    $("#principal").removeClass("tema-oscuro tema-amoled");
    $("#izquierda").addClass("tema-blanco");
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
    $("#izquierda").removeClass("tema-blanco tema-amoled");
    $("#principal").removeClass("tema-blanco tema-amoled");
    $("#izquierda").addClass("tema-oscuro");
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
    $("#izquierda").removeClass("tema-blanco tema-oscuro");
    $("#principal").removeClass("tema-blanco tema-oscuro");
    $("#izquierda").addClass("tema-amoled");
    $("#principal").addClass("tema-amoled");
    $("#menu").find(".bg-dark").addClass("bg-white").removeClass("bg-dark");
    $("#menu")
      .find(".text-white")
      .addClass("text-dark")
      .removeClass("text-white");
    $("#menu").removeClass("vidrio").addClass("border-light negro");
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
      "https://localhost/spotify-redesign/privacy-policy/?id=2",
      function (data, status) {
        $("#artista .card-body").html(data);
      }
    );
  });
  //menu responsive
  var movil = false; // variable global para almacenar el estado de la vista

  function updateMenuLayout() {
    if ($(window).width() < 768) {
      if (!movil) {
        $("#menu .card-body")
          .removeClass("d-flex")
          .find(".ms-2")
          .addClass("mt-2 mb-3")
          .removeClass("ms-2 me-2");
        movil = true;
      }
    } else {
      if (movil) {
        $("#menu .card-body")
          .addClass("d-flex")
          .find(".mt-2")
          .removeClass("mt-2 mb-3")
          .addClass("ms-2 me-2");
        movil = false;
      }
    }
  }
  // Actualizar el diseño del menú al cargar la página
  $(document).ready(function () {
    updateMenuLayout();
  });
  // Actualizar el diseño del menú al cambiar el tamaño de la ventana
  $(window).resize(function () {
    updateMenuLayout();
  });
});
