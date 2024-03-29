<?php

namespace App\Notifications;

use App\Models\Alertamascota;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AlertamascotaNotification extends Notification
{
    use Queueable;
    public $alerta;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Alertamascota $alerta)
    {
        $this->alerta = $alerta;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'latitud'  => $this->alerta->latitud,
            'longitud' => $this->alerta->longitud,
            'detalle'  => $this->alerta->detalle,
            'mascota'  => $this->alerta->mascota,
            'raza'     => $this->alerta->mascota->razaMascota,
            'duenho'   => $this->alerta->mascota->duenho
        ];
    }
}
