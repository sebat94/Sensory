@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-offset-2 col-lg-8">
    <h1>Editar Publication</h1>
    <form class="" action="{{ URL::to('/bo/edit/publications', $p->id) }}" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="title" value="{{$p->title}}" placeholder="Título">
      </div>
      <div class="separacion">
        <div class="form-group separacion_parrafo">
          <textarea type="text" class="form-control" name="authors" placeholder="Autores">{{$p->authors}}</textarea>
        </div>
      </div>
      <div class="separacion">
      <div class="form-group">
        <input type="text" class="form-control" name="place" value="{{$p->place}}" placeholder="Referencia">
      </div>
      <div class="separacion">
      <div class="form-group">
        <select class="form-control" name="type">
            @if($p->type == "a")
                <option selected value="a">Recent article</option>
            @else
                <option value="a">Recent article</option>
            @endif
            @if($p->type == "r")
                <option selected value="r">Revision</option>
            @else
                <option value="r">Revision</option>
            @endif
            @if($p->type == "b")
                <option selected value="b">Book chapter</option>
            @else
                <option value="b">Book chapter</option>
            @endif
        </select>
      </div>
      <div class="separacion">
      <div class="form-group">
        <input type="text" class="form-control" name="link" value="{{$p->link}}" placeholder="Link">
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="separacion">
      <div class="form-group">
        <input type="submit" class="form-control login_btn" name="" value="Guardar">
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
