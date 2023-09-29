$(document).ready(function () {



  // الرسائل والاشعارات
  $(".display-notifications").click(function (event) {
    event.preventDefault();
    $(".message-body").hide();
    $(".notifications-body").show();
    $(".link-all-message").hide();
    $(".link-all-notifications").show();
  });

  $(".display-message").click(function (event) {
    event.preventDefault();
    $(".notifications-body").hide();
    $(".message-body").show();
    $(".link-all-message").show();
    $(".link-all-notifications").hide()
  });



  $(".btn-list-sctegory").click(function () {
    $(".toggle-menu").hide();
    $(".list-sctegory").toggle(1000);
  });

  $(".btn-list-pharmacy").click(function () {
    $(".toggle-menu").hide();
    $(".list-pharmacy").toggle(1000);
  });

  $(".btn-list-hr").click(function () {
    $(".toggle-menu").hide();
    $(".list-hr").toggle(1000);
  });

$('.show-password').on('click', function () {
    if($(".input-password").prop("type") == "text") {
        $(".input-password").attr('type', 'password');
        $(".show-password").html('<i class="fas fa-eye"></i>')

    } else {
        $(".input-password").attr('type', 'text'); 
        $(".show-password").html('<i class="fas fa-eye-slash"></i>')
    }
});


  
  
  

$('.delete').on('click', function(event){
  event.preventDefault()
    var id     = $(this).data("id");
    var table     = $(this).data("table");
    $(this).parent().parent().hide(400)

    $.ajax({
        url:"/public.delete",
        method:"get",
        data:{id:id, table:table},
        success:function(data) {
          $(this).parent().parent().hide(400)
        }
    });
});






$('.remove-img').on('click', function(event){
    event.preventDefault()
    var id     = $(this).data("id");
    $(this).hide(400);
    $.ajax({
        url:"/delete.picture",
        method:"get",
        data:{id:id},
        success:function(data) {
          $(this).hide(400);
        }
    });
});









// Ø§Ø³ØªØ¯Ø¹Ø§Ø¡ Ø§Ù„Ø§Ù‚Ø³Ø§Ù… Ø§Ù„ÙØ±Ø¹ÙŠØ©
$(".select_category").change(function(){
  var id = $(this).val();
  $.ajax({
      url:"/ajax.get.sub.category",
      method:"get",
      data:{id:id},
      success:function(data) {
        $(".sub_category").html(data);
      }
  });
});


$(".sub_category").change(function(){
  var id = $(this).val();
  $.ajax({
      url:"/ajax.get.sub.sub.category",
      method:"get",
      data:{id:id},
      success:function(data) {
        $(".sub_sub_category").html(data);
        if(data != "") {
            $(".container_sub_sub_category").css("display", "block");
        }
      }
  });
});






$(".subscribe-plan").click(function(){
  var plan = $(this).data("plan");
  $.ajax({
      url:"/store.user.subscribe",
      method:"get",
      data:{plan:plan},
      success:function(data) {
        $(".subscribe-plan-alert").show(200);
      }
  });
});




$(".approve-subscribe-plan").click(function(){
  var plan = $(this).data("plan");
  $.ajax({
      url:"/approve.subscribe.plan",
      method:"get",
      data:{plan:plan},
      success:function(data) {
        $(".approve-subscribe-plan-" + plan).text("approve");
      }
  });
});


$(".wating-subscribe-plan").click(function(){
  var plan = $(this).data("plan");
  $.ajax({
      url:"/wating.subscribe.plan",
      method:"get",
      data:{plan:plan},
      success:function(data) {
        $(".approve-subscribe-plan-" + plan).text("wating");
      }
  });
});


// Check Offer
$(".rat-offer").click(function () {
  $("#rat-type").val("offer");
  $("#rat-offer").val($("#offer-id").val());
  $(".rating-succsess").hide(100);
  $(".rating-isset").hide(100);
  $(".p-advertiser").hide(100);
  $(".p-offer").show(100);
  $(".rating").show(400);
  $(".report").hide(10);
});

// Check Offer
$(".rat-advertiser").click(function () {
  $("#rat-type").val("advertiser");
  $("#rat-offer").val($("#advertiser-id").val());
  $(".rating-succsess").hide(100);
  $(".rating-isset").hide(100);
  $(".p-advertiser").show(100);
  $(".p-offer").hide(100);
  $(".rating").show(400);
  $(".report").hide(10);
});

// Send Rating
$(".send-rating").click(function(){
  var rat   = $(this).data("rat");
  var type  = $("#rat-type").val();
  var offer = $("#rat-offer").val();
  $.ajax({
      url:"/send.rating",
      method:"get",
      data:{rat:rat, type:type, offer:offer},
      success:function(data) {
        if(data == "Success") {
          $(".rating-succsess").show(100);
          $(".rating-isset").hide(100);
        } else {
          $(".rating-succsess").hide(100);
          $(".rating-isset").show(100);
        }
      }
  });
});




// Check Offer
$(".btn-report").click(function () {
  $(".report").show(10);
  $(".rating").hide(10);
});


// Send Report
$(".send-report").click(function(){
  var text  = $("#report-text").val();
  var offer = $("#offer-id").val();
  $.ajax({
      url:"/send.report",
      method:"get",
      data:{text:text, offer:offer},
      success:function(data) {
        $(".report-succsess").show(100);
      }
  });
});









// Search
$("#box-search").keyup(function(){
  var query  = $(this).val();
  $.ajax({
      url:"/search",
      method:"get",
      data:{query:query},
      success:function(data) {
        $(".result-search").html(data);
      }
  });
});





// Love It
$(".love-it").click(function(){
  var offer  = $(this).data("id");
  $(this).css("font-weight", "bold");
  $(this).css("color", "#ef091f");
  $.ajax({
      url:"/send.love.it",
      method:"get",
      data:{offer:offer}
  });
});

// Love It
$(".filter-box").click(function(){
  $(".header-cat").show(100);
  $(this).hide(100);
});








// offer-paid
$(".offer-paid").click(function(){
  var offer  = $(this).data("id");
  var status  = $(this).data("paid");
  $(this).attr('disabled','disabled');
  if(status == "paid") {
      $(".sale-" + offer).css("display", "block")
  }
  
  if(status == "not_paid") {
      $(".sale-" + offer).css("display", "none")
  }

  $.ajax({
      url:"/update.status.paid",
      method:"get",
      data:{offer:offer, status:status}
  });
});


























});