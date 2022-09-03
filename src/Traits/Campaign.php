<?php


namespace Arhinful\LaravelMnotify\Traits;


use Illuminate\Support\Facades\Http;

trait Campaign
{
    public function sendQuickSMS(array $recipients, $message=null){
        $url = $this->attachKeyToURL($this->quickSMSURL);
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

    public function sendQuickSMSFromTemplate(array $recipients, int $message_template_id){
        $url = $this->attachKeyToURL($this->quickSMSURL);
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

    public function sendQuickVoiceCall(string $campaign, array $recipients, $uploaded_audio_file){
        $url = $this->attachKeyToURL($this->quickVoiceCallURL);
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

    public function sendQuickVoiceCallFromTemplate(string $campaign, array $recipients, $voice_template_id){
        $url = $this->attachKeyToURL($this->quickVoiceCallURL);
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

}

// send group sms using template
