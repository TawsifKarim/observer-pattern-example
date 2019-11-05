<?php


namespace App\Listeners;


use App\Interfaces\ObserverInterface;

class UpdateMailingStatusInDatabase implements ObserverInterface
{

    /**
     * @param $event
     */
    public function handle($event)
    {
        var_dump('Updating User Mailing Status In DB where id is'. $event->user->id);
    }
}