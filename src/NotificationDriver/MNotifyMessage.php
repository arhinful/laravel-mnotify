<?php


namespace Arhinful\LaravelMnotify\NotificationDriver;


class MNotifyMessage
{
    private string $message;

    public function message(string $message): static
    {
        $this->message = $message;
        return $this;
    }

    public function content() : string{
        return $this->message;
    }

}
