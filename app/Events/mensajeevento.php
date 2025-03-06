<?php

namespace App\Events;

use App\Models\mensajes;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class mensajeevento implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    
    public $user;
    public $mensaje;
     /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Mensajes $mensaje)
    {
        $this->user = $user;
        $this->mensaje = $mensaje;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // Use a PrivateChannel for per-user messages, or Channel for public messages
        return new Channel('mensajes');
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'nuevo.mensaje';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith():array
    {
        return [
            'emisor' => $this->user->id,
            'contenido' => $this->mensaje->contenido,
            'created_at' => $this->mensaje->created_at->toDateTimeString(),
        ];
    }
}
