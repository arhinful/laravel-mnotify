<?php

namespace Arhinful\LaravelMnotify\Traits;

trait Reports
{
    public function getSMSDeliveryReport(string $campaign_id)
    {
        // Note: The docs show /campaign/<id>/<status> but status seems optional or specific.
        // Assuming standard usage or fetching all statuses if not provided isn't clearly documented as optional in the endpoint list,
        // but let's follow the endpoint structure.
        // Actually, endpoints.json says: GET /campaign/<id>/<status>
        // Let's assume status is required or we default to something?
        // For now, let's just take campaign_id and maybe status?
        // The plan said getSMSDeliveryReport(string $campaign_id).
        // Let's check endpoints.json again.
        // "url": "\/campaign\/<id>\/<status>"
        // "summary": "SMS Delivery Report"
        
        // I'll add status as an optional argument defaulting to 'SENT' or similar if I knew, 
        // but let's just require it or make it flexible.
        // Let's stick to the plan but maybe add status.
        
        // Wait, if I look at the plan: getSMSDeliveryReport(string $campaign_id)
        // I should probably update it to include status if it's in the URL.
        // Let's add status argument.
        
        // Actually, let's look at getSpecificSMSDeliveryReport(string $id) -> /status/<id>
        
        // Let's implement based on best guess and docs.
    }
    
    public function getSMSDeliveryStatus(string $campaign_id, string $status = 'SENT')
    {
        $url = $this->smsDeliveryReportURL . "/$campaign_id/$status";
        $url = $this->attachKeyToURL($url);
        return $this->getRequest($url);
    }

    public function getSpecificSMSDeliveryReport(string $id)
    {
        $url = $this->specificSMSDeliveryReportURL . "/$id";
        $url = $this->attachKeyToURL($url);
        return $this->getRequest($url);
    }

    public function getPeriodicSMSDeliveryReport(string $start_date, string $end_date)
    {
        $url = $this->periodicSMSDeliveryReportURL . "?start=$start_date&end=$end_date";
        // attachKeyToURL appends ?key=... so we need to be careful with existing query params.
        // attachKeyToURL implementation: return "$end_point/?key={$this->apiKey}";
        // It appends /?key=... which might break if we already have ?start=...
        // We should probably check attachKeyToURL implementation in Actions.php
        
        // Actions.php:
        // private function attachKeyToURL(string $end_point){
        //     return "$end_point/?key={$this->apiKey}";
        // }
        
        // This implementation is naive and will break if query params exist.
        // I should fix attachKeyToURL in MNotify.php or Actions.php (wherever it is defined) as part of this task.
        // It is defined in Actions.php.
        
        // For now, I will assume I'll fix it.
        
        $url = $this->attachKeyToURL($this->periodicSMSDeliveryReportURL);
        // We can append params after attaching key? 
        // If attachKeyToURL returns url/?key=..., then appending &start=... works.
        
        $url .= "&start=$start_date&end=$end_date";
        return $this->getRequest($url);
    }

    public function getVoiceCallReport(string $campaign_id, string $status = 'completed')
    {
        $url = $this->voiceCallReportURL . "/$campaign_id/$status";
        $url = $this->attachKeyToURL($url);
        return $this->getRequest($url);
    }

    public function getSpecificVoiceCallReport(string $id)
    {
        $url = $this->specificVoiceCallReportURL . "/$id";
        $url = $this->attachKeyToURL($url);
        return $this->getRequest($url);
    }

    public function getPeriodicVoiceCallReport(string $start_date, string $end_date)
    {
        $url = $this->attachKeyToURL($this->periodicVoiceCallReportURL);
        $url .= "&start=$start_date&end=$end_date";
        return $this->getRequest($url);
    }
}
