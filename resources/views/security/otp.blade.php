@extends('layouts.login_layout')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-20">
                <form class="login100-form validate-form" method="post" action="{{route('security.otp_process')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- <span class="login100-form-title p-b-70">Welcome</span> -->
                    <span class="login100-form-avatar">
                        <img src="{{url('assets/images/avatar-01.jpg')}}" alt="AVATAR">
                    </span>
                    <div class="wrap-input100 validate-input m-t-85 m-b-35 @error('ln_otp') alert-validate @enderror" data-validate = "@error('ln_otp') {{$errors->first('ln_otp')}} @enderror">
                        <input value="{{old('ln_otp')}}" class="input100 @if(old('ln_otp')!='') has-val @endif" type="text" name="ln_otp" id="ln_otp" placeholder="" maxlength="6">
                        <span class="focus-input100" data-placeholder="OTP"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Verify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
@endsection
