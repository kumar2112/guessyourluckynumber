@extends('layouts.login_layout')
@section('content')
<div class='row'>
    <div class="col-md-12">
        <span class="login100-form-avatar">
            <img src="{{url('assets/images/animated-dice.gif')}}" alt="AVATAR">
        </span>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="login100-form validate-form" action="{{route('game.shuffle')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-md-3">
                    <div class="wrap-input100 validate-input m-t-85 m-b-35 @error('ln_minNumber') alert-validate @enderror" data-validate = "@error('ln_minNumber') {{$errors->first('ln_minNumber')}} @enderror">
                        <input value="{{old('ln_minNumber')}}" class="input100 @if(old('ln_minNumber')!='') has-val @endif" type="number" name="ln_minNumber" placeholder="">
                        <span class="focus-input100" data-placeholder="Min Number"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="wrap-input100 validate-input m-t-85 @error('ln_maxNumber') alert-validate @enderror" data-validate = "@error('ln_maxNumber') {{$errors->first('ln_maxNumber')}} @enderror">
                        <input value="{{old('ln_maxNumber')}}" class="input100 @if(old('ln_maxNumber')!='') has-val @endif" type="number" name="ln_maxNumber" placeholder="">
                        <span class="focus-input100" data-placeholder="Max Number"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="wrap-input100 validate-input m-t-85 m-b-35 @error('ln_guessNumber') alert-validate @enderror" data-validate = "@error('ln_guessNumber') {{$errors->first('ln_guessNumber')}} @enderror">
                        <input value="{{old('ln_guessNumber')}}" class="input100 @if(old('ln_guessNumber')!='') has-val @endif" type="number" name="ln_guessNumber" placeholder="">
                        <span class="focus-input100" data-placeholder="Your guess"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="validate-input m-t-85 m-b-35" data-validate = "Enter mobile">
                        <button class="login100-form-btn">Shuffule</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
