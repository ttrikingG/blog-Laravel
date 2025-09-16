<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Comentário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }
        .email-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        a.button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #3490dc;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }
        a.button:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Você recebeu um novo comentário!</h2>
        <p><strong>{{ $user->fullName }}</strong> comentou no seu post:</p>
        <p><em>{{ $post->title }}</em></p>

        <p>Para ver o comentário, clique no link abaixo:</p>
        <a href="{{ $url }}" class="button">Ver Post</a>

        <p>Obrigado por usar nosso site!</p>
    </div>
</body>
</html>

