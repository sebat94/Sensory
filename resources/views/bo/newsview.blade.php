@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ URL::to('public/css/index.css') }}">
@endsection

@section('content')

<div class="content" style="border: 2px solid rgb(23, 200, 185); margin:auto; padding: 20px;">
  <time datetime="<?php echo explode(" ", $news->created_at)[0]; ?>" style="font-size:23px;"><i class="fa fa-calendar" style="color:rgb(23, 200, 185);"></i><i style="color:rgb(23, 200, 185);font-style:normal; font-family: 'Raleway', sans-serif;"><?php echo explode(" ", $news->created_at)[0]; ?></i></time>
  <h2>{{$news->title}}</h2>
  @foreach($paragraphs as $p)
    <p>{{$p->paragraph}}</p><br><br>
  @endforeach
  <div class="enlaces"><a href="{{$news->link}}" target="_blanck">Click for more information</a></div>
</div>

@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.item').removeClass('activa');
      $('li.item_news').addClass('activa');
    });
  </script>
@endsection
