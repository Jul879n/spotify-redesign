jQuery(document).ready(function ($) {
  $("#traer").click(function() {
    $.get("https://localhost/spotify-redesign/privacy-policy/?preview=true", function(data) {
      $("#contenido .card-body").html(data);
    });
  });
});
