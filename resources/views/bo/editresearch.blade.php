@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <h1>Editar Research</h1>

      <!--
      |**************************
      |   FORM TITLE
      |**************************
      -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">TÍTULO</h3>
        </div>
        <div class="panel-body">

          <form action="{{ URL::to('/bo/edit/title/research', $researches->id)}}" method="post" name="form_title">
            <div class="form-group">
              <input type="text" class="form-control" name="title" value="{{ $researches->title }}">
            </div>
            <div class="form-group">
              <input type="submit" class="form-control login_btn" name="" value="Guardar">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>

      </div>
    </div>

      <!--
      |**************************
      |   FORMS PARAGRAPHS
      |**************************
      -->
      @foreach($paragraphs as $key=>$p)
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Párrafo {{ $key+1 }}</h3>
            <form class="" action="{{ URL::to('/bo/delete/paragraph/research', $p->id) }}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="btn_submit">
                <i class="fa fa-trash"></i>
                <input class="fa fa-trash" type="submit" name="" value="">
              </div>
            </form>
          </div>
          <div class="panel-body">

            <form class="" action="{{ URL::to("/bo/edit/paragraph/research", $p->id) }}" method="post" enctype="multipart/form-data">
              <div class="parrafo{{$key}} form-group separacion_parrafo parrafo">
                <textarea type="text" class="form-control" name="paragraph" value="">{{ $p->paragraph }}</textarea>
              </div>
                <button class="form-control add_btn btn btn-info add_photo" type="button" name="button_add_photo" style="margin-top:10px;">Añadir foto al párrafo</button>
              <div class="form-group">
                <input type="submit" class="form-control login_btn" name="" value="Guardar">
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

            @foreach($photos[$key] as $photo)
            <div class="row">
              <div class="col-lg-4">
                <img class="foto_edit" src="{{ URL::to('../public/img/research', $photo->id . '.' . $photo->ext) }}" alt="">
              </div>
            </div>

            <form class="" action="{{ URL::to("/bo/delete/photo/research", $photo->id) }}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input class="form-control login_btn btn_eliminar" type="submit" name="" value="Eliminar">
            </form>

            @endforeach

          </div>
        </div>
      @endforeach

      <div class="panel panel-default panel_nuevo_parrafo">
        <div class="panel-heading">
          <h3 class="panel-title">Nuevo Párrafo</h3>
        </div>
        <div class="panel-body">
          <form class="" action="{{ URL::to("/bo/new/paragraph/research", $researches->id) }}" method="post" enctype="multipart/form-data">
            <div class="nuevo_parrafo form-group separacion_parrafo parrafo">
              <textarea placeholder="Texto párrafo" type="text" class="form-control" name="paragraph" value=""></textarea>
            </div>
            <button class="form-control add_btn btn btn-info add_photo" type="button" name="button_add_photo" style="margin-top:10px;">Añadir foto al párrafo</button>
            <div class="form-group">
              <input type="submit" class="form-control login_btn" name="" value="Guardar">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>

        </div>
      </div>

      <button class="form-control add_btn btn btn-info add_para" type="button" name="add_para" style="margin-top:10px;">Añadir párrafo</button>

@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.item').removeClass('activa');
      $('li.item_research').addClass('activa');
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

      $('.add_photo').on("click", function(){
        $(this).before("<input type='file' name='photos[]'>");
      });

      $('.add_para').click(function(){
        $('.panel_nuevo_parrafo').css('display', 'block');
        $(this).css('display', 'none');
      });

    });

  </script>

@endsection
