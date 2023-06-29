jQuery(document).ready(function ($) {
  $("#traer").click(function() {
    $.get("https://laraya.laboratoriodiseno.cl/spotify/playlists/quiet-moment/", function(data) {
      $("#contenido .card-body").html(data);
    });
  });
});
