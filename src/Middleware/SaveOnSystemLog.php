<?php

namespace Nidavellir\Webhooks\Middleware;

use Closure;
use Illuminate\Http\Request;
use Nidavellir\Cube\Models\SystemLog;

class SaveOnSystemLog
{
    public function handle(Request $request, Closure $next)
    {
        SystemLog::setAggregateTag();

        SystemLog::create([
            'dataset_primary'
        ]);

        return $next($request);
    }
}
