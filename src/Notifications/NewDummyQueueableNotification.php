<?php

namespace InetStudio\Dummies\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use InetStudio\Dummies\Contracts\Notifications\NewDummyQueueableNotificationContract;

/**
 * Class NewDummyQueueableNotification.
 */
class NewDummyQueueableNotification extends NewDummyNotification implements ShouldQueue, NewDummyQueueableNotificationContract
{
    use Queueable;
}
