@extends('master')

@section('title')
  HOME
@endsection

@section('styles')
@endsection

@section('body')
  <section class="portada">
    <article class="img_portada">
      <div style="background-image:url('{{ URL::to('../public/img/sensory/1.jpg') }}');"></div>
      <div id="particles-js"></div>
      <div class="sensory_name">
        <span>sensory transduction and nociception</span>
      </div>
    </article>
  </section><!-- portada -->

  <div class="owl-carousel owl-theme row-carousel">
      <div class="item"><img src="{{ URL::to('../public/img/sensory/11.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/12.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/13.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/14.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/1.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/2.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/3.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/4.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/5.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/6.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/7.jpg') }}" alt=""></div>
      <div class="item"><img src="{{ URL::to('../public/img/sensory/8.jpg') }}" alt=""></div>
  </div>
@endsection

@section('scripts')
  <script src="{{ URL::to('../public/js/lib/owl.carousel.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::to('../public/js/lib/particles.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::to('../public/js/particle.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      dots: false,
      nav: true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          }
      }
    })
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('li.menu_item').removeClass('menu_active');
      $('li.item_home').addClass('menu_active');
    });
  </script>
@endsection
