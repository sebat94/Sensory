@extends('layouts.app')

@section('content')
  <h1>Publications</h1>

  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Título</th>
            <th>Type</th>
            <th>Acciones</th>
          </tr>
          @foreach($publications as $n)
            <tr>
              <td>{{ $n->title }}</td>
              <td>
                  @if($n->type == "a")
                      Recent article
                  @elseif($n->type == "b")
                      Book chapter
                  @else
                      Revision
                  @endif
              </td>
              <td>
                <a href="{{ URL::to('/bo/publications', $n->id) }}"><span class="fa fa-eye acciones accion"></span></a>
                <a href="{{ URL::to('/bo/edit/publications', $n->id) }}"><span class="fa fa-pencil acciones accion"></span></a>
                <a href="" onclick='deletePublications("{{ URL::to("/bo/publications", $n->id) }}")'><span class="fa fa-trash acciones accion"></span></a>
              </td>
            </tr>
          @endforeach
          <tr>
            <td><a href="{{ URL::to('bo/new/publications') }}"><span class="fa fa-plus accion"></span></a></td>
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
    $('li.item_publications').addClass('activa');
  });
</script>

<script type="text/javascript">
  function deletePublications(target) {
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
