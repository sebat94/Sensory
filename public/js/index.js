/*
$(document).ready(function(){


  // BOTÓN DESPLAZAR HACIA ABAJO (PORTADA)
  $(".circle_fill_blue").on("click", function(){

    var windowWidth = $(window).width();

    // Necesario por los media querys, al ir compactándolos las alturas varían
    if( windowWidth > 1600 ){

      var top_novedades = $('.section_quienes_somos').offset().top;

    }else if( windowWidth > 560 && windowWidth <= 1600 ){

      var top_novedades = $('.section_quienes_somos').offset().top - 60; // -60px para ver el titulo de la seccion novedades

    }

    $("html, body").animate({ scrollTop: top_novedades }, 850, 'swing');

  });


});
*/
