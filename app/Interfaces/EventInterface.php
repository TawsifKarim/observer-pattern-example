<?php

namespace App\Interfaces;

interface EventInterface{
    public function attachListener(ObserverInterface $observer);

    public function detachListener(ObserverInterface $observer);

    public function notifyListeners();
}