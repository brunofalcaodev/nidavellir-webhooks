<?php

namespace Nidavellir\Webhooks\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nidavellir\Cube\Models\Alert;

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
         *
         * All should run under a job batch.
         */

        Alert::create([
            'headers' => $request->header(),
            'body' => $request->post()
        ]);
    }

    public function test(Request $request)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://www.nidavellir.trade/webhook");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "hopper_id:1005220
coin:NANO
action:buy
market_order:1");

        $result=curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
