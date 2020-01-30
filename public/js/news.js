$(document).ready(function(){



      $('.content').each(function(i){

        var top_of_object = $(this).offset().top;
        //var bottom_of_object = $(this).offset().top + $(this).outerHeight();
        var bottom_of_window = $(window).height();

        if( (top_of_object + 100) > bottom_of_window ){
          $(this).addClass('hidden');
        }

      });


      $(window).scroll(function(){
          /* Checkea la localización de cada elmeneto 'hidden' */
          $('.hidden').each(function(i){

              var top_of_object = $(this).offset().top;
              //var bottom_of_object = $(this).offset().top + $(this).outerHeight();
              var bottom_of_window = $(window).scrollTop() + $(window).height();

              if( bottom_of_window > (top_of_object + 100) ){
                $(this).animate({'opacity':'1'},700);
              }

          });
      });


});
