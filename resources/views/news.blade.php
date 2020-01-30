@extends('master')

@section('styles')

@endsection

@section('body')

<section class="section_news">
  <div class="bloque_contenedor1600 clearfix">

    <div class="wrap_news">
      <h1>News</h1>

      <section class="timeline">
        <ul>

            @foreach($news as $n)

                <li>
                    <div class="content">
                    <time datetime="<?php echo explode(" ", $n['news']->created_at)[0]; ?>"><i class="fa fa-calendar"></i><?php echo explode(" ", $n['news']->created_at)[0]; ?></time>
                      <h2>{{$n['news']->title}}</h2>
                      <p>
                        @foreach($n['paragraphs'] as $p)
                            {{$p->paragraph}}
                            <br><br>
                        @endforeach
                      </p>
                      <div class="enlaces"><a href="{{$n['news']->link}}">{{$n['news']->link}}</a></div>
                    </div>
                </li>

            @endforeach

        </ul>
        <div class="btn_load_more">Load more</div>
      </section>

    </div><!-- wrap_news -->

  </div><!-- bloque_contenedor -->
</section><!-- section_news -->

@endsection

@section('scripts')
  <script src="{{ URL::to('../public/js/news.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.menu_item').removeClass('menu_active');
      $('li.item_news').addClass('menu_active');
    });
  </script>
@endsection
