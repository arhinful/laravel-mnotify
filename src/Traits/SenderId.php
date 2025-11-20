<?php

namespace Arhinful\LaravelMnotify\Traits;

trait SenderId
{
    public function registerSenderId(string $sender_id, string $purpose)
    {
        $url = $this->attachKeyToURL($this->senderIdRegisterURL);
        $data = [
            'sender_id' => $sender_id,
            'purpose' => $purpose
        ];
        return $this->postRequest($url, $data);
    }

    public function checkSenderIdStatus(string $sender_id)
    {
        $url = $this->attachKeyToURL($this->senderIdStatusURL);
        $data = [
            'sender_id' => $sender_id
        ];
        return $this->postRequest($url, $data);
    }
}
