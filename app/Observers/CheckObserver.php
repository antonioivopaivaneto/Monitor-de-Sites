<?php

namespace App\Observers;

use App\Models\Check;
use App\Notifications\EndpointDown;

class CheckObserver
{
    /**
     * Handle the Check "created" event.
     *
     * @param  \App\Models\Check  $check
     * @return void
     */
    public function created(Check $check)
    {
        if(!$check->isSuccess()){

            $user = $check->endpoint->site->user;
            $user->notify(new EndpointDown($check));
        }
    }

}


