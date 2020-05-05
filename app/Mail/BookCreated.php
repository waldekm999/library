<?php

namespace App\Mail;

use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@nasza-bibloteka.com')
            ->subject('Nowa książka')
        ->view('emails/bookCreated')
            ->with([
                'bookTitle' => $this->book->name,
            ]);
    }
}
