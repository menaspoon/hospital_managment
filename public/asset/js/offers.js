$(document).ready(function () {


$(".select_category").change(function () {
    var id = $(this).val();

    // شقة
    if(id == 1) {
      $(".option").hide();
      $(".bath").show(400);
      $(".hall").show(400);
      $(".property_age").show(400);
      $(".kitchen").show(400);
      $(".bedroom").show(400);
      $(".appendix").show(400);
      $(".elevator").show(400);
      $(".adaptation").show(400);
      $(".driver_room").show(400);
      $(".face").show(400);
      $(".families").show(400);
      $(".street_width").show(400);
      $(".furnished").show(400);
      $(".car_entrance").show(400);
      $(".property_floor_no").show(400);
    }
    
    // دور
    if(id == 2) {
      $(".option").hide();
      $(".face").show(400);
      $(".bedroom").show(400);
      $(".street_width").show(400);
      $(".board").show(400);
      $(".bath").show(400);
      $(".property_age").show(400);
      $(".furnished").show(400);
      $(".elevator").show(400);
      $(".car_entrance").show(400);
      $(".property_floor_no").show(400);
    }


    // فيلا
    if(id == 3) {
      $(".option").hide();
      $(".face").show(400);
      $(".street_width").show(400);
      $(".board").show(400);
      $(".hall").show(400);
      $(".bath").show(400);
      $(".property_age").show(400);
      $(".driver_room").show(400);
      $(".servant_room").show(400);
      $(".swimming_pool").show(400);
      $(".furnished").show(400);
      $(".car_entrance").show(400);
      $(".elevator").show(400);
      $(".bedroom").show(400);
      $(".apartment").show(400);
      $(".hall_stair").show(400);
      $(".verse").show(400);
      $(".cellar").show(400);
      $(".duplex").show(400);
      $(".area").show(400);
    }

    // محـــــل
    if(id == 4) {
      $(".option").hide();
      $(".face").show(400);
      $(".street_width").show(400);
      $(".property_age").show(400);
    }

    // بيـــت
    if(id == 5) {
      $(".option").hide();
      $(".face").show(400);
      $(".street_width").show(400);
      $(".bedroom").show(400);
      $(".hall").show(400);
      $(".bath").show(400);
      $(".property_age").show(400);
      $(".driver_room").show(400);
      $(".servant_room").show(400);
      $(".furnished").show(400);
      $(".verse").show(400);
      $(".area").show(400);
      $(".kitchen").show(400);
      $(".board").show(400);
      $(".car_entrance").show(400);
    }



    // استراحة
    if(id == 6) {
      $(".option").hide();
      $(".property_age").show(400);
      $(".street_width").show(400);
      $(".hall").show(400);
      $(".bedroom").show(400);
      $(".bath").show(400);
      $(".verse").show(400);
      $(".kitchen").show(400);
      $(".football_stadium").show(400);
      $(".volleyball_court").show(400);
      $(".amusement_park").show(400);
      $(".families_category").show(400);
    }

    // مكتب تجاري
    if(id == 7) {
      $(".option").hide();
      $(".face").show(400);
      $(".property_age").show(400);
      $(".street_width").show(400);
      $(".car_entrance").show(400);
    }

    //  ارضـــ
    if(id == 8) {
      $(".option").hide();
      $(".face").show(400);
      $(".street_width").show(400);
      $(".purpose").show(400);
    }


    //  عمارة
    if(id == 9) {
      $(".option").hide();
      $(".face").show(400);
      $(".street_width").show(400);
      $(".shops").show(400);
      $(".apartment").show(400);
      $(".property_age").show(400);
      $(".bedroom").show(400);
      $(".purpose").show(400);
      $(".furnished").show(400);
      $(".cellar").show(400);
    }


    //  مستــــــــودع
    if(id == 10) {
      $(".option").hide();
      $(".face").show(400);
      $(".street_width").show(400);
      $(".property_age").show(400);
    }

  //  مخيــــــــم
  if(id == 11) {
      $(".option").hide();
      $(".rental_term").show(400);
      $(".families_category").show(400);
    }

  //  مخيــــــــم
  if(id == 12) {
      $(".option").hide();
      $(".street_width").show(400);
      $(".property_age").show(400);
      $(".rental_term").show(400);
      $(".furnished").show(400);
      $(".kitchen").show(400);
  }

  //  شقة للايجار
  if(id == 13) {
      $(".option").hide();
      $(".street_width").show(400);
      $(".bedroom").show(400);
      $(".hall").show(400);
      $(".property_floor_no").show(400);
      $(".property_age").show(400);
      $(".rental_term").show(400);
      $(".families_title").show(400);
      $(".adaptation").show(400);
      $(".car_entrance").show(400);
      $(".car_entrance").show(400);
      $(".appendix").show(400);
  }

  //  شاليـــة
  if(id == 14) {
      $(".option").hide();
      $(".street_width").show(400);
      $(".property_age").show(400);
      $(".hall").show(400);
      $(".bedroom").show(400);
      $(".bath").show(400);
      $(".rental_term").show(400);
      $(".swimming_pool").show(400);
      $(".football_stadium").show(400);
      $(".volleyball_court").show(400);
      $(".verse").show(400);
      $(".amusement_park").show(400);
      $(".families_category").show(400);
      $(".kitchen").show(400);
  }

  //  مزرعــة
  if(id == 15) {
      $(".option").hide();
      $(".street_width").show(400);
      $(".number_of_wells").show(400);
      $(".number_of_trees").show(400);
      $(".verse").show(400);

  }



});


$(".rental_term-category").change(function () {
    var id = $(this).val();

    if(id == 1) {
      $(".rental_term").show(400);
    } else {
      $(".rental_term").hide(400);
    }
});

});