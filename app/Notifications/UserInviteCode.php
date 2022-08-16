<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserInviteCode extends Notification 
{
	private $invite_code;
   	
   	function __construct($invite_code) {	
   		$this->invite_code = $invite_code;
   	}

	public function via($notifiable)
	{
	    return ['mail'];
	}

	public function toMail($notifiable)
	{
	    $url = url('/register');

	    return (new MailMessage)->view(
	        'emails.email-invite', ['invite_code' => $this->invite_code]
	    )->subject(__('Invite user mail'));
	}    // ...
}
?>