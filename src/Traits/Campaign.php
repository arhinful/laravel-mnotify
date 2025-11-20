<?php


namespace Arhinful\LaravelMnotify\Traits;


use Illuminate\Support\Facades\Http;

trait Campaign
{
    public function sendQuickSMS(array|string $recipients, $message=null){
        $url = $this->attachKeyToURL($this->quickSMSURL);
        if (!is_array($recipients)){
            $recipients = [$recipients];
        }
        $data = [
            'recipient' => $recipients,
            'sender' => $this->sender,
            'message' => $message ?? $this->message,
            'is_schedule' => $this->isSchedule,
            'schedule_date' => $this->scheduleDate ?? null,
        ];
        $response = $this->postRequest($url, $data);
        return $response;
    }

    public function sendQuickSMSFromTemplate(array|string $recipients, int $message_template_id){
        $url = $this->attachKeyToURL($this->quickSMSURL);
        if (!is_array($recipients)){
            $recipients = [$recipients];
        }
        $data = [
            'recipient' => $recipients,
            'sender' => $this->sender,
            'message_id' => $message_template_id,
            'is_schedule' => $this->isSchedule,
            'schedule_date' => $this->scheduleDate ?? null,
        ];
        $response = $this->postRequest($url, $data);
        return $response;
    }

    public function sendGroupSMS(array $group_ids, $message=null){
        $url = $this->attachKeyToURL($this->groupSMSURL);
        $data = [
            'group_id' => $group_ids,
            'sender' => $this->sender,
            'message' => $message ?? $this->message,
            'is_schedule' => $this->isSchedule,
            'schedule_date' => $this->scheduleDate ?? null,
        ];
        $response = $this->postRequest($url, $data);
        return $response;
    }

    public function sendGroupSMSFromTemplate(array $group_ids, int $message_template_id){
        $url = $this->attachKeyToURL($this->groupSMSURL);
        $data = [
            'group_id' => $group_ids,
            'sender' => $this->sender,
            'message_id' => $message_template_id,
            'is_schedule' => $this->isSchedule,
            'schedule_date' => $this->scheduleDate ?? null,
        ];
        $response = $this->postRequest($url, $data);
        return $response;
    }

    public function sendQuickVoiceCall(string $campaign, array|string $recipients, $uploaded_audio_file){
        $url = $this->attachKeyToURL($this->quickVoiceCallURL);
        if (!is_array($recipients)){
            $recipients = [$recipients];
        }
        $data = [
            'campaign' => $campaign,
            'recipient' => $recipients,
            'file' => $uploaded_audio_file,
            'is_schedule' => $this->isSchedule,
            'schedule_date' => $this->scheduleDate ?? null,
        ];

        $response = Http::asMultipart()->post($url, $data);
        $response->throw();
        if ($response['status'] != 'success'){
            throw new \Exception($response['message']);
        }
        return $response;
    }

    public function sendQuickVoiceCallFromTemplate(string $campaign, array|string $recipients, $voice_template_id){
        $url = $this->attachKeyToURL($this->quickVoiceCallURL);
        if (!is_array($recipients)){
            $recipients = [$recipients];
        }
        $data = [
            'campaign' => $campaign,
            'recipient' => $recipients,
            'voice_id' => $voice_template_id,
            'is_schedule' => $this->isSchedule,
            'schedule_date' => $this->scheduleDate ?? null,
        ];
        $response = $this->postrequest($url, $data);
        return $response;
    }

    public function sendGroupVoiceCall(string $campaign, array $group_id, $uploaded_audio_file){
        $url = $this->attachKeyToURL($this->groupVoiceCallURL);
        $data = [
            'campaign' => $campaign,
            'group_id' => $group_id,
            'file' => $uploaded_audio_file,
            'is_schedule' => $this->isSchedule,
            'schedule_date' => $this->scheduleDate ?? null,
        ];

        $response = Http::asMultipart()->post($url, $data);
        $response->throw();
        if ($response['status'] != 'success'){
            throw new \Exception($response['message']);
        }
        return $response;
    }

    public function sendGroupVoiceCallFromTemplate(string $campaign, array $group_id, $voice_template_id){
        $url = $this->attachKeyToURL($this->groupVoiceCallURL);
        $data = [
            'campaign' => $campaign,
            'group_id' => $group_id,
            'voice_id' => $voice_template_id,
            'is_schedule' => $this->isSchedule,
            'schedule_date' => $this->scheduleDate ?? null,
        ];
        $response = $this->postrequest($url, $data);
        return $response;
    }

    public function getScheduledSMS()
    {
        $url = $this->attachKeyToURL($this->scheduledSMSURL);
        return $this->getRequest($url);
    }

    public function updateScheduledSMS(int $id, string $message)
    {
        $url = $this->scheduledSMSURL . "/$id";
        $url = $this->attachKeyToURL($url);
        $data = [
            'message' => $message
        ];
        return $this->postRequest($url, $data);
    }

}

// send group sms using template
