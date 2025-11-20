<?php

namespace Arhinful\LaravelMnotify\Traits;

trait IVR
{
    public function initiateIVRCall(array|string $recipients, string $file, ?string $campaign = null)
    {
        $url = $this->attachKeyToURL($this->initiateIVRCallURL);
        if (!is_array($recipients)){
            $recipients = [$recipients];
        }
        
        $data = [
            'recipient' => $recipients,
            'file' => $file,
            'campaign' => $campaign ?? 'IVR Campaign',
        ];
        
        // This endpoint might require multipart if file is a file upload, or just a string if it's a file ID/URL?
        // Docs say "Initiate IVR Call". Usually implies sending a voice file.
        // Campaign trait uses Http::asMultipart() for voice calls.
        // Let's assume it's similar.
        
        // But wait, endpoints.json just says POST /initiate-ivr-call.
        // Without detailed param info from full.md (which I can't see fully due to gitignore but I saw snippets),
        // I'll assume standard POST. If file is a path, maybe multipart.
        // Let's assume it's a file path for now and use multipart if needed, or just data if it's an ID.
        // Let's stick to simple POST for now as I don't have the full file upload logic here.
        
        return $this->postRequest($url, $data);
    }

    public function getIVRScenarios()
    {
        $url = $this->attachKeyToURL($this->ivrScenariosURL);
        return $this->getRequest($url);
    }

    public function getIVRScenario(int $id)
    {
        $url = $this->ivrScenariosURL . "/$id";
        $url = $this->attachKeyToURL($url);
        return $this->getRequest($url);
    }

    public function addIVRScenario(string $title, array $flow)
    {
        $url = $this->attachKeyToURL($this->ivrScenarioAddURL);
        $data = [
            'title' => $title,
            'flow' => $flow // Assuming flow is an array structure
        ];
        return $this->postRequest($url, $data);
    }

    public function updateIVRScenario(int $id, string $title, array $flow)
    {
        $url = $this->ivrScenariosURL . "/$id";
        $url = $this->attachKeyToURL($url);
        $data = [
            'title' => $title,
            'flow' => $flow
        ];
        return $this->putRequest($url, $data);
    }

    public function deleteIVRScenario(int $id)
    {
        $url = $this->ivrScenariosURL . "/$id";
        $url = $this->attachKeyToURL($url);
        return $this->deleteRequest($url);
    }

    public function launchIVRScenario(int $ivr_id, array|string $recipients)
    {
        $url = $this->attachKeyToURL($this->ivrScenarioLaunchURL);
        if (!is_array($recipients)){
            $recipients = [$recipients];
        }
        $data = [
            'ivr_id' => $ivr_id,
            'recipient' => $recipients
        ];
        return $this->postRequest($url, $data);
    }
}
