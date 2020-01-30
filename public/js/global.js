$(document).ready(function(){


    // Ponemos las variables globales para asegurarnos de donde está el header en una primera instancia
    var scrollTop = $(window).scrollTop();
    var windowTop = $('.cabecera_2elem').offset().top;

    // Instanciamos a 'null' la variable que agarrará el 'top' del elemento a partir del cual el header mostrará su background
    var elem_mostrar_header = null;

    // En caso de que estemos en 'index' agarrará el valor de la posición del elemento para hacer el cáculo en la función
    // en caso de que no esté en index, mandará a la función un null, por lo tanto cuando pregunte si el 'top' del window
    // es mayor que 'null' devolverá que sí, haciendo que enel resto de páginas nos lo muestre desde un principio.
    if( $(".section_quienes_somos").length > 0 ){
      elem_mostrar_header = $('.section_quienes_somos').offset().top;
    }

    backgroundHeader( windowTop, elem_mostrar_header );



    $(window).on('scroll', function(){

      scrollTop = $(window).scrollTop();
      windowTop = $('.cabecera_2elem').offset().top;

      if( $(".section_quienes_somos").length > 0 ){
        elem_mostrar_header = $('.section_quienes_somos').offset().top;
      }

      backgroundHeader( windowTop, elem_mostrar_header );

    });



    function backgroundHeader( windowTop, elem_mostrar_header ){

      if( (windowTop + 100) >= elem_mostrar_header ){                           // +100px que mide el header
        $(".cabecera_2elem").css({
          'border-bottom'     : '1px solid rgb(50, 109, 139)',
          'box-shadow'        : '0px 0px 4px 0px rgb(50, 109, 139)',
          '-webkit-box-shadow': '0px 0px 4px 0px rgb(50, 109, 139)',
          '-moz-box-shadow'   : '0px 0px 4px 0px rgb(50, 109, 139)'
        });
      }else{
        $(".cabecera_2elem").css({
          'border-bottom'    :  ''
        });
      }

    }



    $('.hamburguesa').on("click", function(){
        $(".cabecera_centro").toggle("swing");
    });



    // jQuery Mobile, close 'cabecera_centro' on scrollStart
    $(document).on("scrollstart", function(){
      if(  ($(window).width() <= 880)  &&  ($(".cabecera_centro").css('display') == "block")  ){
        $(".cabecera_centro").hide(400);
      }
    });


    /***************/
    /*-- COOKIES --*/
    /***************/
    $('.close_cookies').click(function(){
      $('.cookies').css('display','none');
    });



});// Document Ready
