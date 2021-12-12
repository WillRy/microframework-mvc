# MicroFramework MVC

Um microframework MVC simples, rápido e extremamente customizável

## Funcionalidades

- Instalação e configuração simples
- Abstração completa do MVC
- Um query builder que abstrai a utilização do PDO
- Um template engine para criação de templates e themas
- Controle de rotas
- Variáveis de ambiente com .env
- Core do framework pode ser facilmente personalizado, como helpers e classes auxiliares

## Instalação

- Clonar ou baixar o repositório
- Configurar seu .env com as credenciais do seu banco de dados
- Realizar a instalação das dependências via composer (composer install)
- Acessar a url do projeto, na rota / ou /users


## Documentação

A documentação ainda não está completa, PORÉM, existem exemplos
de usos da camada de controllers, models, sessões e query builder
no controller app\Controllers\UserController.php


## Docker

O framework já conta com um ambiente docker de fácil utilização,
basta ter o docker e docker-compose instalados e executar os comandos na raiz do projeto:

```bash
 sudo chmod 777 -R ./docker
 docker-compose up -d
```

## Arquitetura:

- Diversos helpers em: 
  - **helpers/helpers.php**
- Rotas no arquivo :
  - **routes/web.php**
- Controllers: 
  - **app/Controllers**
- Models:
  - **app/Models**

- Core do framework:
  - **core/**
- Abstrações:
  - **services/**
- CRONS:
  - **crons/**
- Queries sem o query builder, podem ser feitas usando a classe Connect, que retorna o PDO
```php
# com query builder
$users = DB::table("users")->limit(10)->get();

#sem query builder
$stmt = Connect::getInstance()->prepare("select * from users LIMIT 10");
$stmt->execute();

if (!$stmt->rowCount()) {
    return null;
}

$users = $stmt->fetchAll(\PDO::FETCH_CLASS);
```

## Rotas

As rotas permitem usar os verbos HTTP: GET, POST, PUT E DELETE.

Os controllers recebem os dados vindos dos parâmetros das rotas e também do post, através
de uma variável injetada no método do controller

```php
<?php
    //POST /usuario/{id} || /usuario/10
    public function editar(array $data)
    {
        //dados 
        var_dump($data); ["id" => 10, "first_name" => "pessoa"]
    }
```

## Upload de arquivos

Os upload de arquivos são feitos com a biblioteca:

[https://packagist.org/packages/willry/uploader](https://packagist.org/packages/willry/uploader)

## Creditos

- [willry](https://github.com/willry) (Developer)

## Licença

Licença MIT. Veja [License File](https://github.com/willry/microframework/blob/master/LICENSE) para mais informações.