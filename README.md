# cadastro-de-socios

Sistema com CRUD para cadastro de sócios. O sistema possui autenticação com login para acesso ao CRUD e os sócios possuem os dados:
- Nome
- Email
- Tipo
- Estado
- Cidade
- Bairro
- Rua
- Número
- Complemento


## Sobre o sistema

## Home

A primeira página tem uma mensagem de boas vindas e nela é possível fazer login ou cadastro

![home](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/940971d2-2590-4601-8c06-bf82ed8ad502)

## Login

A página de login:

![login](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/3461f1b4-89cb-4378-8941-ec3bd501fd28)

## Registro

A página de registro:

![register](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/23a2c201-528f-49e3-83c1-977c0c73df09)

## Dashboard

Depois de logado, o sistema redireciona para a dashboard, onde estão listados todos os sócios e é possível visualizar, editar, deletar ou adicionar.

![dashboard](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/bdc99dcb-7556-4e02-a3aa-184b9b559f02)

## Adição

A página de criação. Nela são inseridas todas as informações do novo sócio. Essa página utiliza a API ViaCep para preencher automaticamente os dados de endereço a partir do CEP informado (independente de ter ou não hífen, eu trato e retiro no back end). 

![create](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/804f2f96-f801-4899-866e-924325fbfc6f)

O formulário de criação tem validações e informa quando algum dado não está de acordo com o que o sistema exige:

![create_validations](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/36111cfd-f408-4ba2-b3b6-eb2f20e92569)

Caso não seja encontrado nenhum dado para o CEP digitado, é exibida uma notificação:

![cep invalido](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/ad77b44c-3000-425a-81e8-710aa55afd5f)

Quando a adição é bem sucedida, o sistema redireciona para a dashboard e exibe uma notificação de sucesso. Essa notificação é feita com a biblioteca JS ToastrJs:

![create notification](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/e2cec392-fbe7-4ffa-ad1b-f3396ddada3e)

## Edição

A página de edição é igual a de criação e tem as mesmas validações e também consome a API ViaCep:

![edit](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/9d1eba92-9908-422b-8425-c7c44f43d059)

## Visualização

A página de visualização exibe todos os dados do sócio:

![view](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/c8ffd1bf-673d-4bbc-961a-20461adb7101)

## Exclusão

A exclusão exibe um modal de confirmação e o nome do sócio para confirmar que está correto. O modal é feito com bootstrap e javascript, e assim que é confirmado, dispara uma requisição com Ajax:

![delete confirmation](https://github.com/Leandrovelez/cadastro-de-socios/assets/80285958/e668ab4c-5280-40fc-b915-e8ef239d7674)








