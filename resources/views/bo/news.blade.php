@extends('layouts.app')

@section('content')
  <h1>News</h1>

  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Título</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
          @foreach($news as $n)
            <tr>
              <td>{{ $n->title }}</td>
              <td><?php echo explode(" ", $n->created_at)[0]; ?></td>
              <td>
                <a href="{{ URL::to('/bo/news', $n->id) }}"><span class="fa fa-eye acciones accion"></span></a>
                <a href="{{ URL::to('/bo/edit/news', $n->id) }}"><span class="fa fa-pencil acciones accion"></span></a>
                <a href="" onclick='deleteNews("{{ URL::to("/bo/news", $n->id) }}")'><span class="fa fa-trash acciones accion"></span></a>
              </td>
            </tr>
          @endforeach
          <tr>
            <td><a href="{{ URL::to('bo/new/news') }}"><span class="fa fa-plus accion"></span></a></td>
            <td></td>
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
    $('li.item_news').addClass('activa');
  });
</script>

<script type="text/javascript">
  function deleteNews(target) {
    $.ajax({
      url: target,
      type: 'delete',
      data: $('#token_form').serialize(),
      success: function(res){
      }
    });
  }
</script>

@endsection
