<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlaceOrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bricks;
    public $price;
    public $total_bricks;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bricks,$price,$total_bricks)
    {
        $this->bricks = $bricks;
        $this->price = $price;
        $this->total_bricks = $total_bricks;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Placed Order on NFTBriks.com')->view('mail.order');
    }
}
