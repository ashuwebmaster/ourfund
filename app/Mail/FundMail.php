<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FundMail extends Mailable
{
    use Queueable, SerializesModels;
    public $fund = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $fund)
    {
        $this->fund = $fund;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->fund['subject'])->view('emails.funds');
    }
}
