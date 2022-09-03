<?php


namespace Arhinful\LaravelMnotify\Traits;


trait Setters
{
    public function setMessage($message) : static {
        $this->message = $message;
        return $this;
    }

    public function setIsSchedule($isSchedule) : static {
        $this->isSchedule = $isSchedule;
        return $this;
    }

    public function setScheduleDate($scheduleDate) : static {
        $this->scheduleDate = $scheduleDate;
        return $this;
    }

    public function setAPIKey(string $api_key) : static {
        $this->apiKey = $api_key;
        return $this;
    }

    public function setSender(string $sender) : static {
        $this->sender = $sender;
        return $this;
    }
}
