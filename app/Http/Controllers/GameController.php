<?php
/*
|--------------------------------------------------------------------------
| file Description
|--------------------------------------------------------------------------
|
| @name          GameController
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
class GameController extends BaseController{
    /**
    *@name start
    *@param null
    *@desc login page
    **/
    public function start(){
         return view("game.start");
    }

    /**
    *@name shuffle
    *@param request
    *@desc process shuffle
    **/
    public function shuffle(Request $request){
        $minNumber=trim($request->get('ln_minNumber'));
        $maxNumber=trim($request->get('ln_maxNumber'));
        $guessNumber=trim($request->get('ln_guessNumber'));
        Validator::extend('validateMaxNumber',function($attribute, $value, $parameters, $validator){
            $minNumber=trim($validator->getData()['ln_minNumber']);
            if($value-$minNumber!=10){
               return false;
            }else{
              return true;
            }
        },"Max number should be greater 10 by min number.");
        Validator::extend('validateGuessNumber',function($attribute, $value, $parameters, $validator){
            $minNumber=trim($validator->getData()['ln_minNumber']);
            $maxNumber=trim($validator->getData()['ln_maxNumber']);
            if($value< $minNumber || $value>$maxNumber){
               return false;
            }else{
              return true;
            }
        },"Guess Number should fall between max and min number.");
        $validator = Validator::make($request->all(), [
             'ln_minNumber' => 'required|numeric',
             'ln_maxNumber' => 'required|numeric|validateMaxNumber',
             'ln_guessNumber' => 'required|numeric|validateGuessNumber',
        ]);
        if($validator->fails()) {
            return redirect()->route('game.start')
                             ->withErrors($validator)
                             ->withInput();
        }else{
            $forwardData=array();
            $shuffledResult=mt_rand($minNumber,$maxNumber);
            $forwardData['shuffledNumber']=$shuffledResult;
            if($guessNumber==$shuffledResult){
                $forwardData['message']="Wow ! your luck is super.</br> You have won 30rs.";
            }else{
               $forwardData['message']="Ooos ! looks like luck is not with you today.";
            }
            return redirect()->route('game.result')->with(array('forwardData'=>$forwardData));
        }
    }
    /**
    *@name result
    *@param null
    *@desc result page
    **/
    public function result(){
        $forwardData=session('forwardData');
        if(empty($forwardData)){
            return redirect()->route('game.start');
        }
        Session::forget('loginStage');
        return view("game.result",array('resultData'=>$forwardData));
    }
}
