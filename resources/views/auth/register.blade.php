@extends('layouts.app')

@section('title', 'ایجاد حساب کاربری')

@section('content')
    <section class="account-box">
        <div class="register-logo">
{{--            <a href="index.html">--}}
{{--                <h2>فروشگاه آنلاین ماندورا</h2>--}}
{{--            </a>--}}
        </div>
        <div class="register mt-4">
            <div class="headline">ثبت‌نام در ماندورا </div>
            <div class="content">
                <span class="hint">اگر قبلا با ایمیل ثبت‌نام کرده‌اید، نیاز به ثبت‌نام مجدد با شماره همراه ندارید</span>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <label for="mobtel">نام</label>
                    <input id="mobtel" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="نام">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="mobtel">ایمیل</label>
                    <input id="mobtel" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="ایمیل">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="pwd">رمز عبور</label>
                    <input id="pwd" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="رمز عبور">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="pwd">تایید رمز عبور</label>
                    <input id="pwd" type="password" name="password_confirmation" autocomplete="new-password" placeholder="تایید رمز عبور">
                    <div class="acc-agree">
                        <label for="remember">
                            <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <a href="#">حریم خصوص</a>
                            <span>و</span>
                            <a href="#">شرایط و قوانین</a>
                            <span> استفاده از سرویس های سایت ماندورا را مطالعه نموده و با کلیه موارد آن موافقم.</span>
                        </label>
                    </div>
                    <button type="submit">ثبت نام در ماندورا</button>
                </form>
            </div>
            <div class="foot">
                <div>
                    <span>قبلا در ماندورا ثبت‌نام کرده‌اید؟</span>
                    <a href="{{ route('login') }}">وارد شوید</a>
                </div>
            </div>
        </div>
    </section>

    <br><br>
@endsection
