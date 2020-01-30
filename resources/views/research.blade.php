@extends('master')

@section('styles')

@endsection

@section('body')
  <section class="section_research">
    <div class="bloque_contenedor clearfix">

      <div class="proyectos_investigacion">

          @foreach($researches as $r)

              <article class="proyecto_investigacion">
                <h2>{{$r['research']->title}}</h2>

                @foreach($r['paragraphs'] as $key=>$p)

                    <p>{{$p->paragraph}}</p>

                    <div class="img_proyecto_investigacion">
                    @foreach($r['pics'][$key] as $pic)
                            <div><img src="{{URL::to('../public/img/research', $pic->id.'.'.$pic->ext)}}" alt=""></div>
                    @endforeach
                    </div>

                @endforeach

          @endforeach

      </div><!-- proyecto_investigacion -->

    </div><!-- bloque_contenedor clearfix -->
  </section><!-- section_research -->
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.menu_item').removeClass('menu_active');
      $('li.item_researches').addClass('menu_active');
    });
  </script>
@endsection
