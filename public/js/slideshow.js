(function(){

  var $wraper = $("#wrap_slideshow");
  var wraperWidth = $wraper.children().length * 100;
  var mov = "";
  var desplazamiento = 0;


  //    Ancho container slideshow
  $wraper.css("width", wraperWidth + "%");

  //    On Click Arrow Left/Right
  $(".btn_slideshow").on("click", function(){
    //    Reset interval
    clearInterval(interval);
    interval = setInterval(function(){ cambiarImagen("sig"); }, 3500);
    //    <--  ||  -->
    mov = $(this).data("mov");
    cambiarImagen(mov);
  });

  //    Cambiar deimagen
  function cambiarImagen(mov){

    if( mov === "sig" ){
      desplazamiento -= 100;
    }else if( mov === "ant" ){
      desplazamiento += 100;
    }

    //    Excepciónes - Última y Primera imágen
    if( desplazamiento > 0 ){
      desplazamiento = (( wraperWidth - 100 ) * -1);                            // (( wraperWidth - 100 ) * -1) --> Última imagen
    }else if( desplazamiento < (( wraperWidth - 100 ) * -1 ) ){
      desplazamiento = 0;
    }

    //    Animación opacidad
    $wraper.clearQueue();
    $wraper.animate({
      opacity : 0
    }, 400, function(){
      $(this).css("margin-left", desplazamiento + "%");
    }).animate({
      opacity : 1
    }, 400);

  }

  //    Reproducir slideshow automáticamente, resize que se autoajuste, apañar listas css responsive
  var interval = setInterval(function(){ cambiarImagen("sig"); }, 3500);

})();
