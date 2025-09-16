<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommentPost extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // quem comentou
    public $post; // post que recebeu o comentário
    public $url;

    /**
     * Cria uma nova instância do Mailable.
     */
    public function __construct($user, $post)
    {
        $this->user = $user;
        $this->post = $post;

        // URL de teste no localhost
        $this->url = 'http://localhost:8000/post/' . $this->post->slug;
    }

    /**
     * Define o envelope da mensagem.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Novo comentário no seu post',
        );
    }

    /**
     * Define o conteúdo da mensagem.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.comment', // crie essa view
        );
    }

    /**
     * Define os anexos da mensagem.
     */
    public function attachments(): array
    {
        return [];
    }
}
