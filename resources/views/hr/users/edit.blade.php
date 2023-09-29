@extends('master')
@section('content')

<form method="POST" action="{{ route('update.acount') }}" class="container" enctype="multipart/form-data" >
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h4 class="text-center"> تحديث الملف الشخصي </h4>
      {{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}
      <br>
      @if (Session::has("created"))
        <div class="alert alert-success texe-center text-center" role="alert">
          {{ Session::get("created") }}
        </div>
      @endif
      @if (Session::has("updated"))
        <div class="alert alert-success texe-center text-center" role="alert">
          {{ Session::get("updated") }}
        </div>
      @endif
      {{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}
        @csrf

      <div class="uploadPicture">
          <label class="form-label" for="form12"> صورة الملف الشخصي  </label>
          <i class="fal fa-upload"></i>
          <input type="file" style="display: none" name="picture" id="form12" class="form-control" />
      </div>
      <br>
      <div class="">
          <label class="form-label" for="form12"> الاســــــم  </label>
          <input type="text" required name="edit_name" class="form-control" value="{{ $profile->name }}" />
          <input type="hidden" required name="id" id="form12" class="form-control" />
      </div>
      <br>
      <div class="">
          <label class="form-label" for="form12"> البريد الالكتروني  </label>
          <input type="email" required name="edit_email" id="form12" class="form-control" value="{{ $profile->email }}" />
      </div>
      <br>
      <div class="">
          <label class="form-label" for="form12"> رقم الهاتف  </label>
          <input type="text" required name="edit_phone" id="form12" class="form-control" value="{{ $profile->phone }}" />
      </div>
      <br>
      <div class="">
          <label class="form-label" for="form12"> كلمة المرور  </label>
          <input type="text" required name="edit_password" id="form12" class="form-control" value="{{ $profile->text_password }}" />
      </div>
      <br>
      <div class="">
        <button style="width: 100%" class="btn btn-primary" type="submit"> تعديل البيانات </button>
      </div>
      <br>
    </div>
  </div>
</form>

@endsection