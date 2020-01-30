@extends('layouts.app')

@section('content')
  <h1>Members</h1>

  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">

        @foreach($categories as $key=>$c)
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="categoria_miembro">{{$c->nombre}}</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
                @foreach($cat_users[$key] as $cu)
                  <tr>
                    <td>{{ $cu->name }}</td>
                    <td>
                      <a href="{{ URL::to('/bo/members', $cu->id) }}"><span class="fa fa-eye acciones accion"></span></a>
                      <a href="{{ URL::to('/bo/edit/members', $cu->id) }}"><span class="fa fa-pencil acciones accion"></span></a>
                      <a href="" onclick='deleteResearch("{{ URL::to("/bo/members", $cu->id) }}")'><span class="fa fa-trash acciones accion"></span></a>
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
          <div class="panel-footer">
            <a href="{{ URL::to('/bo/edit/categories', $c->id) }}"><span class="fa fa-pencil acciones accion"></span></a>
            <a onclick='deleteCategory("{{ URL::to("/bo/categories", $c->id) }}")'><span class="fa fa-trash acciones accion"></span></a>
          </div>
        </div>
        @endforeach
        <a href="{{URL::to('/bo/categories/new')}}" class="btn"><span class="fa fa-plus" style="color: #337ab7;"></span><span style="color: #337ab7; margin-left: 10px;">New Category</span></a>
        <a href="{{ URL::to('bo/new/member') }}" class="btn"><span class="fa fa-plus accion" style="color: #337ab7;"></span><span style="color: #337ab7; margin-left: 10px;">New member</span></a>
    </div>
  </div>

  <form action="" method="post" name="token_form" id="token_form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>


@endsection

@section('scripts')

<script type="text/javascript">
  $(document).ready(function(){
    $('li.item').removeClass('activa');
    $('li.item_members').addClass('activa');
  });
</script>

<script type="text/javascript">
  function deleteResearch(target) {
    $.ajax({
      url: target,
      type: 'delete',
      data: $('#token_form').serialize(),
      success: function(res){
        location.reload();
      }
    });
  }
  function deleteCategory(target) {
    $.ajax({
      url: target,
      type: 'delete',
      data: $('#token_form').serialize(),
      success: function(res){
        location.reload();
      }
    });
  }
</script>

@endsection
