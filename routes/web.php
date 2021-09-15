<?php

use Illuminate\Support\Facades\Route;
use Nidavellir\Webhooks\Controllers\WebhookController;

Route::post('webhook', [WebhookController::class, 'received']);

Route::get('test', [WebhookController::class, 'test']);
