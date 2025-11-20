# Laravel MNotify Package

[![Packagist Version](https://img.shields.io/packagist/v/arhinful/laravel-mnotify.svg)](https://packagist.org/packages/arhinful/laravel-mnotify)
[![License](https://img.shields.io/packagist/l/arhinful/laravel-mnotify.svg)](https://github.com/arhinful/laravel-mnotify/blob/main/LICENSE)

A **Laravel** package that provides a clean, expressive API for sending **SMS** and **voice call** notifications via the **MNotify** platform.

---
## Features
- Simple, chainable API for quick SMS, templated SMS and voice calls.
- Full Laravel Notification channel integration.
- Publishable configuration file.
- Supports Laravel 8, 9, 10, 11, and 12.
- No external dependencies – uses Guzzle under the hood.

---
## Installation
```bash
composer require arhinful/laravel-mnotify
```

The package will be auto‑discovered. If you need to publish the config file:
```bash
php artisan vendor:publish --provider="Arhinful\\LaravelMnotify\\MNotifyServiceProvider"
```

---
## Configuration
Add the following keys to your `.env` file:
```dotenv
MNOTIFY_KEY=your_api_key_here
MNOTIFY_SENDER_ID="Your Sender Name"
```
The values must match those configured in your MNotify dashboard.

---
## Usage
### Quick SMS
```php
use Arhinful\LaravelMnotify\MNotify;

$notify = new MNotify();
$notify->sendQuickSMS(['0542092800', '0507455860'], 'Hello, this is a quick reminder.');
```

### SMS from Template
```php
$notify = new MNotify();
$notify->sendQuickSMSFromTemplate(['0542092800'], 1); // 1 = template ID in MNotify
```

### Group Bulk SMS
```php
// Send to a Group
$notify->sendGroupSMS(['group_id_1', 'group_id_2'], 'Hello Group!');

// Send to a Group from Template
$notify->sendGroupSMSFromTemplate(['group_id_1'], 1);
```

### Laravel Notification Channel
```php
use Illuminate\Notifications\Notification;
use Arhinful\LaravelMnotify\NotificationDriver\MNotifyChannel;
use Arhinful\LaravelMnotify\NotificationDriver\MNotifyMessage;

class TestNotification extends Notification
{
    public function via($notifiable)
    {
        return [MNotifyChannel::class];
    }

    public function toMNotify($notifiable)
    {
        return (new MNotifyMessage())
            ->message("Hello {$notifiable->name}, your appointment is tomorrow.");
    }
}
```
In your model, define the phone number accessor:
```php
public function routeNotificationForMNotify(): string
{
    return $this->mobile; // column containing the phone number
}
```
    return $this->mobile; // column containing the phone number
}
```

### Sender ID
```php
// Register a Sender ID
$notify->registerSenderId('MyBrand', 'For OTP verification');

// Check Sender ID Status
$notify->checkSenderIdStatus('MyBrand');
```

### Balance Check
```php
// Check SMS Balance
$notify->checkSMSBalance();

// Check Voice Balance
$notify->checkVoiceBalance();
```

### Reports
```php
// Get SMS Delivery Report
$notify->getSMSDeliveryReport('campaign_id');

// Get Specific SMS Report
$notify->getSpecificSMSDeliveryReport('message_id');

// Get Periodic SMS Report
$notify->getPeriodicSMSDeliveryReport('2023-01-01', '2023-01-31');

// Get Voice Call Report
$notify->getVoiceCallReport('campaign_id');
```

### Voice Calls
```php
// Quick Bulk Voice Call (using audio file)
$notify->sendQuickVoiceCall('Campaign Title', ['054xxxxxxx'], '/path/to/audio.mp3');

// Quick Bulk Voice Call (using Voice ID)
$notify->sendQuickVoiceCallFromTemplate('Campaign Title', ['054xxxxxxx'], 'voice_id_123');

// Group Bulk Voice Call (using audio file)
$notify->sendGroupVoiceCall('Campaign Title', ['group_id_1'], '/path/to/audio.mp3');

// Group Bulk Voice Call (using Voice ID)
$notify->sendGroupVoiceCallFromTemplate('Campaign Title', ['group_id_1'], 'voice_id_123');

// Scheduled Voice Call (works with all above methods)
$notify->setIsSchedule(true)
       ->setScheduleDate('2023-12-25 08:00:00')
       ->sendQuickVoiceCall('Campaign Title', ['054xxxxxxx'], '/path/to/audio.mp3');
```

### IVR
```php
// Initiate IVR Call
$notify->initiateIVRCall(['054xxxxxxx'], 'audio_file_id_or_path');

// Get IVR Scenarios
$notify->getIVRScenarios();

// Launch IVR Scenario
$notify->launchIVRScenario(123, ['054xxxxxxx']);
```

### Scheduled SMS
```php
// Send a Scheduled SMS
$notify->setIsSchedule(true)
       ->setScheduleDate('2023-12-25 08:00:00')
       ->sendQuickSMS(['054xxxxxxx'], 'Merry Christmas!');

// Get Scheduled SMS
$notify->getScheduledSMS();

// Update Scheduled SMS
$notify->updateScheduledSMS(123, 'New message content', '2023-12-25 09:00:00');
```
---
## Testing
```bash
vendor/bin/phpunit
```
---
## Contributing
Feel free to open issues or submit pull requests. Please follow the PSR‑12 coding style.

---
## License
This package is open‑source software licensed under the **MIT License**.
