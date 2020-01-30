$(document).ready(function(){


  var $input_nombre   = $("#nombre_usuario");
  var $input_email    = $("#email_usuario");
  var $input_asunto   = $("#asunto_usuario");
  var $input_desc     = $("#descripcion_usuario");


  estilos_contacto();
  //altura_contacto();

  // ON CLICK
  $(".nombre_contacto_izq label, .email_contacto_izq label, .asunto_contacto_izq label, .descripcion_contacto_izq label").on("click", function(){

    $(this).css({
      "width" : "auto",
      "height": "40px",
      "top"   : "-30px",
      "cursor": "pointer",
      "color" : "rgb(0, 0, 0)",
      "padding-left": "0px"
    });

  });


  // Cuando el input tenga el foco, subiremos el label
  $("#nombre_usuario, #email_usuario, #asunto_usuario, #descripcion_usuario").on("focusin", function(){
    $(this).prev().css({
      "width" : "auto",
      "height": "40px",
      "top"   : "-30px",
      "cursor": "pointer",
      "color" : "rgb(0, 0, 0)",
      "padding-left": "0px"
    });
  });


  // Funcion que comprueba si los input tienen contenido o no para mover el label
  function estilos_contacto(){

    if( $input_nombre.val().length > 0 ){
      $input_nombre.prev().css({
        "width" : "auto",
        "top"   : "-30px",
        "height": "40px",
        "cursor": "pointer",
        "color" : "rgb(0, 0, 0)",
        "padding-left": "0px"
      });
    }
    if( $input_email.val().length > 0 ){
      $input_email.prev().css({
        "width" : "auto",
        "top"   : "-30px",
        "height": "40px",
        "cursor": "pointer",
        "color" : "rgb(0, 0, 0)",
        "padding-left": "0px"
      });
    }
    if( $input_asunto.val().length > 0 ){
      $input_asunto.prev().css({
        "width" : "auto",
        "top": "-30px",
        "height": "40px",
        "cursor": "pointer",
        "color" : "rgb(0, 0, 0)",
        "padding-left": "0px"
      });
    }
    if( $input_desc.val().length > 0 ){
      $input_desc.prev().css({
        "width" : "auto",
        "top"   : "-30px",
        "height": "40px",
        "cursor": "pointer",
        "color" : "rgb(0, 0, 0)",
        "padding-left": "0px"
      });
    }

  }



  // Mensaje de enviado correctamente
  $(".info_mensaje_enviado").css({
    'top':'50px',
    'opacity':'1'
  });


  $(".info_mensaje_enviado i").on("click", function(){

    $(this).parent().animate({
      opacity: 0,
      top: "-=1000"
    }, 500, function(){
      $(this).remove();
    });

  });



/*
  $(window).resize(function(){

    altura_contacto();

  });


  // Calcula el espacio libre en altura que hay en al página para mantener centrado el contacto
  function altura_contacto(){

    var windowTop = $(document).scrollTop();
    var windowBottom = windowTop + window.innerHeight;
    var contactoTop = $('.contacto').offset().top;
    var contactoBottom = contactoTop + $('.contacto').height();
    var cabeceraTop = $('.cabecera_2elem').offset().top;
    var cabeceraBottom = cabeceraTop + $('.cabecera_2elem').height();
    var pieTop = $('.pie').offset().top;
    var pieBottom = cabeceraTop + $('.pie').height();


    var altura_contacto = contactoBottom - contactoTop;
    var espacio_libre = windowBottom - altura_contacto - cabeceraBottom - pieBottom;

    var padding_top = espacio_libre / 2;


    if( windowBottom > (altura_contacto + 140) ){                               // +140 para que cuente a partir del header y un margen de 40px por debajo

      $(".section_contacto").css({
        "padding-top": padding_top + "px"
      });

    }else{

      $(".section_contacto").css({
        "padding-top": "140px",
      });

    }

  }
*/


});
