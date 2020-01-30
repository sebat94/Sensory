@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <h1>Editar miembro</h1>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Datos</h3>
        </div>
        <div class="panel-body">
          <form class="" action="{{ URL::to('/bo/edit/member', $m->id) }}" method="post">
            <div class="form-group">
              <label for="">Full name</label>
              <input type="text" class="form-control" name="name" value="{{$m->name}}">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" class="form-control" name="email" value="{{$m->email}}">
            </div>
            <div class="form-group">
              <label for="">Category</label><br>
              <select class="" name="category">
                @foreach($categories as $c)
                  @if($m->category == $c->id)
                    <option value="{{$c->id}}" selected>{{$c->nombre}}</option>
                  @else
                    <option value="{{$c->id}}">{{$c->nombre}}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <input type="submit" class="form-control login_btn" name="" value="Guardar">
            </div>
          </form>

        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Foto de perfil</h3>
        </div>
        <div class="panel-body">
          @if($pic != null)
            <div class="row">
              <div class="col-lg-4">
                <label for="">Actual</label>
                <img class="foto_edit" src="{{ URL::to('../public/img/members', $pic->id . '.' . $pic->ext) }}" alt="">
              </div>
            </div>
          @endif
          <br><br>
          <form class="" action="{{ URL::to('/bo/edit/photo/member', $m->id) }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Remplazar foto</label>
              <input type="file" name="pic">
              <p>Nota: Se eliminará la anterior en caso de que ésta exista.</p>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <input type="submit" class="form-control login_btn" name="" value="Actualizar foto">
            </div>
          </form>
        </div>
      </div>

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
