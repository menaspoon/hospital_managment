@extends('master')
@section('content')
<br><br>


<div class="messenger">
  <div class="container">
    <div class="row">
{{--
      <div class="col-md-3">
        <div class="users">
          <div class="box">
            @foreach ($ChatAd as $item)
                @if(request()->route('user')."/".request()->route('responsible')."/".request()->route('ad') == $item->user."/".$item->responsible."/".$item->ad)
                    <a style="background: #eeeeee75;" href="/chat/{{ $item->user }}/{{ $item->responsible }}/{{ $item->ad }}" class="FlexBox">
                      <img src="{{ asset("public/offers/" . $item->picture ) }}" alt="">
                      <div>
                        <h6>{{ app()->getLocale() == 'ar' ? $item->name_ar : $item->name_en  }} </h6>
                         <span> {{ $item->username }} </span>
                      </div>
                    </a>
                @else
                    <a href="/chat/{{ $item->user }}/{{ $item->responsible }}/{{ $item->ad }}" class="FlexBox">
                      <img src="{{ asset("public/offers/" . $item->picture ) }}" alt="">
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
 --}}
      <div class="col-md-12">
        <div class="box-chat">

          <div class="chat">
          </div>

          <textarea name="" id="message" cols="30" rows="10" placeholder="{{ __('public.send_message') }}"></textarea>
          <button id="sendMessage">ارسال</button>
        </div>
      </div>

    </div>
  </div>
</div>
<input type="hidden" id="user" value="{{ request()->route('user') }}">
<input type="hidden" id="sender" value="{{ request()->route('sender') }}">



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

// ارسال رسالة
$('#sendMessage').on('click', function(){
  var user          = $("#user").val();
  var responsible   = $("#responsible").val();
  var message       = $("#message").val();
  $.ajax({
      url:"/ar/send.message",
      method:"get",
      data:{ user:user, sender:sender, message},
      success:function(data) {
        $("#message").val(" ");

      }
  });
});

// استدعاء الدردشة
setInterval(function () {
  var ad            = $("#ad").val();
  var user          = $("#user").val();
  var responsible   = $("#responsible").val();
  $.ajax({
    url:"/ar/get.chat",
    method:"get",
    data:{ad:ad, user:user, responsible:responsible},
    success:function(data) {
      $(".box-chat .chat").html(data);
      //$(".all-message .box-chat").scrollBy(1000, 10000);
      //$(".all-message").scrollBy(1000, 10000);
    }
});
}, 1000);

</script>



@endsection
