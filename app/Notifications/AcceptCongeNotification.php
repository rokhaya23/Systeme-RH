<?php

namespace App\Notifications;

use App\Models\Conge;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptCongeNotification extends Notification
{
    use Queueable;
    public $demandeConge;

    /**
     * Create a new notification instance.
     */
    public function __construct(Conge $demandeConge)
    {
        $this->demandeConge = $demandeConge;
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
            ->subject('Leave Request Accepted')
            ->line('Hello,')
            ->line('Your leave request has been accepted. Please proceed to the secretariat with your leave request form to obtain the signature.')
            ->line('Leave details:')
            ->line('Start Date: ' . $this->demandeConge->date_debut)
            ->line('End Date: ' . $this->demandeConge->date_fin)
            ->line('Number of Days: ' . $this->demandeConge->nombre_jour)
            ->line('Thank you for choosing Zenox');
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
