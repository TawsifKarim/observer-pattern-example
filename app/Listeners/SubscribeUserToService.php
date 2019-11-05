<?php


namespace App\Listeners;


use App\Interfaces\ObserverInterface;

class SubscribeUserToService implements ObserverInterface
{
    public function handle($event)
    {
        var_dump('subscribing user to service:'. $event->user->email);
    }
}