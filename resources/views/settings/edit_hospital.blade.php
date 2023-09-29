@extends('master')
@section('content')

<form method="POST" action="{{ route('update.hospital') }}" class="container" enctype="multipart/form-data" >
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h4 class="text-center"> تحديث الملف للمستشفي </h4>
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
          <label class="form-label" for="form12"> رفع الشعار    </label>
          <i class="fal fa-upload"></i>
          <input type="file" style="display: none" name="picture" id="form12" class="form-control" />
      </div>
      <br>
      <div class="">
          <label class="form-label" for="form12"> الاســــــم  </label>
          <input type="text" required name="edit_name" class="form-control" value="{{ $hospital->name }}" />
          <input type="hidden" required name="id" value="{{ $hospital->id }}" class="form-control" />
      </div>
      <br>
      <div class="">
          <label class="form-label" for="form12"> البريد الالكتروني  </label>
          <input type="email" required name="edit_email" id="form12" class="form-control" value="{{ $hospital->email }}" />
      </div>
      <br>
      <div class="">
          <label class="form-label" for="form12"> رقم الهاتف  </label>
          <input type="text" required name="edit_phone" id="form12" class="form-control" value="{{ $hospital->phone }}" />
      </div>
      <br>
      <div class="">
          <label class="form-label" for="form12"> المدينة  </label>
          <input type="text" required name="edit_city" id="form12" class="form-control" value="{{ $hospital->city }}" />
      </div>
      <br>
      <div class="">
        <label class="form-label" for="form12"> الحي  </label>
        <input type="text" required name="edit_neighborhood" id="form12" class="form-control" value="{{ $hospital->neighborhood }}" />
      </div>
      <br>
      <div class="">
        <label class="form-label" for="form12"> العنوان  </label>
        <input type="text" required name="edit_address" id="form12" class="form-control" value="{{ $hospital->address }}" />
      </div>
      <br>
      <div class="">
        <label class="form-label" for="form12"> ميعاد انتهاء الاشتراك  </label>
        <input type="text"  readonly id="form12" class="form-control" value="{{ $hospital->end }}" />
      </div>
      <br>
      <div class="">
        <label class="form-label" for="form12"> ميعاد اشعار انتهاء الاشتراك  </label>
        <input type="text"  readonly id="form12" class="form-control" value="{{ $hospital->notifications }}" />
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