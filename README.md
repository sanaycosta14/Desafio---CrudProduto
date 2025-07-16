# 🧪 Desafio — CRUD de Produtos com Laravel

Este projeto é um desafio técnico simples que consiste em desenvolver uma aplicação Laravel para realizar as operações básicas de CRUD (Create, Read, Update, Delete) de produtos.

---

## 📦 Tecnologias

- PHP 8.1+
- Laravel 10
- MySQL (rodando em container via Docker)
- Composer

---

## 🎯 Funcionalidades

Cada produto possui os seguintes campos:

- `nome` (string, obrigatório)
- `preco` (decimal, obrigatório, maior que zero)
- `quantidade` (inteiro, obrigatório, maior ou igual a zero)

A aplicação permite:

- Criar um novo produto
- Listar todos os produtos
- Editar um produto existente
- Excluir um produto

A API será construída utilizando **Laravel com Eloquent ORM**, validações de entrada e retornos no formato JSON (RESTful).

---

## ⚙️ Como rodar o projeto

### 1. Clone o repositório

```bash
git https://github.com/sanaycosta14/Desafio---CrudProduto.git
cd desafio-crud-CrudProduto
```

### 2. Copie e configure o `.env`

```bash
cp .env.example .env
```

Edite o `.env` com os dados do banco:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=root
```

### 3. Suba o banco de dados com Docker

```bash
docker-compose up -d
```

> Isso irá iniciar o banco MySQL em um container na porta 3306.

### 4. Instale as dependências PHP

```bash
composer install
```

### 5. Gere a chave da aplicação Laravel

```bash
php artisan key:generate
```

### 6. Execute as migrations

```bash
php artisan migrate
```

### 7. Inicie o servidor de desenvolvimento

```bash
php artisan serve
```

Acesse: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🔀 Rotas da API (em breve)

Após implementação, as rotas disponíveis estarão em `routes/api.php` com os seguintes endpoints:

| Método | Rota              | Ação             |
|--------|-------------------|------------------|
| GET    | /api/produtos     | Listar produtos  |
| POST   | /api/produtos     | Criar produto    |
| GET    | /api/produtos/{id}| Ver produto      |
| PUT    | /api/produtos/{id}| Atualizar produto|
| DELETE | /api/produtos/{id}| Deletar produto  |

---

## ✅ Checklist de Implementação

- [x] Estrutura Laravel limpa e funcional
- [x] Banco MySQL isolado em container Docker
- [ ] Migration e Model `Product`
- [ ] Controller RESTful com validações
- [ ] Rotas de API
- [ ] Testes manuais via Postman ou Insomnia
- [ ] Documentação final

---

## 👨‍💻 Autor

Desenvolvido por **Sanayane Costa** para desafio técnico.