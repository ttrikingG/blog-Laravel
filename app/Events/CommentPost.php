<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;

class CommentPost
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $post;

    /**
     * Cria uma nova instância do evento.
     */
    public function __construct($user, $post)
    {
        $this->user = $user;
        $this->post = $post;
    }
}
