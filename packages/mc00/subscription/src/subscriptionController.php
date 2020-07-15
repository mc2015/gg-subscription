<?php

namespace mc00\subscription;

use Illuminate\Http\Request;
use Twig;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Subscription;

class subscriptionController extends Controller
{
    public function listsubs()
    {
        $user = $this->getUser();
        
        $subscriptionsAll = Subscription::all();
        $subscriptionsUser = $user->subscriptions()->pluck('id')->toArray();

        $data = ['name' => $user->name,
                 'subscriptionsAll' => $subscriptionsAll,
                 'subscriptionsUser' => $subscriptionsUser];
        
        echo Twig::render(__DIR__.'/Views/subscribe.twig', $data);
    }

    public function subscribe(Request $request)
    {
        if ($request and $request->method() == 'POST') {
        
            $user = $this->getUser();

            $rqObj = (object) $request->all();
            
            $subscriptions = $rqObj->subscribed;
            
            if ($subscriptions) {
                $user->subscriptions()->sync($subscriptions);
            }
        
        }
        
        return redirect('listsubs');
    }
    
    protected function getUser()
    {
        $user = Auth::user();
        
        if (!$user) {

            $user = User::orderBy('id', 'desc')->first();

        }

        if (!$user) die('No users');
        
        return $user;
    }
}

