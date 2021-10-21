<?php

namespace App\Notifications;

use App\Models\Survey;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SurveyHasNewResponse extends Notification
{
    public $survey;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Survey $survey)
    {
        $this->survey = $survey;
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
        $url = route('company.surveys.result.index', ['survey' => $this->survey]);
        return (new MailMessage)
                    ->subject('Your survey, '. $this->survey->title. ' has new response.')
                    ->greeting('Hello!')
                    ->line('Your survey has a new response')
                    ->action('View Summary', $url)
                    ->line('Thank you!');
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
