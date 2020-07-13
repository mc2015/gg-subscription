<?php

Route::get('subscription', function(){
	echo 'Hello from the subscriptions package!';
});

Route::get('listsubs', 'mc00\subscription\subscriptionController@listsubs');
Route::post('subscribe', 'mc00\subscription\subscriptionController@subscribe');

