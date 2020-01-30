@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <h1>New Publication</h1>
      <form class="" action="{{ URL::to('/bo/new/publications') }}" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="title" value="" placeholder="Título">
        </div>
        <div class="separacion">
          <div class="form-group separacion_parrafo">
            <textarea type="text" class="form-control" name="authors" value="" placeholder="Autores"></textarea>
          </div>
        </div>
        <div class="separacion">
        <div class="form-group">
          <input type="text" class="form-control" name="place" value="" placeholder="Referencia">
        </div>
        <div class="separacion">
        <div class="form-group">
          <select class="form-control" name="type">
              <option value="a">Recent article</option>
              <option value="r">Revision</option>
              <option value="b">Book chapter</option>
          </select>
        </div>
        <div class="separacion">
        <div class="form-group">
          <input type="text" class="form-control" name="link" value="" placeholder="Link">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="separacion">
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
      $('li.item_publications').addClass('activa');
    });
  </script>
@endsection
