@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />

    <div class="container">
      <br><br><br><br>
      <div class="controler dashbord">
        <div class="row">
          <div class="col-md-2"> </div>
          <div class="col-md-8">
            @if (Session::has("created"))
              <div class="alert alert-success" role="alert">
                {{ Session::get("created") }}
              </div>
            @endif

            <form class="dashbord" action="{{ route('update.offer') }}" method="post" enctype="multipart/form-data">


              @csrf

              <h4> Edit Offer </h4> <br><br>

              <select class="form-control" name="category">
                <option value="{{ $single->id }}">category</option>
                @foreach($catogries as $catogry)
                <option value="{{ $catogry->id }}">{{ $catogry->name_en }}</option>
                @endforeach
              </select> <br>

              <div class="row">
                <div class="col-md-4">
                  <label for=""> Price </label>
                  <input type="number" name="price" class="form-control" placeholder="Price" value="{{ $single->price }}" />
                </div>
                <div class="col-md-4">
                  <label for=""> Count Hour </label>
                  <input type="number" name="hour" class="form-control" placeholder="Count Hour" value="{{ $single->hour }}" />
                </div>
                <div class="col-md-4">
                  <label for=""> Count Lectures</label>
                  <input type="number" name="lectures" class="form-control" placeholder="Count Lecture" value="{{ $single->lectures }}"/>
                </div>
              </div>

              <input type="hidden" name="id" class="form-control" value="{{ $single->id }}"/>
              <label for=""> Name Arabic </label>
              <input type="text" name="name_ar" class="form-control" value="{{ $single->name_ar }}"/>
              <label for=""> Offer Arabic </label>
              <textarea  id="text_ar"  name="offer_ar" rows="8" cols="80" value=""> {{ $single->offer_ar }}</textarea> <br>
              <label for=""> Name English </label>
              <input type="text" name="name_en" class="form-control" value="{{ $single->name_en }}"/>
              <label for=""> Offer English </label>
              <textarea id="text_en" name="offer_en" rows="8" cols="80">{{ $single->offer_en }}</textarea> <br>
              <label for=""> Picture </label>
              <input type="file" name="file" class="form-control">


              <button class="btn btn-primary" type="submit"> Save  </button>

            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
    <script>
      new FroalaEditor('#text_ar');
      new FroalaEditor('#text_en');
    </script>
    @endsection
