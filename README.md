
## LARAVEL MNOTIFY PACKAGE

This package allows you to send SMS and Call notifications to users using Mnotify.net APIs with ease.

## Installation

install with composer

```bash
  composer require arhinful/laravel-mnotify
```
    
## Usage/Examples

Your receivers must be an array, eg: ['054....'], ['050...', '026...']
set these keys in your .env file

MNOTIFY_KEY=jie.....

MNOTIFY_SENDER_ID="TreySoft CA"

make sure MNOTIFY_SENDER_ID value is already set on your mnotify.net dashboard

#### Send a qick SMS
```php
use Arhinful\LaravelMnotify\MNotify;

<?php

namespace App\Http\Controllers;

use Arhinful\LaravelMnotify\MNotify;
use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function sendQuickReminder(){
        $notify = new MNotify();
        // list of receivers, can be array (multiple receivers) or string (single receiver)
        $receivers = ['0542092800', '0507455860']; // or $receivers = '0507455860';
        // message to send, must be string
        $message = "Hello users, a quick reminder, we have a scheduled meeting at 2:00 PM today.";
        $notify->sendQuickSMS($receivers, $message);
    }
}
```

#### Send a qick SMS from a template
```php

$notify = new MNotify();
$receivers = ['0542092800', '0507455860'];
$message_template_id = 1;
$notify->sendQuickSMSFromTemplate($receivers, $message_template_id);
```

#### Use Notification Channel

```php

namespace App\Notifications;

use Arhinful\LaravelMnotify\NotificationDriver\MNotifyMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class TestNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return [MNotifyChannel::class];
    }

    public function toMNotify($notifiable)
    {
        return (new MNotifyMessage())->message("Hello User: $notifiable->name");
    }
}
```

In your Model

```php

namespace App\Http\Controllers\EmailController;
use App\Models\User;
use App\Notifications\TestNotification;

class EmailController extends controller
{

    // optional, but mobile number must exist among user's attributes if this method doesn't exist
    public function routeNotificationForMNotify() : string{
        return '0257906340';
    }
}

```

In your controller

```php

namespace App\Http\Controllers\EmailController;
use App\Models\User;
use App\Notifications\TestNotification;

class EmailController extends controller
{

    public function notifyUserActio()
    {
        $user = \App\Models\User::first();
        $user->notify(new TestNotification());
        return "Message Sent";
    }
}

```
