<?php

namespace Nidavellir\Webhooks\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nidavellir\Cube\Models\Alert;
use Nidavellir\Workflows\Jobs\ProcessAlert;

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
        // Trigger ProcessAlert job.
        ProcessAlert::dispatch($request->header(), $request->getContent());

        /*
        $collection = collect(preg_split("/\r\n|\n|\r/", $request->getContent()))->map(function ($item, $key) {
            $values = explode(':', str_replace(' ', '', $item));

            return [$values[0] => $values[1]];
        });

        Alert::create([
            'headers' => $request->header(),
            'body' => $collection->collapse(),
        ]);
        */
    }
}
