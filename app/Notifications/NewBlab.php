<?php

namespace App\Notifications;

use App\Models\Blab;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBlab extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Blab $blab)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("New Blab from {$this->blab->user->name}")
            ->greeting("New Blab from {$this->blab->user->name}")
            ->line(Str::limit($this->blab->message, 50))
            ->action('Go to Blabber', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
