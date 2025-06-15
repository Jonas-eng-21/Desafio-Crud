# Sistema de Gerenciamento com Autenticação e CRUD

Este é um projeto desenvolvido em PHP com o framework Laravel, que implementa um sistema de gerenciamento completo, incluindo autenticação de usuários e um CRUD para o cadastro de funcionários. A aplicação foi construída utilizando o ecossistema moderno do Laravel, com o starter kit **Laravel Breeze** para autenticação e **Tailwind CSS** para a estilização da interface.

## Funcionalidades Principais

- **Autenticação Segura:** Sistema completo de login, registro de novos usuários e recuperação de senha.
- **Rotas Protegidas:** Acesso às áreas de gerenciamento (CRUDs) restrito apenas a usuários autenticados.
- **Gerenciamento de Perfil:** O usuário logado pode editar suas próprias informações (nome, e-mail) e alterar sua senha.
- **CRUD de Funcionários:** Funcionalidade completa para Criar, Ler, Atualizar e Deletar (CRUD) registros de funcionários.
- **Validação de Dados no Backend:** Regras robustas para garantir a integridade dos dados, incluindo validações específicas para o formato brasileiro.

---

## 1. Sistema de Autenticação com Laravel Breeze

A base de segurança da aplicação foi implementada utilizando o **Laravel Breeze**. Ele fornece um ponto de partida minimalista e elegante para toda a lógica de autenticação, incluindo:

- **Registro de Usuários:** Formulário para cadastro de novos usuários com Nome, E-mail e Senha. A validação garante que o e-mail seja único no sistema.
- **Login de Usuários:** Autenticação segura utilizando e-mail e senha. As senhas são armazenadas de forma criptografada (hashed).
- **Middleware de Autenticação:** As rotas dos CRUDs de `users` e `funcionarios` são agrupadas sob o middleware `auth`, garantindo que apenas usuários logados possam acessá-las.
- **Página de Perfil:** Uma rota `/profile` dedicada onde o usuário autenticado pode gerenciar suas informações pessoais e de segurança.

---

## Arquitetura e Tecnologias Utilizadas

Este projeto foi desenvolvido seguindo as melhores práticas e utilizando um stack de tecnologias moderno e robusto, focado em performance, segurança e manutenibilidade.

#### Backend
- **PHP 8+ e Laravel 11:** O projeto é construído sobre a versão mais recente do Laravel, um framework PHP robusto e elegante que segue o padrão de arquitetura **MVC (Model-View-Controller)**.
- **Eloquent ORM:** Para a interação com o banco de dados, utilizamos o Eloquent, o ORM nativo do Laravel, que permite uma manipulação de dados fluida e segura, abstraindo a complexidade das queries SQL.
- **Validação com Form Requests:** A validação dos dados de entrada é centralizada e organizada em classes de `Form Request` (`StoreFuncionarioRequest`, `UpdateFuncionarioRequest`), separando as regras de negócio dos controllers e tornando o código mais limpo e reutilizável.
- **Regras de Validação Customizadas:** Para regras complexas, como a validação do algoritmo do CPF, foi implementada uma `Rule` customizada (`App\Rules\Cpf`), demonstrando a extensibilidade do framework.

#### Frontend
- **Blade Engine:** As views são renderizadas utilizando o Blade, o poderoso motor de templates do Laravel, que permite a criação de layouts dinâmicos e componentes reutilizáveis.
- **Vite:** Para a compilação e o gerenciamento dos assets de frontend (CSS e JavaScript), utilizamos o Vite, que oferece um ambiente de desenvolvimento extremamente rápido com Hot Module Replacement (HMR).
- **Tailwind CSS:** Toda a estilização da interface é feita com Tailwind CSS, um framework "utility-first" que permite a criação de designs complexos e responsivos diretamente no HTML, garantindo consistência visual em toda a aplicação.
- **Alpine.js:** Para a interatividade do frontend, como a exibição de modais e dropdowns, e para a aplicação de máscaras de input, utilizamos o Alpine.js. Sua sintaxe declarativa e integração com o Blade tornam o código limpo e fácil de manter.

#### Banco de Dados
- **MySQL:** O sistema foi desenvolvido e testado utilizando o banco de dados relacional MySQL.
- **Migrations:** A estrutura do banco de dados (schemas, tabelas, colunas) é gerenciada através das **Migrations** do Laravel, permitindo o versionamento e a recriação do banco de forma automatizada e consistente em qualquer ambiente.
- **Configuração de Ambiente (`.env`):** A conexão com o banco de dados é configurada de forma segura no arquivo `.env`, permitindo que as credenciais sejam facilmente alteradas sem modificar o código-fonte.

