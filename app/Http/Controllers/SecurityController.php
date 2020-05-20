<?php
/*
|--------------------------------------------------------------------------
| file Description
|--------------------------------------------------------------------------
|
| @name          SecurityController
| @created at    2019-09-28
| @created by    <Praveen Kumar Jha>
|
*/
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use App\Player;

class SecurityController extends BaseController{



    /**
    *@name login
    *@param null
    *@desc login page
    **/
    public function login(){
         return view("security.login");
    }

    /**
    *@name signUpProcess
    *@param Request $request
    *@desc process login data
    **/
    public function loginProcess(Request $request){
       $mobileNumber=trim($request->get('ln_mobileNumber'));
       Validator::extend('validateMobile',function($attribute, $value, $parameters, $validator){
          $player=Player::where('player_mobile', $value)->get()->first();
          if(!empty($player)){
             return true;
          }else{
             return false;
          }
       },"you are trying to unauthrozied access.");
       Validator::extend('validatePassword',function($attribute, $value, $parameters, $validator){
          $mobileNumber=trim($validator->getData()['ln_mobileNumber']);
          $player=Player::where('player_mobile', $mobileNumber)->get()->first();
          if(!empty($player) && $player->player_password!=md5($value)){
             return false;
          }else{
             return true;
          }
       },"Please type correct password.");

       $validator = Validator::make($request->all(), [
            'ln_mobileNumber' => 'required|min:10|max:13|validateMobile',
            'ln_playerPassword'=>'required|validatePassword',
        ]);
        if($validator->fails()) {
            return redirect()->route('security.login')
                             ->withErrors($validator)
                             ->withInput();
        }else{
            session([ 'signUpStage'=>1,
                      'mobileNumber'=>$mobileNumber,
                    ]
            );
            return redirect()->route('game.start');
        }
    }

    /**
    *@name signUp
    *@param null
    *@desc login page
    **/
    public function signUp(){
         return view("security.signup");
    }

    /**
    *@name signUpProcess
    *@param Request $request
    *@desc process login data
    **/
    public function signUpProcess(Request $request){
       $mobileNumber=trim($request->get('ln_mobileNumber'));
       Validator::extend('validateMobile',function($attribute, $value, $parameters, $validator){
          $player=Player::where('player_mobile', $value)->get()->first();
          if(!empty($player)){
             return false;
          }else{
             return true;
          }
       },"Access denied");

       $validator = Validator::make($request->all(), [
            'ln_mobileNumber' => 'required|min:10|max:13|validateMobile',
        ]);
        if($validator->fails()) {
            return redirect()->route('security.signup')
                             ->withErrors($validator)
                             ->withInput();
        }else{
            session([ 'signUpStage'=>1,
                      'mobileNumber'=>$mobileNumber,
                    ]
            );
            return redirect()->route('security.otp');
        }
    }

    /**
    *@name otp
    *@param null
    *@desc otp page
    **/
    public function otp(){
         return view("security.otp");
    }

    /**
    *@name login_porcess
    *@param Request $request
    *@desc process login data
    **/
    public function otp_process(Request $request){
       $otp=trim($request->get('ln_otp'));
       Validator::extend('validateOtp',function($attribute, $value, $parameters, $validator){
          $allowedOtp=array('123456');
           if(!in_array($value,$allowedOtp)){
              return false;
           }else{
             return true;
           }
       },"Invalid Otp");
       $validator = Validator::make($request->all(), [
            'ln_otp' => 'required|min:6|max:6|validateOtp',
        ]);
        if($validator->fails()) {
            return redirect()->route('security.otp')
                             ->withErrors($validator)
                             ->withInput();
        }else{
            session(['signUpStage'=>2,
                     'mobileOtpVerified'=>true,
                   ]
             );
            return redirect()->route('security.setreset_password',array('set-password'));
        }
    }

    /**
    *@name setResetPassword
    *@param $action {set-password|reset-password}
    *@desc otp page
    **/
    public function setResetPassword($action){
      if($action=='set-password'){
         $data=array('mobileNumber'=>session('mobileNumber'),'signUpStage'=>session('signUpStage'),'mobileOtpVerified'=>session('mobileOtpVerified'));
         return view("security.setpassword",compact('data'));
      }else{
          //return view("security.setpassword");
      }
    }

    /**
    *@name complete_signUp_porcess
    *@param Request $request
    *@desc process login data
    **/
    public function completeSignUpProcess(Request $request){
       if(session('mobileNumber')!=trim($request->txtHiddenMobileNumber) ||
          session('signUpStage')!=trim($request->txtHiddenSignUpStage) ||
          session('mobileOtpVerified')!=trim($request->txtHiddenMobileOtpVerified)
       ){
          return redirect()->route('security.signup');
       }
       Validator::extend('validateOtp',function($attribute, $value, $parameters, $validator){
          $allowedOtp=array('123456');
           if(!in_array($value,$allowedOtp)){
              return false;
           }else{
             return true;
           }
       },"Invalid Otp");
        $validator = Validator::make($request->all(), [
            'ln_password' => 'required',
            'ln_confirmPassword' => 'required|required_with:ln_password|same:ln_password',
        ]);
        if($validator->fails()) {
            return redirect()->route('security.setreset_password',array('set-password'))
                                  ->withErrors($validator)
                                  ->withInput();
        }else{
             $player=new Player;
             $player->player_mobile=trim($request->txtHiddenMobileNumber);
             $player->player_unique_code=md5(time().md5($request->txtHiddenMobileNumber));
             $player->player_password=md5(trim($request->ln_password));
             $player->player_status='active';
             $player->save();
             return redirect()->route('security.login')->with('messgae', 'Your account is created successfully');
       }
    }
}
