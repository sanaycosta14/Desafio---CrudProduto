# Desafio Técnico — CRUD de Produtos com Laravel

## Objetivo

Aplicação simples em Laravel que implementa uma API RESTful para realizar as operações de CRUD (Create, Read, Update, Delete) de produtos.

---

## Tecnologias Utilizadas

-   **Backend:** PHP 8.1+ / Laravel 10
-   **Banco de Dados:** MySQL 8.0 (executado via Docker)
-   **Ambiente:** Docker / Docker Compose
-   **Gerenciador de Dependências:** Composer

---

## Funcionalidades

A API permite gerenciar produtos com os seguintes campos:

* `nome` (string, obrigatório)
* `preco` (decimal, obrigatório, maior que 0)
* `quantidade` (inteiro, obrigatório, maior ou igual a 0)

As operações disponíveis são:

* Listar todos os produtos.
* Cadastrar um novo produto.
* Visualizar um produto específico.
* Atualizar um produto existente.
* Excluir um produto.

---

## Como Executar o Projeto

Siga os passos abaixo para configurar e executar o ambiente de desenvolvimento.

### Pré-requisitos

-   Docker e Docker Compose
-   Composer
-   PHP 8.1+

### 1. Clonar o Repositório

```bash
git clone [https://github.com/sanaycosta14/Desafio---CrudProduto.git](https://github.com/sanaycosta14/Desafio---CrudProduto.git)
cd Desafio---CrudProduto
````

### 2. Configurar o Ambiente

Copie o ficheiro de ambiente de exemplo.

```bash
# Crie o ficheiro .env a partir do exemplo
cp .env.example .env
```

**Edite o ficheiro `.env`** e garanta que as variáveis do banco de dados correspondem às do `docker-compose.yml`. Elas devem ser:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=12345678
```

### 3. Instalar as Dependências

Instale as dependências do PHP com o Composer.

```bash
composer install
```

### 4. Gerar a Chave da Aplicação

Este passo é crucial para a segurança do Laravel.

```bash
php artisan key:generate
```

### 5. Iniciar o Banco de Dados com Docker

Suba o contêiner do MySQL em segundo plano.

```bash
docker-compose up -d
```

### 6. Executar as Migrations e Seeders

Crie as tabelas no banco de dados e popule a tabela de produtos com 3 exemplos iniciais.

```bash
php artisan migrate --seed
```

### 7. Iniciar o Servidor

Inicie o servidor de desenvolvimento do Laravel.

```bash
php artisan serve
```

A API estará disponível em `http://127.0.0.1:8000`.

-----

## Como Testar as Rotas da API

Utilize uma ferramenta como Postman, Insomnia ou os comandos `curl` abaixo para testar os endpoints.

#### 1. Listar todos os produtos

  * **Método:** `GET`
  * **URL:** `/api/produtos/all`


```bash
curl [http://127.0.0.1:8000/api/produtos/all](http://127.0.0.1:8000/api/produtos/all)
```

#### 2. Cadastrar um novo produto

  * **Método:** `POST`
  * **URL:** `/api/produtos/cadastrar`
  * **Body (JSON):**
    ```json
    {
        "nome": "Mouse Gamer",
        "preco": 150.75,
        "quantidade": 20
    }
    ```


```bash
curl -X POST [http://127.0.0.1:8000/api/produtos/cadastrar](http://127.0.0.1:8000/api/produtos/cadastrar) \
-H "Content-Type: application/json" \
-d '{"nome": "Mouse Gamer", "preco": 150.75, "quantidade": 20}'
```

#### 3. Visualizar um produto específico

  * **Método:** `GET`
  * **URL:** `/api/produtos/visualizar/{id}` (substitua `{id}` pelo ID do produto)


```bash
# Exemplo para o produto com ID 1
curl [http://127.0.0.1:8000/api/produtos/visualizar/1](http://127.0.0.1:8000/api/produtos/visualizar/1)
```

#### 4. Atualizar um produto

  * **Método:** `PUT`
  * **URL:** `/api/produtos/atualizar/{id}` (substitua `{id}` pelo ID do produto)
  * **Body (JSON):** (envie apenas os campos que deseja atualizar)
    ```json
    {
        "preco": 139.99
    }
    ```

```bash
# Exemplo para atualizar o preço do produto com ID 1
curl -X PUT [http://127.0.0.1:8000/api/produtos/atualizar/1](http://127.0.0.1:8000/api/produtos/atualizar/1) \
-H "Content-Type: application/json" \
-d '{"preco": 139.99}'
```

#### 5. Excluir um produto

  * **Método:** `DELETE`
  * **URL:** `/api/produtos/deletar/{id}` (substitua `{id}` pelo ID do produto)


```bash
# Exemplo para deletar o produto com ID 1
curl -X DELETE [http://127.0.0.1:8000/api/produtos/deletar/1](http://127.0.0.1:8000/api/produtos/deletar/1)
```

-----

## 👨‍💻 Autor

Desenvolvido por **Sanayane Costa**.