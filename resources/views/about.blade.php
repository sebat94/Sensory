@extends('master')

@section('title')
  HOME
@endsection

@section('styles')
@endsection

@section('body')
<section class="section_quienes_somos">
  <div class="bloque_contenedor clearfix">
    <article class="quienes_somos">
      <span>About us</span>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, tempore molestias impedit voluptatum magni! Doloribus harum soluta qui quisquam necessitatibus velit neque repellat itaque laborum inventore voluptate optio quasi labore enim quo perferendis molestias molestiae reprehenderit non, veniam quas in autem voluptatum. Suscipit omnis totam ipsa excepturi deleniti cum porro consectetur facere laboriosam est at adipisci, nostrum illum placeat, incidunt unde ducimus libero, soluta hic consequatur ut itaque quaerat doloremque velit. Atque, sunt quod. Quis esse voluptatum libero voluptatibus repudiandae magni enim laboriosam. Cumque quidem maxime eius accusamus, optio vero rerum sit adipisci maiores sapiente deleniti molestias, modi, porro nam itaque! Sit atque amet excepturi, odio corrupti eveniet obcaecati nesciunt ea laboriosam dolore tempora optio ab quia laborum culpa rem.
      </p>
      <br>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil iste repellat nesciunt possimus ea expedita qui quasi, illo maiores, nemo laborum dolorum, consectetur sapiente cupiditate magni deserunt fuga reiciendis quos mollitia veritatis molestias magnam? Dolores mollitia harum tenetur consequuntur eveniet consequatur cumque ullam soluta amet excepturi minima deserunt quasi reprehenderit dolorem quod aspernatur, corrupti pariatur temporibus rem! Possimus optio, doloremque.
      </p>
    </article><!-- quienes_somos -->
  </div><!-- bloque_contenedor -->
</section><!-- section_quienes_somos -->

<section class="section_slideshow_about_us">
  <div class="bloque_contenedor clearfix">
    <div class="slideshow">
      <ul id="wrap_slideshow">
        <li><img src="{{ URL::to('../public/img/sensory/1.jpg') }}" alt=""></li>
        <li><img src="{{ URL::to('../public/img/sensory/2.jpg') }}" alt=""></li>
        <li><img src="{{ URL::to('../public/img/sensory/3.jpg') }}" alt=""></li>
        <li><img src="{{ URL::to('../public/img/sensory/4.jpg') }}" alt=""></li>
      </ul>
    </div>
    <button data-mov="ant" class="btn_slideshow btn_slideshow_left">&#10094;</button>
    <button data-mov="sig" class="btn_slideshow btn_slideshow_right">&#10095;</button>
  </div>
</section>
@endsection

@section('scripts')
  <script src="{{ URL::to('../public/js/slideshow.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.menu_item').removeClass('menu_active');
      $('li.item_about').addClass('menu_active');
    });
  </script>
@endsection
