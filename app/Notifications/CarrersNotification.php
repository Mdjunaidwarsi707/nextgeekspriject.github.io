<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
// use Notification;

class CarrersNotification extends Notification
{
    use Queueable;
    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($User)
    {

        $this->user=$User;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
         
        return (new MailMessage)
                    ->from('nextgeeks.in@gmail.com')
                    ->subject('Career NextGeeks Software Services')
                    ->line($this->user->name)
                    ->line('Email Id :- ' .$this->user->email)
                    ->line('Mobile No :- ' .$this->user->mobile)
                    ->line('Role Position :- ' .$this->user->roles_name)
                    ->line('Qualification :- ' .$this->user->qualification)
                    ->line('Apply Date :- ' .$this->user->created_at )
                    ->line('Thank You ,')
                    ->line($this->user->name)
                    ->action('GoTo Website Now', url('/'))
                    ->line('NextGeeks Software Services.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
