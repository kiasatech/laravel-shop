@extends('layouts.app')

@section('title', 'ورود به حساب کاربری')

@section('content')
    <section class="account-box">
        <div class="register-logo">
            <a href="index.html">
                <h2>فروشگاه آنلاین ماندورا</h2>
            </a>
        </div>
        <div class="register login">
            <div class="headline">ورود به ماندورا</div>
            <div class="content">
                <form method="POST" action="{{ route('login') }}" class="w-100">
                    @csrf
                    <label for="mobtel">ایمیل</label>
                    <input id="mobtel" type="email" placeholder="پست الکترونیک یا شماره موبایل خود را وارد نمایید" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                          <span class="text-danger"> {{ $message }} </span>
                    @enderror

                    <label for="pwd" class="d-block">کلمه عبور</label>
                    <input id="pwd" type="password" placeholder="کلمه عبور خود را وارد نمایید" class="@error('password') is-invalid @enderror input-status" name="password" required autocomplete="current-password">
                    <i class="fa fa-eye pass-status"></i>
                    @error('password')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror

                    <div class="acc-agree">
                        <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember"><span>مرا به خاطر داشته باش</span></label>
                    </div>

                    <button type="submit"> ورود به ماندورا</button>
                    <a href="{{ url('google') }}" class="btn btn-danger btn-block mb-2 p-2">ورود با گوگل</a>
                </form>
            </div>
            <div class="foot login-foot">
                <span>کاربر جدید هستید؟</span>
                <a href="{{ route('register') }}">ثبت نام در ماندورا</a>
            </div>
        </div>
    </section>
@endsection
