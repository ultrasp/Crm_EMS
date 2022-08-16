<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserRecoveryMailSend extends Notification 
{
	private $user;
	private $token;
   	
   	function __construct($user,$token) {	
   		$this->user = $user;
   		$this->token = $token;
   	}

	public function via($notifiable)
	{
	    return ['mail'];
	}

	public function toMail($notifiable)
	{
	    $url = url('/new-password/'.$this->token.'?email='.$this->user->email);

	    return (new MailMessage)->view(
	        'emails.recovery-pass', ['url' => $url]
	    )->subject(__('User email recovery'));
	}    // ...
}
?>