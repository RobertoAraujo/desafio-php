# Desafio PHP com Laravel 🚀

Bem-vindo(a) ao **Desafio PHP com Laravel**! Este repositório contém uma aplicação desenvolvida em Laravel com o objetivo de solucionar um desafio proposto. A aplicação implementa funcionalidades básicas como autenticação de usuário, manipulação de dados, e utiliza uma estrutura moderna e escalável.

## 📋 Pré-requisitos

Antes de começar, certifique-se de ter as seguintes ferramentas instaladas em seu ambiente de desenvolvimento:

- [PHP 8.x](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [Laravel](https://laravel.com/docs/8.x/installation) (versão recomendada: 8.x ou superior)
- [MySQL](https://www.mysql.com/downloads/) ou [PostgreSQL](https://www.postgresql.org/download/)
- [Node.js](https://nodejs.org/) e [npm](https://www.npmjs.com/get-npm) (opcional, caso utilize assets front-end)
  
### ⚙️ Configurações do ambiente

- Clone este repositório:
- ssh git clone git@github.com:RobertoAraujo/desafio-php.git
- https git clone https://github.com/RobertoAraujo/desafio-php.git

### Instale as dependências PHP utilizando o Composer:
    - composer install
### Gere a chave da aplicação Laravel:
    - php artisan key:generate
### Configure o banco de dados no arquivo .env e execute as migrações:
    - php artisan db:seed
### Se houver seeds disponíveis, execute para popular o banco:
