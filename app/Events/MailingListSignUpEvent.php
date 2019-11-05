<?php


namespace App\Events;


use App\Classes\User;
use App\Interfaces\EventInterface;
use App\Interfaces\ObserverInterface;


class MailingListSignUpEvent implements EventInterface
{
    /**
     * @var User
     */
    public $user;

    protected $observers = []; //Listeners

    /**
     * MailingListSignUp constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * pushing observer/listener class to the evebt
     * @param Observer $observer
     */
    public function attachListener(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * if we need to detach
     * @param Observer $observer
     */
    public function detachListener(ObserverInterface $observer)
    {
        $observer_count = count($this->observers);

        for($i=0; $i<$observer_count; $i++){
            if($this->observers[$i] == $observer){
                unset($this->observers[$i]);
                break;
            }
        }

    }

    /**
     * running handle
     */
    public function notifyListeners()
    {
        foreach($this->observers as $observer)
        {
            $observer->handle($this);
        }
    }
}