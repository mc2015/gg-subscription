<?php

use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $subscription = new App\Subscription();
	    $subscription->name = 'channel1';
	    $subscription->save();
	    $subscription = new App\Subscription();
	    $subscription->name = 'channel2';
	    $subscription->save();
	    $subscription = new App\Subscription();
	    $subscription->name = 'channel3';
	    $subscription->save();
    }
}

