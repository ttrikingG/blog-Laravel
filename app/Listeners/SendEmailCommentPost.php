<?php

namespace App\Listeners;

use App\Events\CommentPost;
use App\Mail\CommentPost as CommentPostedMail;
use Illuminate\Support\Facades\Mail;

class SendEmailCommentPost
{
    /**
     * Cria a instância do listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Manipula o evento.
     */
    public function handle(CommentPost $event): void
    {
        // Envia o e-mail para o autor do post
        $postOwner = $event->post->user;

        if ($postOwner && $postOwner->email) {
            Mail::to($postOwner->email)
                ->send(new CommentPostedMail($event->user, $event->post));
        }
    }
}
