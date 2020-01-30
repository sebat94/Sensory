@extends('masterbo')

@section('body')
  <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-4 col-lg-4 box">
    <h1>Login</h1>
    <form class="" action="index.html" method="post">
      <div class="form-group">
        <input type="text" class="form-control input_ancho" name="" value="" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" class="form-control input_ancho" name="" value="" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="submit" class="form-control login_btn" name="" value="Login">
      </div>
    </form>

  </div>

  </div>  <!-- row -->
@endsection

@section('scripts')
<script type="text/javascript">

  $(document).ready(function(){
    $('li.item').removeClass('activa');
    $('li.item_home').addClass('activa');
  });
</script>
@endsection
