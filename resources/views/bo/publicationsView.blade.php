@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ URL::to('public/css/index.css') }}">
@endsection

@section('content')

<div class="content" style="border: 2px solid rgb(23, 200, 185); margin:auto; padding: 20px;">
  <h2>{{$p->title}}</h2>
  <h5>Authors: {{$p->authors}}</h5>
  <h5>Reference: {{$p->place}}</h5>
  <h5>Type:
      @if($p->type == "a")
          Recent article
      @elseif($p->type == "b")
          Book chapter
      @else
          Revision
      @endif
  </h5>
  <div class="enlaces"><a href="{{$p->link}}" target="_blanck">Click for more information</a></div>
</div>

@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.item').removeClass('activa');
      $('li.item_publications').addClass('activa');
    });
  </script>
@endsection
