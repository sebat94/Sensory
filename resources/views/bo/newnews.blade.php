@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <h1>Nueva News</h1>
      <form class="" action="{{ URL::to('/bo/new/news') }}" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="title" value="" placeholder="Título">
        </div>
        <div class="separacion">
          <div class="form-group separacion_parrafo">
            <textarea type="text" class="form-control" name="paragraphs[]" value="" placeholder="Párrafo 1"></textarea>
          </div>
        </div>
        <div class="form-group">
          <button id="add_btn" type="button" class="form-control add_btn btn btn-warning" name="button">Añadir párrafo</button>
        </div>
        <div class="form-group">
          <label for="">Fecha (YYYY-DD-MM)</label>
          <input type="text" class="form-control" name="date" value="" placeholder="YYYY-DD-MM">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="link" value="" placeholder="Link">
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
      $('li.item_news').addClass('activa');
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){

      $('#add_btn').click(function(){
          var num = $('.separacion_parrafo').length
          $('.separacion').append(
            "<div class='form-group separacion_parrafo'><textarea type='text' class='form-control' name='paragraphs[]' value='' placeholder='Párrafo "+(num+1)+"'></textarea>"
          );
      });

    });
  </script>
@endsection
