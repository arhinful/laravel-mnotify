<?php


namespace Arhinful\LaravelMnotify;


use Arhinful\LaravelMnotify\Traits\Actions;
use Arhinful\LaravelMnotify\Traits\Campaign;
use Arhinful\LaravelMnotify\Traits\Contact;
use Arhinful\LaravelMnotify\Traits\Group;
use Arhinful\LaravelMnotify\Traits\MessageTemplate;
use Arhinful\LaravelMnotify\Traits\MNotifyRequest;
use Arhinful\LaravelMnotify\Traits\Setters;


class MNotify
{
    use MNotifyRequest, Actions, Setters, MessageTemplate, Group, Contact, Campaign;

    private $templateURL = 'https://api.mnotify.com/api/template';
    private $groupURL = 'https://api.mnotify.com/api/group';
    private $contactURL = 'https://api.mnotify.com/api/contact';
    private $quickSMSURL = 'https://api.mnotify.com/api/sms/quick';
    private $groupSMSURL = 'https://api.mnotify.com/api/sms/group';
    private $quickVoiceCallURL = 'https://api.mnotify.com/api/voice/quick';
    private $groupVoiceCallURL = 'https://api.mnotify.com/api/voice/group';

    private string $apiKey;
    private string $sender;
    private string $message;
    private string $isSchedule;
    private string $scheduleDate;

    private $message_template;
    private $groups;

    public function __construct()
    {
        $this->apiKey = env('MNOTIFY_KEY');
        $this->sender = env('MNOTIFY_SENDER_ID');
        $this->isSchedule = false;
    }

}
