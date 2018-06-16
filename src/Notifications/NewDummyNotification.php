<?php

namespace InetStudio\Dummies\Notifications;

use Illuminate\Notifications\Notification;
use InetStudio\Dummies\Contracts\Mail\NewDummyMailContract;
use InetStudio\Dummies\Contracts\Models\DummyModelContract;
use InetStudio\Dummies\Contracts\Notifications\NewDummyNotificationContract;

/**
 * Class NewDummyNotification.
 */
class NewDummyNotification extends Notification implements NewDummyNotificationContract
{
    protected $dummy;

    /**
     * NewCommentNotification constructor.
     *
     * @param DummyModelContract $dummy
     */
    public function __construct(DummyModelContract $dummy)
    {
        $this->dummy = $dummy;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return [
            'mail', 'database',
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param $notifiable
     * @return NewDummyMailContract
     */
    public function toMail($notifiable): NewDummyMailContract
    {
        return app()->makeWith('InetStudio\Dummies\Contracts\Models\DummyModelContract', [
            'dummy' => $this->dummy,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable): array
    {
        return [
            'dummy_id' => $this->dummy->id,
        ];
    }
}
