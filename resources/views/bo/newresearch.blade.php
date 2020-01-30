@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <h1>Nueva Research</h1>
      <form class="" action="{{ URL::to('/bo/new/research') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" name="title" value="" placeholder="Título">
        </div>
        <div class="separacion">
          <div class="form-group separacion_parrafo">
            <textarea type="text" class="form-control" name="paragraphs[]" value="" placeholder="Párrafo 1"></textarea>
            <input type="file" name="photos0[]">
          </div>
        </div>
        <div class="form-group">
          <button class="form-control add_btn btn btn-info btn_add_photo" id="add_photo" type="button" name="button">Añadir foto al párrafo</button>
          <button id="add_btn" type="button" class="form-control add_btn btn btn-warning" name="button">Añadir párrafo</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="submit" class="form-control login_btn" name="" value="Crear">
        </div>
      </form>

    </div>
  </div>


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
      $('#add_photo').click(function(){
        var name = $('.separacion > .separacion_parrafo:last-child > input:file').attr('name');
        $('.separacion > .separacion_parrafo:last-child').append("<input type='file' name='"+name+"'>")
      });


    });
  </script>
@endsection
