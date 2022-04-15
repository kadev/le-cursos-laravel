<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

class PaypalController extends Controller
{
    public function __construct()
    {
        //return new PayPalHttpClient(self::environment());
        /** PayPal api context **/

        /*$this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);*/
    }

    public static function init(){
        return new PayPalHttpClient(self::environment());
    }

    public static function environment()
    {

        $clientId = env("PAYPAL_CLIENT_ID");
        $clientSecret = env("PAYPAL_SECRET");

        //return new SandboxEnvironment($clientId, $clientSecret);
        return new ProductionEnvironment($clientId, $clientSecret);
    }

    public static function getOrder($orderId)
    {
        $client = self::init();//new PayPalHttpClient(self::environment());
        return $client->execute(new OrdersGetRequest($orderId));
    }

    public static function captureOrder($orderId)
    {
        $client = self::init();
        $response = $client->execute(new OrdersCaptureRequest($orderId));
    }
}
