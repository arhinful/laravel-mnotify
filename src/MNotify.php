<?php


namespace Arhinful\LaravelMnotify;


use Arhinful\LaravelMnotify\Traits\Actions;
use Arhinful\LaravelMnotify\Traits\Campaign;
use Arhinful\LaravelMnotify\Traits\Contact;
use Arhinful\LaravelMnotify\Traits\Group;
use Arhinful\LaravelMnotify\Traits\MessageTemplate;
use Arhinful\LaravelMnotify\Traits\MNotifyRequest;
use Arhinful\LaravelMnotify\Traits\Setters;
use Arhinful\LaravelMnotify\Traits\SenderId;
use Arhinful\LaravelMnotify\Traits\Balance;
use Arhinful\LaravelMnotify\Traits\Reports;
use Arhinful\LaravelMnotify\Traits\IVR;
use Arhinful\LaravelMnotify\Traits\USSD;

class MNotify
{
    use MNotifyRequest, Actions, Setters, MessageTemplate, Group, Contact, Campaign, SenderId, Balance, Reports, IVR, USSD;

    private $templateURL = 'https://api.mnotify.com/api/template';
    private $groupURL = 'https://api.mnotify.com/api/group';
    private $contactURL = 'https://api.mnotify.com/api/contact';
    private $quickSMSURL = 'https://api.mnotify.com/api/sms/quick';
    private $groupSMSURL = 'https://api.mnotify.com/api/sms/group';
    private $scheduledSMSURL = 'https://api.mnotify.com/api/scheduled';
    private $quickVoiceCallURL = 'https://api.mnotify.com/api/voice/quick';
    private $groupVoiceCallURL = 'https://api.mnotify.com/api/voice/group';
    
    private $senderIdRegisterURL = 'https://api.mnotify.com/api/senderid/register';
    private $senderIdStatusURL = 'https://api.mnotify.com/api/senderid/status';
    
    private $smsBalanceURL = 'https://api.mnotify.com/api/balance/sms';
    private $voiceBalanceURL = 'https://api.mnotify.com/api/balance/voice';
    
    private $smsDeliveryReportURL = 'https://api.mnotify.com/api/campaign';
    private $specificSMSDeliveryReportURL = 'https://api.mnotify.com/api/status';
    private $periodicSMSDeliveryReportURL = 'https://api.mnotify.com/api/report';
    
    private $voiceCallReportURL = 'https://api.mnotify.com/api/calls';
    private $specificVoiceCallReportURL = 'https://api.mnotify.com/api/call-status';
    private $periodicVoiceCallReportURL = 'https://api.mnotify.com/api/call-period';
    
    private $initiateIVRCallURL = 'https://api.mnotify.com/api/initiate-ivr-call';
    private $ivrScenariosURL = 'https://api.mnotify.com/api/voice/ivr/scenario'; // used for get all, get one, update, delete
    private $ivrScenarioAddURL = 'https://api.mnotify.com/api/voice/ivr/scenario';
    private $ivrScenarioLaunchURL = 'https://api.mnotify.com/api/voice/ivr/scenario/launch';

    private string $apiKey;
    private string $sender;
    private string $message;
    private string $isSchedule;
    private string $scheduleDate;

    private $message_template;
    private $groups;

    public function __construct()
    {
        $this->apiKey = env('MNOTIFY_KEY', '');
        $this->sender = env('MNOTIFY_SENDER_ID', '');
        $this->isSchedule = false;
    }

}
