<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ URL::to('../public/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::to('../public/css/fonts.css') }}">
  <script src="{{URL::to('../public/js/lib/jquery-2.1.4.min.js') }}" type="text/javascript"></script>
  <script src="{{URL::to('../public/js/lib/jquery.mobile.custom.events.min.js') }}" type="text/javascript"></script>
  <script src="{{URL::to('../public/js/global.js') }}" type="text/javascript"></script>
  <link rel="stylesheet" href="{{ URL::to('../public/css/index.css') }}">
  @yield('styles')
</head>
<body>
    @if(Session::has('email'))
  <header class="cabecera_2elem unselectable">
    <div class="bloque_contenedor">

      <div class="cabecera_izq">
        <a href="{{ URL::to('/') }}">
          <span>sensory transduction and nociception</span>
        </a>
      </div>

      <div class="cabecera_der">
        <img src="{{ URL::to('../public/img/logo/logo_black.png') }}" alt="">
      </div>

      <div class="cabecera_centro">
        <nav>
          <ul>
            <li class="menu_item item_about"><a href="{{ URL::to('/about') }}">About us</a></li><!-- menu_active item_home -->
            <li class="menu_item item_researches"><a href="{{ URL::to('/researches') }}">Research</a></li>
            <li class="menu_item item_publications"><a href="{{ URL::to('/publications') }}">Publications</a></li>
            <li class="menu_item item_news"><a href="{{ URL::to('/news') }}">News</a></li>
            <li class="menu_item item_members"><a href="{{ URL::to('/members') }}">Lab members</a></li>
            <li class="menu_item item_contact"><a href="{{ URL::to('/contact') }}">Contact</a></li>
          </ul>
        </nav>
      </div>

      <div class="hamburguesa">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
  </header>
  @yield('body')
  @yield('scripts')

  <footer class="pie">
    <span>sensory transduction and nociception</span>
    <p><a href="{{ URL::to('/index.php/legal') }}">Terms &#38; Conditions</a></p>
    <p><i class="fa fa-copyright"></i>Sensory. All rights reserved. Made with <i class="fa fa-heart"></i> by <a href="#">CAREBEROS</a></p>
  </footer>

  <div class="cookies">
    <span>Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y mejorar nuestros servicios. Si continúa navegando, consideramos que acepta su uso. Puede obtener más información a través de este <a href="{{URL::to('/legal')}}">enlace</a>. <button class="close_cookies">Aceptar</button></span>
  </div><!-- cookies -->
@else
<article class="contacto_izq">
  <form action="{{ URL::to('/loginProvisional') }}" method="post" name="form_contacto">

    <header class="title_contacto_izq">
      <h1>Login</h1>
    </header>

    <section class="nombre_contacto_izq">
      <label for="nombre_usuario">Email</label><br>
      <input type="text" name="email" id="nombre_usuario" required="required" tabindex="1">
    </section>
    <section class="email_contacto_izq">
      <label for="email_usuario">Password</label><br>
      <input type="password" name="password" id="email_usuario" required="required" tabindex="2">
    </section>
    {{ csrf_field() }}
    <footer class="btn_submit">
      <input type="submit" value="Enviar" tabindex="5">
      @if(Session::has('error'))
        {{Session::get('error')}}
      @endif
    </footer>

  </form>
</article><!-- contacto_izq -->
@endif

</body>
</html>
