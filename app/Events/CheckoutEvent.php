<?php

namespace FRD\Events;

use FRD\Events\Event;
use FRD\Order;
use FRD\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CheckoutEvent extends Event
{
    use SerializesModels;

    private $user;
    private $order;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Order $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getOrder()
    {
        return $this->order;
    }
}
