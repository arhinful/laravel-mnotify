<?php

namespace Arhinful\LaravelMnotify\Traits;

trait Reports
{
    public function getSMSDeliveryReport(string $campaign_id)
    {
        $url = $this->smsDeliveryReportURL . "/$campaign_id";
        $url = $this->attachKeyToURL($url);
        return $this->getRequest($url);
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
        $url = $this->attachKeyToURL($url);
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
        $url = $this->periodicVoiceCallReportURL . "?start=$start_date&end=$end_date";
        $url = $this->attachKeyToURL($url);
        return $this->getRequest($url);
    }
}
