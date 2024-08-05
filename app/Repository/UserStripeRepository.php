<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 13/05/2019
 * Time: 6:01 PM
 */

namespace App\Repository;


use App\Classes\PaymentGateway;
use App\Job;
use App\User;

class UserStripeRepository
{

    /**
     * UserStripeRepository constructor.
     */
    public function __construct()
    {
    }

    public static function addUserCard($dataArr = []){
        $result = false;
        $user = User::find($dataArr['user_id']);
//        dd($dataArr,$user);
        if(!empty($user->stripe_unique_id)){
            $stripCustomerCard = PaymentGateway::addCustomerNewCard($user,$dataArr['token']);
            if($stripCustomerCard){
                $result = $stripCustomerCard;
            }
        }else{
            $stripNewCustomerWithCard = PaymentGateway::creatCustomerProfile($user,$dataArr['token']);
            if(!empty($stripNewCustomerWithCard)){
                $user->update(['stripe_unique_id' => $stripNewCustomerWithCard->id]);
                $result = $stripNewCustomerWithCard;
            }
        }
        return $result;
    }

    public static function getUserStripeProfile($dataArr = []){
        $result = "";
        $user = User::find($dataArr['user_id']);
        if(!empty($user->stripe_unique_id)){
            $result = PaymentGateway::getCustomerProfile($user);
        }else{
            $obj = new \stdClass();
            $obj->status = 200;
            $obj->error = "Stripe Customer Not Generated!";

            $result = $obj;
        }
        return $result;
    }

    public static function chargeCustomer($request,$dataArr = []){
        $result = false;
        $user = User::find($dataArr['user_id']);
        $job = Job::find($dataArr['job_id']);
        if(!empty($user->stripe_unique_id)){
            $result = PaymentGateway::chargCustomer($user,$job,$request);
        }
        return $result;
    }

    public static function userStripeDefaultCard($dataArr = []){
        $result = "";
        $user = User::find($dataArr['user_id']);
        if(!empty($user->stripe_unique_id)){
            $result = PaymentGateway::customerDefaultCard($user,$dataArr['card_id']);
        }
        return $result;
    }

    public static function removeStripeCard($dataArr = []){
        $result = "";
        $user = User::find($dataArr['user_id']);
        if(!empty($user->stripe_unique_id)){
            $result = PaymentGateway::removeCard($user,$dataArr['card_id']);
        }
        return $result;
    }
}