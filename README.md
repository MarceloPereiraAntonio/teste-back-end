## Apresentação do Projeto
Este projeto foi desenvolvido para oferecer uma solução robusta de gerenciamento de produtos, com uma arquitetura de código organizada e eficiente. Com o objetivo de implementar boas práticas de design de software, foram aplicados os patterns Service e Repository, proporcionando maior separação de responsabilidades e facilitando a manutenção e escalabilidade do sistema, além do uso de Jobs e Laravel Horizon para gerenciamento de filas.

#### Funcionalidades Implementadas
* CRUD completo de produtos, com validação de dados.

* Criação, listagem e edição de Categorias, com validação de dados.

* Filtros de busca para produtos, incluindo a possibilidade de filtrar produtos com ou sem imagem associada.

* Importação de dados a partir de uma API externa, utilizando Jobs para processar as requisições em segundo plano.

* Upload de imagens de produtos, com armazenamento seguro e exibição dinâmica no sistema.

* Login e edição dos dados do usario.


### Passo a passo para rodar esse projeto
Clone Repositório
```sh
git clone -b https://github.com/MarceloPereiraAntonio/teste-back-end
```
```sh
cd app-laravel
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize essas variáveis de ambiente no seu arquivo .env
```dosini

APP_NAME="New project"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=Laravel
DB_USERNAME=youruser
DB_PASSWORD=yourpassword


REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Acesse o container app
```sh
docker-compose exec app bash
```
Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Rodar as migrations
```sh
php artisan migrate
```

Fora do container instale as dependências do Node.js
npm install
```sh
npm install
npm run dev
```
Comandos de importação de dados da API fakestoreapi
```sh
php artisan categories:import Import all categories
php artisan products:import {--id= : Import single product by ID}
```
Observação: Quando rodar os comandos acima será gerado um Job para cada um e para executar rode o seguinte comando:

```sh
php artisan horizon
```

Acesse o projeto
[http://localhost:8000](http://localhost:8000)