---

## Sistema de Autenticação com Laravel Breeze

A base de segurança da aplicação foi implementada utilizando o **Laravel Breeze**. Ele fornece um ponto de partida minimalista e elegante para toda a lógica de autenticação, incluindo:

- **Registro de Usuários:** Formulário para cadastro de novos usuários com Nome, E-mail e Senha. A validação garante que o e-mail seja único no sistema.
- **Login de Usuários:** Autenticação segura utilizando e-mail e senha. As senhas são armazenadas de forma criptografada (hashed).
- **Middleware de Autenticação:** As rotas dos CRUDs de `users` e `funcionarios` são agrupadas sob o middleware `auth`, garantindo que apenas usuários logados possam acessá-las.
- **Página de Perfil:** Uma rota `/profile` dedicada onde o usuário autenticado pode gerenciar suas informações pessoais e de segurança.

---

## 2. CRUD de Funcionários

O coração do sistema é o gerenciamento de funcionários, que permite a um usuário autenticado realizar todas as operações de um CRUD completo.

#### Campos do Funcionário:
- **Nome:** `(Texto)` Nome completo do funcionário.
- **CPF:** `(Texto)` Cadastro de Pessoa Física, com máscara e validação.
- **Data de Nascimento:** `(Data)` Data de nascimento do funcionário.
- **Telefone:** `(Texto)` Telefone para contato, com máscara para formatos brasileiros.
- **Gênero:** `(Seleção)` Opções pré-definidas: "Masculino", "Feminino", "Outro".

#### Validações Implementadas no Backend:
- **Nome e Gênero:** Campos obrigatórios.
- **CPF:**
    - **Obrigatório** e deve ser **único** na base de dados.
    - É validado através de uma **Regra Customizada** (`App\Rules\Cpf`) que implementa o algoritmo oficial de validação de CPF, garantindo a autenticidade dos dígitos verificadores.
- **Telefone:**
    - **Obrigatório**.
    - Deve conter entre 10 e 11 dígitos numéricos (compatível com formatos de telefone fixo e celular com 9º dígito).
- **Data de Nascimento:** Deve ser uma data válida.

---

## 3. Tecnologias e Implementação do Frontend

A interface do usuário foi construída para ser moderna, responsiva e consistente, utilizando as seguintes tecnologias:

- **Tailwind CSS:** Todo o projeto foi estilizado com o framework de CSS "utility-first", garantindo um design coeso e integrado ao Laravel Breeze.
- **Alpine.js:** Utilizado para adicionar interatividade à interface de forma simples e declarativa. Suas principais aplicações no projeto são:
    - **Máscaras de Input:** Nos formulários de cadastro e edição de funcionários, os campos de CPF (`999.999.999-99`) e Telefone (`(99) 99999-9999`) utilizam o plugin `@alpinejs/mask` para formatar a entrada do usuário em tempo real.
    - **Dropdowns e Modais:** Componentes como o dropdown de "Detalhes" e o modal de confirmação para exclusão foram implementados com Alpine.js, proporcionando uma experiência de usuário mais rica e fluida, sem a necessidade de bibliotecas mais pesadas.

## Como Executar o Projeto

1.  **Clone o repositório:**
    ```bash
    git clone [https://seu-repositorio.com/projeto.git](https://seu-repositorio.com/projeto.git)
    cd projeto
    ```

2.  **Instale as dependências do PHP:**
    ```bash
    composer install
    ```

3.  **Instale as dependências do Node.js:**
    ```bash
    npm install
    ```

4.  **Configure o ambiente:**
    - Copie o arquivo `.env.example` para `.env`.
    - Configure as variáveis do seu banco de dados (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
    - Crie no seu Workbench ( ou alguma outra ferramenta para analisar o BD que esteja usando ) e crie o seu BD conforme definiu em `DB_DATABASE` anteriormente
    - Gere uma chave para a aplicação:
      ```bash
      php artisan key:generate
      ```

5.  **Execute as migrações do banco de dados:**
    ```bash
    php artisan migrate
    ```

6.  **Execute os servidores de desenvolvimento:**
    - Em um terminal, rode o servidor do Laravel:
      ```bash
      php artisan serve
      ```
    - Em um **segundo terminal**, rode o servidor do Vite para compilar os assets:
      ```bash
      npm run dev
      ```

7.  Acesse `http://127.0.0.1:8000` no seu navegador.
