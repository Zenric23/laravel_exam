<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $course_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $course_code)
    {
        $this->user = $user;
        $this->course_code = $course_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Mail from teacher")->view('emails.studentEmail');
    }
}
