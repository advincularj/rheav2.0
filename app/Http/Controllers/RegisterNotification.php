<?php

namespace App\Http\Controllers;

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterNotification extends Notification {

    public function __construct($data) {
        $this->user = $data;
    }

    public function via($notifiable) {
        return ['mail'];
    }

    public function toMail($notifiable) {
        return (new MailMessage)
            ->success()
            ->subject('Welcome')
            ->line('Dear ' . $this->user->name . ', we are happy to see you here.')
            ->action('Go to site', url('/'))
            ->line('Please tell your friends about us.');
    }

}
