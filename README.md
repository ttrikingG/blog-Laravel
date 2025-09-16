# Meu Blog

Um blog moderno desenvolvido em PHP e Laravel, com funcionalidades de posts, comentários e sistema de usuários. Ideal para compartilhar conteúdo, tutoriais ou novidades.

## 🚀 Funcionalidades

- Cadastro, login e autenticação de usuários
- Criação, edição e exclusão de posts
- Sistema de comentários em posts
- Upload de imagens e mídias
- Sistema de envio de e-mails para notificações
- Busca avançada de posts e produtos
- Layout responsivo e moderno

## 🛠 Tecnologias

- PHP 8+
- Laravel 12
- MySQL
- TailwindCSS / Bootstrap (ajustar de acordo com o seu)
- JavaScript (opcional, dependendo do frontend)
- Git e GitHub para versionamento

## 💻 Instalação

1. Clone o repositório:
```bash
git clone https://github.com/usuario/nome-do-repositorio.git

Entre na pasta do projeto:
```bash
cd nome-do-repositorio


Instale as dependências do Laravel:
```bash
composer install


Configure o .env (banco de dados, e-mail, etc.):

APP_NAME="Meu Blog"
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
MAIL_MAILER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null


Gere a chave do Laravel:
```bash
php artisan key:generate


Rode as migrations:
```bash
php artisan migrate


Inicie o servidor:
```bash
php artisan serve
