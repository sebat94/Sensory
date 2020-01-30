@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <h1>Edit Category</h1>
      <form class="" action="{{ URL::to('/bo/edit/categories', $category->id) }}" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="name" value="{{$category->nombre}}" placeholder="Category name">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="submit" class="form-control login_btn" name="" value="Edit">
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
@endsection
