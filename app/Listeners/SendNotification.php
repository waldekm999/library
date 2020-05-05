<?php

namespace App\Listeners;

use App\Mail\BookCreated as BookCreatedMail;
use App\Events\BookCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;


class SendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BookCreated  $event
     * @return void
     */
    public function handle(BookCreated $event)
    {
        Mail::to('waldekm999@hotmail.com')->send(new BookCreatedMail($event->book));
        \Log::info("Email został wysłany!");
    }
}
