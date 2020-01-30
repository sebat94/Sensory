@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-offset-2 col-lg-8">
    <h1>Editar News</h1>

      <!--
      |**************************
      |   FORM DATOS
      |**************************
      -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">DATOS</h3>
        </div>
        <div class="panel-body">

          <form action="{{ URL::to('/bo/edit/data/news', $news->id)}}" method="post" name="form_title">
            <div class="form-group">
              <label for="">Título</label>
              <input type="text" class="form-control" name="title" value="{{ $news->title }}">
            </div>
            <div class="form-group">
              <label for="">Fecha</label>
              <input type="text" class="form-control" name="date" value="<?php echo explode(" ", $news->created_at)[0]; ?>">
            </div>
            <div class="form-group">
              <label for="">Link</label>
              <input type="text" class="form-control" name="link" value="{{ $news->link }}">
            </div>
            <div class="form-group">
              <input type="submit" class="form-control login_btn" name="" value="Guardar">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>

      </div>
    </div>


    @foreach($paragraphs as $key=>$p)
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Párrafo {{ $key+1 }}</h3>
          <form class="" action="{{ URL::to('/bo/delete/paragraph/news', $p->id) }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn_submit">
              <i class="fa fa-trash"></i>
              <input class="fa fa-trash" type="submit" name="" value="">
            </div>
          </form>
        </div>
        <div class="panel-body">

          <form class="" action="{{ URL::to("/bo/edit/paragraph/news", $p->id) }}" method="post">
            <div class="parrafo{{$key}} form-group separacion_parrafo parrafo">
              <textarea type="text" class="form-control" name="paragraph" value="">{{ $p->paragraph }}</textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="form-control login_btn" name="" value="Guardar">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>

        </div>
      </div>
    @endforeach



    <div class="panel panel-default panel_nuevo_parrafo">
      <div class="panel-heading">
        <h3 class="panel-title">Nuevo Párrafo</h3>
      </div>
      <div class="panel-body">
        <form class="" action="{{ URL::to("/bo/new/paragraph/news", $news->id) }}" method="post">
          <div class="nuevo_parrafo form-group separacion_parrafo parrafo">
            <textarea placeholder="Texto párrafo" type="text" class="form-control" name="paragraph" value=""></textarea>
          </div>
          <div class="form-group">
            <input type="submit" class="form-control login_btn" name="" value="Guardar">
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>

      </div>
    </div>

    <button class="form-control add_btn btn btn-info add_para" type="button" name="add_para" style="margin-top:10px;">Añadir párrafo</button>

  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.item').removeClass('activa');
      $('li.item_news').addClass('activa');
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){

      $('#add_btn').click(function(){
          var num = $('.separacion_parrafo').length
          $('.separacion').append(
            "<div class='form-group separacion_parrafo'><textarea type='text' class='form-control' name='paragraphs[]' value='' placeholder='Párrafo "+(num+1)+"'></textarea><input type='file' name='photos"+num+"[]'></div>"
          );
      });

      $('.add_para').click(function(){
        $('.panel_nuevo_parrafo').css('display', 'block');
        $(this).css('display', 'none');
      });

    });

  </script>

@endsection
