<?php

namespace App\Listeners;

use App\Events\BlabCreated;
use App\Models\User;
use App\Notifications\NewBlab;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBlabCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BlabCreated $event): void
    {
        // TODO: Implement a "following" feature so users only receive notifications for accounts they follow.
        foreach (User::whereNot('id', $event->blab->user_id)->cursor() as $user) {
            $user->notify(new NewBlab($event->blab));
        }
    }
}
