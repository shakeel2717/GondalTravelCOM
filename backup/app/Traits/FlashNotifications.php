<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait FlashNotifications
{

    private function notifiction($message = '', $type = 'info'): void
    {
        Session::flash('alert-type', $type);
        Session::flash('message', $message);
    }

    private function successNotification($message = 'Success'): void
    {
        Session::flash('alert-type', 'success');
        Session::flash('message', $message);
    }

    private function errorNotification($message = 'Error'): void
    {
        Session::flash('alert-type', 'danger');
        Session::flash('message', $message);
    }

}
