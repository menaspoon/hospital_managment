@extends('master')
@section('content')
<br><br> 

<div class="messenger">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-md-8">
        <div class="users">
          <div class="box">
            @foreach ($ChatAd as $item)
                @if(request()->route('user')."/".request()->route('responsible')."/".request()->route('ad') == $item->user."/".$item->responsible."/".$item->ad)
                    <a style="background: #eeeeee75;" href="/chat/{{ $item->user }}/{{ $item->responsible }}/{{ $item->ad }}" class="FlexBox">
                      <img src="{{ asset("public/users/" . $item->avatar ) }}" alt="">
                      <div>
                        <h6>{{ app()->getLocale() == 'ar' ? $item->name_ar : $item->name_en  }} </h6>
                        <span> {{ $item->username }} </span>
                      </div>
                    </a>
                @else
                    <a href="/chat/{{ $item->user }}/{{ $item->responsible }}/{{ $item->ad }}" class="FlexBox">
                      <img src="{{ asset("public/users/" . $item->avatar ) }}" alt="">
                      <div>
                        <h6>{{ app()->getLocale() == 'ar' ? $item->name_ar : $item->name_en  }} </h6>
                        <span> {{ $item->username }} </span>
                      </div>
                    </a>
                @endif
            @endforeach
          </div>
        </div>
      </div>
 


    </div>
  </div>
</div>



@endsection
