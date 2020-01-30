@extends('master')

@section('styles')

@endsection

@section('body')
  <section class="section_members">
    <h1>OUR TEAM</h1>

    <div class="group_members">
      <img src="{{URL::to('../public/img/members/grupo.jpg')}}" alt="">
    </div>

    <div class="bloque_contenedor clearfix">

          @foreach($data as $c)
                <div class="members">
                  <h2>{{$c['c']->nombre}}</h2>

                  @foreach($c['members'] as $key=>$m)

                      <article class="member_card">
                        <section class="img_member_card">
                          <img src="{{URL::to('../public/img/members', $c['pics'][$key]->id.'.'.$c['pics'][$key]->ext)}}" alt="">
                        </section>
                        <section class="info_member_card">
                          <span>{{$m->name}}</span>
                          <div>
                            <a href="#" target="_top">{{$m->email}}</a>
                          </div>
                        </section>
                      </article>

                  @endforeach
              </div><!-- members -->
          @endforeach

    </div><!-- bloque_contenedor -->
  </section><!-- section_members -->
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.menu_item').removeClass('menu_active');
      $('li.item_members').addClass('menu_active');
    });
  </script>
@endsection
