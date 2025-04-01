<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Transaction;

class OrderCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $transaction;

    public function __construct(User $user, Transaction $transaction)
    {
        $this->user = $user;
        $this->transaction = $transaction;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('order-channel.' . $this->user->id);
    }
        public function broadcastWhen()
    {
        \Log::info('Broadcasting OrderCreated event for user: ' . $this->user->id);
        return true;
    }

    public function broadcastWith()
    {
        return [
            'message' => "Your order #{$this->transaction->id} has been placed successfully!",
            'userId' => $this->user->id,
        ];
    }
}