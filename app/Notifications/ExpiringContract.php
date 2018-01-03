<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ExpiringContract extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;

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
        
        $message = new MailMessage;
        $contracts = $this->manager->contracts();

        foreach ($contracts as $contract) {
            $message->subject('Vencimento de Contratos')
                ->line(' Senhor '.$this->manager->name.', Informamos que o Contrato '.$contract->number.' / '.$contract->year.' que possui objeto '.$contract->objeto.' irá vencer em '.$contract->validity.'. Inforamos que caso exista interesse na renovação do mesmo, é necessário iniciar o processo.')            
                ->success();
                  
              }                  
                 
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
