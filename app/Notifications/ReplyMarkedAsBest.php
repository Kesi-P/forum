<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Discussion;

class ReplyMarkedAsBest extends Notification implements ShouldQueue
{
    use Queueable;
    /**
     *
     * @var Discussion
     */
    public $discussion;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Discussion $discussion)
    {
        $this->discussion = $discussion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) //mail
    {
        return (new MailMessage)
                                  ->from('test@example.com', 'Laravel Forum')
                                  ->line('Your reply was marked as a Best reply')
                                  ->action('View Discussion', route('discussion.show', $this->discussion->slug))
                                  ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)//database
    {
        return [
            'discussion' => $this->discussion
        ];
    }
}
