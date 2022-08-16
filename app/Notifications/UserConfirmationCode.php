<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserConfirmationCode extends Notification 
{
	private $user;
   	
   	function __construct($user) {	
   		$this->user = $user;
   	}

	public function via($notifiable)
	{
	    return ['mail'];
	}

	public function toMail($notifiable)
	{
	    $url = url('/pin-code');

	    return (new MailMessage)->view(
	        'emails.email-verification', ['user' => $this->user]
	    )->subject(__('Confirm user mail'));
	}    // ...
}
?>