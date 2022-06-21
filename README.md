# Teste desafio PHP

### Será necessário desenvolver uma API em PHP para gerenciamento de tarefas / entrega de arquivos para o cliente.
- <b>Importante</b>: Este teste será utilizado única e exclusivamente para a avaliação técnica do candidato à vaga.
- A aplicação pode ser desenvolvida com qualquer framework PHP, ou implementação pura em PHP, mas temos preferência por Laravel.
- Pode ser usado qualquer banco de dados, mas temos preferência por MySQL.
- Será avaliado no teste:
  - Tempo de execução do teste;
  - Organização do código;
  - Limpeza do código;
  - Performance dos algoritmos e queries do banco (podem ser usados ORMs/Query Builders).
- Enviar junto ao teste um documento de texto ou semelhante, com um guia simples e prático de como rodaremos sua aplicação para testar.
- Caso crie uma request collection no Postman/Insomnia ou qualquer ferramenta de requisições HTTP, nos envie junto ao desafio.
- Desafios extras (não são obrigatórios mas dão alguns pontos adicionais):
  - Utilizar migrations e seeders para a aplicação;
  - Deploy no Heroku ou qualquer plataforma cloud;
  - Conteinerização da aplicação (Docker);
  - Testes unitários / testes de integração.
- Após a conclusão do teste, deve ser criado um repositório no GitHub com o código, e o link do repositório deve ser enviado por e-mail para <b>fernando@mandarin.com.br</b> e <b>matheus.sartori@mandarin.com.br</b>
- Após o recebimento do teste, consideramos que o prazo para entrega é de 5 dias úteis.

## Modelos

### Tarefa
<table>
  <thead>
    <tr>
      <th>Dado</th>
      <th>Descrição</th>
      <th>Valor padrão</th>
      <th>Obrigatório</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>id</td>
      <td>ID da tarefa. Pode ser incremental ou UUID.</td>
      <td>Automático (UUID ou AUTOINCREMENT)</td>
      <td>SIM</td>
    </tr>
    <tr>
      <td>name</td>
      <td>Nome da tarefa.</td>
      <td>Não possui valor padrão.</td>
      <td>SIM</td>
    </tr>
    <tr>
      <td>description</td>
      <td>Descrição da tarefa.</td>
      <td>Não possui valor padrão.</td>
      <td>NÃO</td>
    </tr>
    <tr>
      <td>status</td>
      <td>Status da tarefa. Pode ter os valores <i>backlog</i>, <i>in_progress</i>, <i>waiting_customer_approval</i>, <i>approved</i>.</td>
      <td><i>backlog</i></td>
      <td>SIM</td>
    </tr>
    <tr>
      <td>file_url</td>
      <td>Link com material aprovado pelo cliente (dado fictício).</td>
      <td>Não possui valor padrão.</td>
      <td>SIM</td>
    </tr>
    <tr>
      <td>created_at</td>
      <td>Data da criação do registro.</td>
      <td>NOW()</td>
      <td>NÃO</td>
    </tr>
    <tr>
      <td>updated_at</td>
      <td>Data da última atualização do registro.</td>
      <td>NOW()</td>
      <td>NÃO</td>
    </tr>
  </tbody>
</table>

### Tags das tarefas
<table>
  <thead>
    <tr>
      <th>Dado</th>
      <th>Descrição</th>
      <th>Valor padrão</th>
      <th>Obrigatório</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>id</td>
      <td>ID do registro. Pode ser incremental ou UUID.</td>
      <td>Automático (UUID ou AUTOINCREMENT)</td>
      <td>SIM</td>
    </tr>
    <tr>
      <td>tag_name</td>
      <td>Nome da tag.</td>
      <td>Não possui valor padrão.</td>
      <td>SIM</td>
    </tr>
    <tr>
      <td>task_id</td>
      <td>ID da tarefa.</td>
      <td>Não possui valor padrão.</td>
      <td>SIM</td>
    </tr>
    <tr>
      <td>created_at</td>
      <td>Data da criação do registro.</td>
      <td>NOW()</td>
      <td>NÃO</td>
    </tr>
    <tr>
      <td>updated_at</td>
      <td>Data da última atualização do registro.</td>
      <td>NOW()</td>
      <td>NÃO</td>
    </tr>
  </tbody>
</table>

### Rotas da aplicação:

- /task [<b>POST</b>]:
  - Rota para cadastrar uma tarefa.
  - Os dados devem ser validados para evitar erros na camada do banco de dados ou aplicação.
  - A tarefa criada deve ser retornada na resposta da requisição.


- /task/:id [<b>PUT</b>]:
  - Rota para editar uma tarefa.
  - Os dados devem ser validados para evitar erros na camada do banco de dados ou aplicação.
  - Não é necessário retornar nada nessa rota.

- /task/:id/status [<b>PATCH</b>]:
  - Rota para alterar o status de uma tarefa.
  - O status apenas pode ser alterado respeitando os estágios da tarefa:
    - BACKLOG -> IN_PROGRESS
    - IN_PROGRESS -> WAITING_CUSTOMER_APPROVAL
    - WAITING_CUSTOMER_APPROVAL -> APPROVED
  - Os dados devem ser validados para evitar erros na camada do banco de dados ou aplicação.
  - Não é necessário retornar nada nessa rota.


- /task/:id/tag [<b>POST</b>]:
  - Rota para criar e adicionar uma tag para uma tarefa.
  - Os dados devem ser validados para evitar erros na camada do banco de dados ou aplicação.
  - Não é necessário retornar nada nessa rota.

- /task [<b>GET</b>]:
  - Rota para listar todas as tarefas.
  - Deve retornar todas as tarefas cadastradas no banco de dados.
  - As tags atribuídas as tarefas devem ser retornadas junto as tarefas.
  - O campo file_url não deve ser retornado nesta rota.

- /task/:id/file_url [<b>GET</b>]:
  - Rota para devolver o link com o material aprovado pelo cliente.
  - A rota só pode devolver o link, caso o status da tarefa seja <i>approved</i>.
