<?php

namespace Arhinful\LaravelMnotify\Traits;

trait Balance
{
    public function checkSMSBalance()
    {
        $url = $this->attachKeyToURL($this->smsBalanceURL);
        return $this->getRequest($url);
    }

    public function checkVoiceBalance()
    {
        $url = $this->attachKeyToURL($this->voiceBalanceURL);
        return $this->getRequest($url);
    }
}
