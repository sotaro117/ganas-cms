<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function __invoke(Request $request)
    {
        $checkout_first = $request->user()
        ->newSubscription('1000', config('stripe.1000_price_id'))
        ->checkout([
            'success_url' => route('home'),
            'cancel_url' => route('subscription')
        ]);

        $checkout_second = $request->user()
        ->newSubscription('2000', config('stripe.2000_price_id'))
        ->checkout([
            'success_url' => route('home'),
            'cancel_url' => route('subscription')
        ]);
        
        return Inertia::render('Subscription', [
            'stripeKey' => config('cashier.key'),
            'sessionId_first' => $checkout_first->id,
            'sessionId_second' => $checkout_second->id,
        ]);
    }
}
