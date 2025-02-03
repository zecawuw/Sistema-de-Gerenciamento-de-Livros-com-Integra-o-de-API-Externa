# Sistema de Gerenciamento de Livros com Integração de API Externa

## Descrição do Projeto
Este projeto é um sistema de gerenciamento de livros desenvolvido em Laravel. Ele permite criar, ler, atualizar e excluir registros de livros, além de consultar uma API externa (Open Library) para obter informações sobre o autor, como biografia e nacionalidade.

## Instalação do Projeto
1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/livro_manager.git
   ```
2. Acesse o diretório do projeto:
   ```bash
   cd livro_manager
   ```
3. Instale as dependências do Composer:
   ```bash
   composer install
   ```
4. Configure o arquivo `.env`:
   - Duplique o arquivo `.env.example` e renomeie para `.env`.
   - Configure as credenciais do banco de dados:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=livros_db
     DB_USERNAME=root
     DB_PASSWORD=
     ```
5. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```
6. Execute as migrations:
   ```bash
   php artisan migrate
   ```
7. Inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve
   ```
8. Acesse o projeto no navegador:
   ```
   http://localhost:8000/livros
   ```

## Configuração do Ambiente
- Certifique-se de que o PHP (>= 8.0) e o Composer estão instalados.
- Configure o banco de dados MySQL no arquivo `.env`.
- Para integração com a API externa, nenhuma chave de API é necessária.

## Boas Práticas
- Validação de dados no backend.
- Uso de migrations para gerenciar o banco de dados.
- Integração com API externa para enriquecimento de dados.
- Frontend responsivo com Bootstrap.