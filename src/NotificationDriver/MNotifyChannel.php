<?php


namespace Arhinful\LaravelMnotify\NotificationDriver;


use Arhinful\LaravelMnotify\MNotify;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class MNotifyChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (method_exists($notifiable, 'routeNotificationForMNotify')) {
            $mobile_number = $notifiable->routeNotificationForMNotify($notifiable);
        } else {
            $mobile_number = $notifiable->mobile_number;
        }

        if (is_null($mobile_number)){
            throw new \Exception("User's mobile number is not provided", 400);
        }

        $message = $notification->toMnotify($notifiable);

        $notifier = new MNotify();
        try {
            $response = $notifier->sendQuickSMS([$mobile_number], $message->content());
            return $response;
        } catch (\Exception $exception){
            Log::info("Mnotify Error => $exception");
            throw $exception;
        }
    }
}
