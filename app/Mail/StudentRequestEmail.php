<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentRequestEmail extends Mailable
{
    use Queueable, SerializesModels;

//    private $name;
//    private $email;
    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
//        $this->email = $data['email'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.student_request')
            ->subject('Žiadosť o kurz')
            ->with($this->data)
            ->from('noreply@fj.sk', 'Autoškola')
            ->to($this->data["email"]);
    }
}
