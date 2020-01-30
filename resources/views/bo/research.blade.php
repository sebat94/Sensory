@extends('layouts.app')

@section('content')
  <h1>Research</h1>

  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Título</th>
            <th>Acciones</th>
          </tr>
          @foreach($research as $r)
            <tr>
              <td>{{ $r->title }}</td>
              <td>
                <a href="{{ URL::to('/bo/research', $r->id) }}"><span class="fa fa-eye acciones accion"></span></a>
                <a href="{{ URL::to('/bo/edit/research', $r->id) }}"><span class="fa fa-pencil acciones accion"></span></a>
                <a href="" onclick='deleteResearch("{{ URL::to("/bo/research", $r->id) }}")'><span class="fa fa-trash acciones accion"></span></a>
              </td>
            </tr>
          @endforeach
          <tr>
            <td><a href="{{ URL::to('bo/new/research') }}"><span class="fa fa-plus accion"></span></a></td>
            <td></td>
          </tr>
        </table>
      </div>
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
    $('li.item_research').addClass('activa');
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
</script>

@endsection
