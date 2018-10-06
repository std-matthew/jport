<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $name;
    protected $email;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->name = ucwords($request->input('name'));
        $this->email = $request->input('email');
        $this->message = $request->input('message');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->from($this->email)
                    ->subject(config('app.name') . ': New Message')
                    ->greeting('Hello ' . $notifiable->renderFullname() . ',')
                    ->line('You have receive a new message from ' . $this->name)
                    ->line('Email: ' . $this->email)
                    ->line('Message: ' . $this->message)
                    ->action('View', $notifiable->viewNotifications())
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
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ];
    }
}
