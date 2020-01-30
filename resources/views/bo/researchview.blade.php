@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="{{ URL::to('../public/css/index.css') }}">
@endsection

@section('content')
<section class="section_research" style="padding-top:0px;">
  <div class="bloque_contenedor">

    <div class="proyectos_investigacion" style="padding-top:0px;">

      <article class="proyecto_investigacion">
        <h2>{{ $research->title }}</h2>
        @foreach($paragraphs as $key=>$p)
        <p>{{ $p->paragraph }}</p>
        <div class="img_proyecto_investigacion">
          @foreach($photos[$key] as $photo)
            <div><img src="{{ URL::to('../public/img/research', $photo->id . '.' . $photo->ext) }}" alt=""></div>
          @endforeach
        </div>
        @endforeach
      </article>

    </div><!-- proyecto_investigacion -->

  </div><!-- bloque_contenedor -->
</section><!-- section_research -->
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.item').removeClass('activa');
      $('li.item_research').addClass('activa');
    });
  </script>
@endsection
