<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class ReservationInvoice extends Notification
{
    use Queueable;

    private $reservation;

    /**
     * Create a new notification instance.
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
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
        // Format dates
        $fromDate = Carbon::parse($this->reservation->getFromDate())->format('F d, Y');
        $toDate = Carbon::parse($this->reservation->getToDate())->format('F d, Y');
        
        // Calculate nights
        $nights = Carbon::parse($this->reservation->getFromDate())->diffInDays(
            Carbon::parse($this->reservation->getToDate())
        ) + 1;

        return (new MailMessage)
            ->subject('Reservation Confirmation - Booking #' . $this->reservation->getPrimaryKey())
            ->view('emails.reservation_invoice', [
                'reservation' => $this->reservation,
                'property' => $this->reservation->property,
                'tourist' => $this->reservation->tourist,
                'fromDate' => $fromDate,
                'toDate' => $toDate,
                'nights' => $nights
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'reservation_id' => $this->reservation->getPrimaryKey(),
            'property_id' => $this->reservation->property_id,
            'total_price' => $this->reservation->getTotalPrice(),
            'from_date' => $this->reservation->getFromDate(),
            'to_date' => $this->reservation->getToDate(),
        ];
    }
}