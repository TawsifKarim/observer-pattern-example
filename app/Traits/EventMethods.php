<?php

namespace App\Traits;

use App\Interfaces\Observer;

trait EventMethods{
    protected $observers;

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        for ($i = 0; $i < count($this->observers); $i++) {
            if ($this->observers[$i] == $observer) {
                unset($this->observers[$i]);
            }

            $this->observers = array_values($this->observers);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle($this);
        }
    }
}