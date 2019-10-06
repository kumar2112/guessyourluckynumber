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
class SecurityController extends BaseController{


    /**
    *@name signUp
    *@param null
    *@desc login page
    **/
    public function signUp(){
         return view("security.signup");
    }
    /**
    *@name login
    *@param null
    *@desc login page
    **/
    public function login(){
         return view("security.login");
    }


    /**
    *@name login_porcess
    *@param Request $request
    *@desc process login data
    **/
    public function signUpProcess(Request $request){
       $mobileNumber=trim($request->get('ln_mobileNumber'));
       Validator::extend('validateMobile',function($attribute, $value, $parameters, $validator){
          $allowedMobileNumber=array('91-7044716951');
           if(!in_array($value,$allowedMobileNumber)){
              return false;
           }else{
             return true;
           }
       },"Access denied");
       $validator = Validator::make($request->all(), [
            'ln_mobileNumber' => 'required|min:10|max:13|validateMobile',
        ]);
        if($validator->fails()) {
            return redirect()->route('security.login')
                             ->withErrors($validator)
                             ->withInput();
        }else{
            session('signUpStage',1);
            session('mobileNumber',$mobileNumber);
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
            session('signUpStage',2);
            session('mobileOtpVerified',true);
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

}
