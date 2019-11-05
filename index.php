<?php

use App\Classes\User;
use \App\Events\MailingListSignUpEvent;
use App\Listeners\SubscribeUserToService;
use App\Listeners\UpdateMailingStatusInDatabase;

require __DIR__ . '/vendor/autoload.php';

$user = new User;

$event = new MailingListSignUpEvent($user);
$event->attachListener(new SubscribeUserToService());
$event->attachListener(new UpdateMailingStatusInDatabase());
$event->notifyListeners();


