@extends('master')

@section('styles')

@endsection

@section('body')

  <section class="section_contacto">
    <div class="bloque_contenedor clearfix">

      <!-- MENSAJE ENVIADO CORRECTAMENTE -->
      <!--<div class="info_mensaje_enviado">
        <p>Message sent successfully</p>
        <i class="fa fa-close"></i>
      </div>-->

      <div class="contacto">


        <article class="contacto_izq">
          <form action="{{ URL::to('/contact') }}" method="post" name="form_contacto">

            <header class="title_contacto_izq">
              <h1>Contacto</h1>
            </header>

            <section class="nombre_contacto_izq">
              <label for="nombre_usuario">Name</label>
              <input type="text" name="nombre" id="nombre_usuario" required="required" tabindex="1">
            </section>
            <section class="email_contacto_izq">
              <label for="email_usuario">Email</label>
              <input type="email" name="email" id="email_usuario" required="required" tabindex="2">
            </section>
            <section class="asunto_contacto_izq">
              <label for="asunto_usuario">Subject</label>
              <input type="text" name="asunto" id="asunto_usuario" required="required" tabindex="3">
            </section>
            <section class="descripcion_contacto_izq">
              <label for="descripcion_usuario">Message</label>
              <textarea name="mensaje" id="descripcion_usuario" required="required" tabindex="4"></textarea>
            </section>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <footer class="btn_submit">
              <input type="submit" value="Enviar" tabindex="5">
            </footer>

          </form>
        </article><!-- contacto_izq -->


        <article class="contacto_der">
          <h2>Location</h2>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3127.286448816785!2d-0.4377927849848528!3d38.38862537965241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6239ee2daa3f55%3A0xcf386ac6bde33063!2sUMH+SAN+JUAN!5e0!3m2!1ses!2ses!4v1517858081792" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </article><!-- contacto_der -->


      </div><!-- contacto -->

    </div><!-- bloque_contenedor clearfix -->
  </section><!-- section_contacto -->

@endsection

@section('scripts')
  <script src="{{ URL::to('../public/js/contact.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.menu_item').removeClass('menu_active');
      $('li.item_contact').addClass('menu_active');
    });
  </script>
@endsection
