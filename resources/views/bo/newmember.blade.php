@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <h1>Nuevo miembro</h1>
      <form class="" action="{{ URL::to('/bo/new/member') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" name="name" value="" placeholder="Nombre completo">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="email" value="" placeholder="Email">
        </div>
        <div class="form-group">
          <select class="" name="category">
            @foreach($categories as $c)
              <option value="{{$c->id}}">{{$c->nombre}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="">Foto perfil</label>
          <input type="file" name="pic">
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
      $('li.item_members').addClass('activa');
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
