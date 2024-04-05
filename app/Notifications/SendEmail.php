<?php

namespace App\Notifications;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmail extends Notification
{
    use Queueable;

    public $employee;
    public $password;
    /**
     * Create a new notification instance.
     */
    public function __construct(Employee $employee, $password)
    {
        $this->employee = $employee;
        $this->password = $password;
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
                    ->subject('Welcome to Zenox - Your Account Activation')
                    ->line('Dear ' . $this->employee->prenom . ',')
                    ->line('Welcome to Zenox! Your account has been successfully created.')
                    ->line('Below are your login details:')
                    ->line('Email: ' . $this->employee->email)
                    ->line('Password: ' . $this->password)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for choosing Zenox. We are excited to have you on board!');
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
