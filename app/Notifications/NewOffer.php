<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewOffer extends Notification
{
    use Queueable;

    private $form;
    private $offer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($_form, $_offer)
    {
        $this->form = $_form;
        $this->offer = $_offer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('У вас новый отклик!')
            ->greeting('Вас вітає платформа incube.zp.ua')
            ->line('На вашу заявку: ' . $this->form->name . ' новый отклик!')
            ->line('Вы можете просмотреть его нажав на кнопку ниже.')
            ->action('Посмотреть', route('project_viewer.show', ['material' => $this->offer->id]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'offer_id' => $this->offer->id,
            'to' => $this->form->id
        ];
    }
}
