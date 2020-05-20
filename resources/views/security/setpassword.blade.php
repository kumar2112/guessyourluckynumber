@extends('layouts.login_layout')
@section('content')

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-20">
                <form class="login100-form validate-form" method="post" action="{{route('security.complete_signup_process')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="txtHiddenMobileNumber" value="{{$data['mobileNumber']}}">
                    <input type="hidden" name="txtHiddenSignUpStage" value="{{$data['signUpStage']}}">
                    <input type="hidden" name="txtHiddenMobileOtpVerified" value="{{$data['mobileOtpVerified']}}">
                    <!-- <span class="login100-form-title p-b-70">Welcome</span> -->
                    <span class="login100-form-avatar">
                        <img src="{{url('assets/images/avatar-01.jpg')}}" alt="AVATAR">
                    </span>
                    <div class="wrap-input100 validate-input m-t-85 m-b-35 @error('ln_password') alert-validate @enderror" data-validate = "@error('ln_password') {{$errors->first('ln_password')}} @enderror">
                        <input value="{{old('ln_password')}}" class="input100 @if(old('ln_password')!='') has-val @endif" type="password" name="ln_password" id="ln_password" placeholder="" maxlength="13">

                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-35 @error('ln_confirmPassword') alert-validate @enderror" data-validate = "@error('ln_confirmPassword') {{$errors->first('ln_confirmPassword')}} @enderror">
                        <input value="{{old('ln_confirmPassword')}}" class="input100 @if(old('ln_confirmPassword')!='') has-val @endif" type="password" name="ln_confirmPassword" id="ln_confirmPassword" placeholder="" maxlength="13">
                        <span class="focus-input100" data-placeholder="Confirm Password "></span>
                    </div>

                    <!-- <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                      <input class="input100" type="password" name="pass">
                      <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                      <button class="login100-form-btn">
                        Login
                      </button>
                    </div>
                    <div class="or">
                         <center> OR </center>
                    </div> -->
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Set Password</button>
                    </div>
                    <ul class="login-more p-t-190">
          						<li class="m-b-8">
          							<span class="txt1">
          								Forgot
          							</span>

          							<a href="#" class="txt2">
          								Username / Password?
          							</a>
          						</li>

          						<li>
          							<span class="txt1">
          								Don’t have an account?
          							</span>

          							<a href="{{route('security.signup')}}" class="txt2">
          								Sign up
          							</a>
          						</li>
          					</ul>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
@endsection
