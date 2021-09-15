<?php

namespace Nidavellir\Webhooks\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Called when a new TradingView alert is triggered.
     *
     * @return void
     */
    public function received(Request $request)
    {
        /**
         * 1. Register the call, no matter if it's well registered or not.
         * 2. Make the necessary data validations.
         * 3. Execute order (buy, sell).
         * 4. Obtain all the information regarded to the token/exchange.
         */
        $headers = $request->header();
        info('webhook called');
        return 'okay';
    }

    public function test(Request $request)
    {
        $ch = curl_init('https://www.nidavellir.trade/webhook');

        info('1');

        $message="hopper_id:1005220
coin:NANO
action:buy
market_order:1";

        info('2');

        curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:text/plain', 'charset:utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        info('3');

        $result = curl_exec($ch);

        info('4');

        curl_close($ch);

        info('5');

        info('result: ' . $result);
    }
}
