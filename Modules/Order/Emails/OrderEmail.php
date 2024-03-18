<?php

namespace Modules\Order\Emails;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Order\Entities\Order;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     * @param $user
     */
    public function __construct(private readonly Order $order, private readonly User $user)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('order::index', ['order' => $this->order, 'user' => $this->user, 'rest' => $this->order->rest]);
    }
}
