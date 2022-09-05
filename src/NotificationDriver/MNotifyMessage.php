<?php


namespace Arhinful\LaravelMnotify\NotificationDriver;


use Arhinful\LaravelMnotify\MNotify;

class MNotifyMessage
{
    private $message;

    public function message(string $message): static
    {
        $this->message = $message;
        return $this;
    }

    public function content(){
        return $this->message;
    }

}
