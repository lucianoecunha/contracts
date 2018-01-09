<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Manager;
use App\Models\Contract;

class ManagersNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Manager $manager,  Contract $contract, $subject, $text) {
        $this->manager = $manager;
        $this->contract = $contract;
        $this->subject = $subject;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         
        return $this->view('email.managersnotification')
                    ->from('contratos@lagoasanta.mg.gov.br')
                    ->with(['subject' => $this->subject,
                            'text' => $this->text,
                            'manager' => $this->manager,
                            'contract' => $this->contract

                    ]);


         //return $this->subject($this->subject)->view('email.managersnotification')->with('text', $this->text, $this->manager, $this->contract);
      
    }
}
