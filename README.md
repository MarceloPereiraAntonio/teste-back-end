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
