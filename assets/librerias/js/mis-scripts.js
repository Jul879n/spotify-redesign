jQuery(document).ready(function ($) {
  $("#tema-blanco").click(function () {
    $("#reproducir").removeClass("tema-oscuro tema-amoled");
    $("#principal").removeClass("tema-oscuro tema-amoled");
    $("#reproducir").addClass("tema-blanco");
    $("#principal").addClass("tema-blanco");
    $(".tema-blanco .tema").find(".text-white").addClass("text-dark").removeClass("text-white");
      $("#confirmar").removeClass("disabled");
  });
  $("#tema-oscuro").click(function () {
    $("#reproducir").removeClass("tema-blanco tema-amoled");
    $("#principal").removeClass("tema-blanco tema-amoled");
    $("#reproducir").addClass("tema-oscuro");
    $("#principal").addClass("tema-oscuro");
    $(".tema-oscuro .tema").find(".text-dark").addClass("text-white").removeClass("text-dark");
      $("#confirmar").removeClass("disabled");
    $("#confirmar").removeClass("disabled");
  });
  $("#tema-amoled").click(function () {
    $("#reproducir").removeClass("tema-blanco tema-oscuro");
    $("#principal").removeClass("tema-blanco tema-oscuro");
    $("#reproducir").addClass("tema-amoled");
    $("#principal").addClass("tema-amoled");
    $(".tema-amoled").find(".card").addClass("border-light");
    $(".tema-amoled .tema").find(".text-dark").addClass("text-white").removeClass("text-dark");
    $("#confirmar").removeClass("disabled");
  });
  $("#confirmar").click(function () {
    $("#selector-tema").remove();
  });
});
