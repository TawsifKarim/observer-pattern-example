<?php

namespace App\Interfaces;

interface ObserverInterface{
    public function handle($event);
}