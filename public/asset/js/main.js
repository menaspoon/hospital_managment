$(document).ready(function(){

    $(".btn-delete-gallery-offer").click(function(event){
      event.preventDefault()
      var id = $(this).data("id");
      $.ajax({
          url:"/delete.gallery.offer",
          method:"get",
          data:{id:id},
          success:function(data) {
            $(this).hide(400)
          }
      });
    });

    $(".report-offer").click(function(){
      var id          = $(this).data("id");
      var type        = "offer";
      var report_area = $("#report_area").val();
      var request = new XMLHttpRequest();
      request.open("GET", "/ar/send.report/" + id + "/" + report_area + "/" + type);
      request.send();
      $(".single-page .alert-primary").show(400);
    });

    $(".report-advertiser").click(function(){
      var id          = $(this).data("id");
      var type        = "advertiser";
      var report_area = $("#report_area").val();
      var request = new XMLHttpRequest();
      request.open("GET", "/ar/send.report/" + id + "/" + report_area + "/" + type);
      request.send();
      $(".single-page .alert-primary").show(400);
    }); 


    // اعجبك
    $(".love-it").click(function(){
      var id          = $(this).data("id");
      var request = new XMLHttpRequest();
      request.open("GET", "/ar/store.love/" + id);
      request.send();
      $(this).css("font-weight", "bold");
      $(this).css("color", "red");
    }); 

  });





  $(".pledge").click(function () {
    $(".pledge button").hide(400);
    $(".pledge a").show(400);
  });
