<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class AccountExpire extends Notification{

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'name' => $this->user->fullname,
            'email' => $this->user->email,
            'days' => $this->user->inviteCode->getTillEndDays()
        ];
    }
}
