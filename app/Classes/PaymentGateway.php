<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 13/05/2019
 * Time: 3:05 PM
 */

namespace App\Classes;


use App\Job;
use App\User;

class PaymentGateway
{
    protected $api_key;
    protected $secret_key;

    public function __construct()
    {
        $this->api_key = config("app.app_strip_api_key");
        $this->secret_key = config("app.app_strip_secret_key");
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getSecretKey()
    {
        return $this->secret_key;
    }

    /**
     * @param User $user
     * @param $source
     */
    public static function creatCustomerProfile(User $user, $source)
    {
        $stripGateway = new PaymentGateway();
        \Stripe\Stripe::setApiKey($stripGateway->getSecretKey());

        $data = \Stripe\Customer::create([
            "description" => "Customer for " . $user->email,
            "source" => $source // obtained with Stripe.js
        ]);
        return $data;
    }

    public static function getCustomerProfile(User $user)
    {
        $stripGateway = new PaymentGateway();
        \Stripe\Stripe::setApiKey($stripGateway->getSecretKey());
        $details = \Stripe\Customer::retrieve($user->stripe_unique_id);
        return $details;
    }

    public static function chargCustomer(User $user, Job $job, $request)
    {
        $stripGateway = new PaymentGateway();
        \Stripe\Stripe::setApiKey($stripGateway->getSecretKey());
        if (!empty($job)) {
            \Stripe\Charge::create([
                "amount" => $request->service_price,
                "currency" => "usd",
                "source" => $user->stripe_unique_id, // obtained with Stripe.js
                "description" => "Charge for order id " . $job->id
            ]);
            return true;
        }
    }

    public static function addCustomerNewCard(User $user, $source)
    {
        $stripGateway = new PaymentGateway();
        \Stripe\Stripe::setApiKey($stripGateway->getSecretKey());
        $card = \Stripe\Customer::createSource(
            $user->stripe_unique_id,
            [
                'source' => $source,
            ]
        );
        return $card;
    }

    public static function customerDefaultCard(User $user, $source)
    {
        $result = "";
        $stripGateway = new PaymentGateway();
        \Stripe\Stripe::setApiKey($stripGateway->getSecretKey());
        $result = \Stripe\Customer::update(
            $user->stripe_unique_id,
            [
                'default_source' => $source,
            ]
        );
        return $result;
    }

    public static function removeCard(User $user, $source)
    {
        $stripGateway = new PaymentGateway();
        \Stripe\Stripe::setApiKey($stripGateway->getSecretKey());
        $removedCard = \Stripe\Customer::deleteSource(
            $user->stripe_unique_id,
            $source
        );
        return $removedCard;
    }
}