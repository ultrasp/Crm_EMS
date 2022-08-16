<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class ZipFileReady extends Notification{

    private $job;

    public function __construct($job)
    {
        $this->job = $job;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'link' => $this->job->getUrl(),
            'cardRange' => empty($this->job->card_range) ? '' : $this->job->card_range,
            'isAll' => empty($this->job->card_range)
        ];
    }
}
