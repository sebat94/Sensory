@extends('master')

@section('styles')

@endsection

@section('body')
<section class="section_publicaciones">
  <div class="bloque_contenedor clearfix">

      <div class="tab_container">

        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1"><i class="fa fa-file-text-o"></i><span>Recent articles</span></label>

        <input id="tab2" type="radio" name="tabs">
        <label for="tab2"><i class="fa fa-pencil-square-o"></i><span>Revisions</span></label>

        <input id="tab3" type="radio" name="tabs">
        <label for="tab3"><i class="fa fa-book"></i><span>Book chapters</span></label>

        <!-- SECCIÓN ARTÍCULOS RECIENTES -->
        <section id="content1" class="tab_content">
          <h2>Recent articles</h2>

          @foreach($articles as $a)

              <article class="articulo_reciente">
                <h3>{{$a->title}}</h3>
                <span>{{$a->authors}}</span>
                <br>
                <span>{{$a->place}}</span>
                <br>
                <a href="{{$a->link}}"><i class="fa fa-external-link"></i> Go to the post</a>
              </article>

          @endforeach

        </section>

        <!-- SECCIÓN REVISIONES -->
        <section id="content2" class="tab_content">
          <h2>Revisions</h2>

          @foreach($revisions as $a)

              <article class="articulo_reciente">
                <h3>{{$a->title}}</h3>
                <span>{{$a->authors}}</span>
                <br>
                <span>{{$a->place}}</span>
                <br>
                <a href="{{$a->link}}"><i class="fa fa-external-link"></i> Go to the post</a>
              </article>

          @endforeach

        </section>

        <!-- SECCIÓN CAPÍTULOS DE LIBRO -->
        <section id="content3" class="tab_content">
          <h2>Chapters of books</h2>

          @foreach($chapters as $a)

              <article class="articulo_reciente">
                <h3>{{$a->title}}</h3>
                <span>{{$a->authors}}</span>
                <br>
                <span>{{$a->place}}</span>
                <br>
                <a href="{{$a->link}}"><i class="fa fa-external-link"></i> Go to the post</a>
              </article>

          @endforeach

        </section>

      </div><!-- tab_container -->

  </div><!-- bloque_contenedor -->
</section><!-- section_publications -->
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.menu_item').removeClass('menu_active');
      $('li.item_publications').addClass('menu_active');
    });
  </script>
@endsection
