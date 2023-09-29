@extends('master')

@section('content')
<br><br><br>

<style>

body, html {
    padding-right: 0px;
    padding-top: 0px;
}
.login-page h4 {
    padding: 29px;
    text-align: center;
    font-size: 22px;
    color: #999;
}

.login-page h4 .active {
    color: #000;
}

.login-page img {
    margin: auto;
    display: table;
    width: 140px;
}

</style>


<div class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <img src="http://localhost:8000/public/E-Care.png" alt="">

                    <h4>
                        <a href="/login" class="active">تسجيل الدخول</a>
                        {{--
                        <span> | </span>
                        <a href="/register"> ا</a>
                        --}}
                    </h4>

                    <p class="text-center">تمتع بتجربة مميزة لادارة مجتمعك الطبي</p>

                    <div class="form-outline  @error('email') is-invalid @enderror">
                        <input type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control form-control-lg" />
                        <label class="form-label" for="formControlLg"> البريد الالكتروني </label>
                    </div>
                    <br>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                    <div class="form-outline  @error('password') is-invalid @enderror">
                        <input type="text" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus class="form-control form-control-lg" />
                        <label class="form-label" for="formControlLg"> كلمة المرور </label>
                    </div>
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                           نسيت كلمة المرور
                        </a>
                    @endif
                    
                    <button style="width: 100%" type="submit" class="btn btn-primary">
                        تسجيل الدخول
                    </button>


                </form>
            </div>
        </div>
    </div>
</div>

<br><br><br>

@endsection
