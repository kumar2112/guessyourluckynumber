@extends('layouts.login_layout')
@section('content')
    <div class="limiter">
        <div class="container-login100">
              <div class="wrap-login100 p-b-20">
                <form class="login100-form validate-form" method="post" action="{{route('security.login_process')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- <span class="login100-form-title p-b-70">Welcome</span> -->
                    <span class="login100-form-avatar">
                        <img src="{{url('asset/images/avatar-01.jpg')}}" alt="AVATAR">
                    </span>
                    @if(session('messgae'))
                    <span class="text-center">{{session('messgae')}}</span>
                    @endif
                    <div class="wrap-input100 validate-input m-t-85 m-b-35 @error('ln_mobileNumber') alert-validate @enderror" data-validate = "@error('ln_mobileNumber') {{$errors->first('ln_mobileNumber')}} @enderror">
                        <input value="{{old('ln_mobileNumber')}}" class="input100 @if(old('ln_mobileNumber')!='') has-val @endif" type="text" name="ln_mobileNumber" id="ln_mobileNumber" placeholder="" maxlength="13">

                        <span class="focus-input100" data-placeholder="Mobile Number"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-35 @error('ln_playerPassword') alert-validate @enderror" data-validate = "@error('ln_playerPassword') {{$errors->first('ln_playerPassword')}} @enderror">
                        <input value="{{old('ln_playerPassword')}}" class="input100 @if(old('ln_playerPassword')!='') has-val @endif" type="password" name="ln_playerPassword" id="ln_playerPassword" placeholder="" maxlength="13">
                        <span class="focus-input100" data-placeholder="Password"></span>
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
                        <button class="login100-form-btn">Login</button>
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
