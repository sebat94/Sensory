@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ URL::to('public/css/index.css') }}">
@endsection

@section('content')

<div class="content" style="border: 2px solid rgb(23, 200, 185); margin:auto; padding: 20px;">
  <h2>{{$member->name}}</h2>
  <h3>{{$member->email}}</h3>
  @if($pic != null)
    <div class="foto_perfil">
      <img src="{{URL::to('../public/img/members', $pic->id . '.' . $pic->ext)}}" alt="">
    </div>
  @endif
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
