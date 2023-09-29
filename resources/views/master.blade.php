<!DOCTYPE html>
 <html dir="rtl" lang="ar">
 <head>
   <meta charset="UTF-8">
   <title> Hospital </title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('/asset/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/asset/css/owl.theme.default.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/asset/css/icofont.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/asset/css/MyClass.css') }}">
  <link rel="stylesheet" href="{{ asset('/asset/css/mdb.rtl.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/asset/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
 </head>
 <body>





  @if (Auth::id())
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">لوحة الاحصائيات </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="far fa-comment-alt-lines"></i>
              <span>الرسائل</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <b>{{ $notificationsCount }}</b>
              <i class="fal fa-bell"></i>
              <span>الاشعارات</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <img src="{{ asset('public/users/' . $user->picture) }}" alt="">
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" {{ URL('logout')}}>
              <i class="far fa-sign-out"></i>
              <span>تسجيل الخروج</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
 
 
  <div class="menuRight">
    <br>
    @if (Auth::id())
      <a href="edit.hospital">
        <img src="{{asset('/public/hospital/' . $hospital->logo )}}" alt="">
        <h4> {{ $hospital->name }} </h4>
      </a>
    @endif



    <ul>
      <li> <i class="fab fa-twitter"></i>   <a href="/">الرئيسية</a> </li>
      <li> <i class="far fa-clinic-medical"></i>  <a href="/hospital">المستشفيات</a> </li>
      <li> <i class="fal fa-user-edit"></i> <a href="/edit.acount"> تعديل الحساب </a> </li>
      <li> <i class="far fa-building"></i>  <a href="/companies">الشركـــــــات</a> </li>
      <li> <i class="far fa-user-tie"></i>  <a href="acounts/credit_officer">مسؤل الائتمان</a> </li>
      <li> <i class="far fa-user-tie"></i>  <a href="supplier">الموردين</a> </li>
      <li> <i class="fal fa-handshake"></i> <a href="recepion">الاستقبال</a> </li>
      <li> <i class="fal fa-handshake"></i> <a href="booking">الحجوزات</a> </li>
      <li> <i class="far fa-user-md"></i>   <a href="acounts/doctor">الدكاترة</a> </li>
      <li class="btn-list-sctegory"> <i class="far fa-user-md"></i>  الاقســـأم </li>
      <ul class="list-sctegory toggle-menu" style="display: none">
        <li> <i class="far fa-user-md"></i>   <a href="/categories">الاقســـأم</a> </li>
        <li> <i class="far fa-user-md"></i>   <a href="/emergency.department">الطـــــــوارئ</a> </li>
        <li> <i class="far fa-user-md"></i>   <a href="/intensive.care.department">العناية المركزة</a> </li>
        <li> <i class="far fa-user-md"></i>   <a href="/ray.department">الاشعة</a> </li>
        <li> <i class="far fa-user-md"></i>   <a href="/physical.therapy.department">علاج طبيعي</a> </li>
        <li> <i class="far fa-user-md"></i>   <a href="/quartering.department"> الاياء </a> </li>
        <li> <i class="far fa-user-md"></i>   <a href="/surgery.department"> العملــــيات </a> </li>
        
      </ul>

      <li> <i class="fal fa-file-chart-line"></i>  <a href="/reports">التقارير</a> </li>
      <li> <i class="fal fa-pills"></i><a href="/pharmacy">الصيدلية</a> 
      <li> <i class="fal fa-file-chart-line"></i>  <a href="/booking">الحجوزات</a> </li>
      
      <li class="btn-list-pharmacy"> <i class="far fa-user-md"></i>  الصيدلية </li>
      <ul class="list-pharmacy toggle-menu" style="display: none">
        <li><a href="/pharmacy">الصيدلية</a></li>
        <li><a href="/buying.medicines.pharmacy">شراء الادوية</a></li>
        <li><a href="/pharmacy"> المخزن</a></li>
      </ul>

      <li class="btn-list-porduts"> <i class="far fa-user-md"></i>  المخـــزون </li>
      <ul class="list-porduts toggle-menu" style="display: none">
        <li><a href="/porduts">المخزن</a></li>
        <li><a href="/porduts">المنتجات</a></li>
        <li><a href="/pharmacy"> تقارير المخزن</a></li>
      </ul>
      
      <li class="btn-list-hr"> <i class="far fa-user-md"></i>  الموارد البشرية </li>
      <ul class="list-hr toggle-menu" style="display: none">
        <li><a href="/porduts">دكاترا</a></li>
        <li><a href="/porduts">ممرضات</a></li>
        <li><a href="/pharmacy">عمال </a></li>
        <li><a href="/vacation">الاجازات </a></li>
        <li><a href="/my-vacation">اجازاتي </a></li>
        <li><a href="/payroll">الرواتب </a></li>
      </ul>

      </li>
      <li> <i class="fal fa-pills"></i>       <a href="/banks">الخزينة</a> </li>
      <li> <i class="far fa-tools"></i>     <a href="settings">الاعدادات</a> </li>
      <li> <i class="far fa-sign-out"></i>  <a href="{{ URL('logout')}}">تسجيل الخروج</a> </li>
    </ul>
  </div>
  @endif


  
@yield('content')
{{--
    Microservice Architecture 

<div class="footer">
  <div class="container">
            <div class="mediaa">
                  @if ($contact->facebook != "")
                    <a target="_blank" style="color: #1877f2" href="{{ $contact->facebook }}"><i class="fab fa-facebook-f"></i></a>
                  @endif
                  @if ($contact->google != "")
                    <a target="_blank" style="color: #dd4b39" href="{{ $contact->google }}"><i class="fab fa-google-plus-g"></i></a>
                  @endif
                  @if ($contact->linkedin != "")
                    <a target="_blank" style="color: #0077b5" href="{{ $contact->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                  @endif
                  @if ($contact->twitter != "")
                    <a target="_blank" style="color: #1da1f2" href="{{ $contact->twitter }}"><i class="fab fa-twitter"></i></a>
                  @endif
                  @if ($contact->instagram != "")
                    <a target="_blank" style="color: #833ab4" href="{{ $contact->instagram }}"><i class="fab fa-instagram"></i></a>
                  @endif
                  @if ($contact->snap != "")
                    <a target="_blank" style="color: #ffa900" href="{{ $contact->snap }}"><i class="fab fa-snapchat"></i></a>                                 
                  @endif
                  @if ($contact->whatsapp != "")
                    <a target="_blank" style="color: #075e54" href="{{ $contact->whatsapp }}"><i class="fab fa-whatsapp"></i></a>                   
                  @endif
              </div>
    <div class="copyright"> {{ __('public.footer') }} </div>
  </div>
</div>
--}}



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="/asset/js/mdb.min.js"></script>
<script src="/asset/js/script.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
</body>
</html>