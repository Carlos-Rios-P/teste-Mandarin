# Tarefas

---

* [Index](#section-0)
* [Store](#section-1)
* [Show](#section-2)
* [Update](#section-3)
* [Delete](#section-4)
* [updateStatus](#section-5)
* [getUrl](#section-6)

<a name="section-0"></a>


## Index

Para retornar todas as tarefas e suas respectivas tags a rota **`/api/task`** com o método **`GET`**.
<larecipe-badge type="primary">GET</larecipe-badge>

```http
/api/task
```


<a name="section-1"></a>


## Store

Para fazer o cadastro de uma nova tarefa utilize a rota **`/api/task`** com o método **`POST`**. Segue o exemplo de dados enviados:

<larecipe-badge type="primary">POST</larecipe-badge>

```http
/api/task
```

| Parâmetro      | Tipo   | Obrigatório
| :-             | :-     | :-
| name           | string | sim
| description    | string | não
| status         | integer| sim
| file_url       | string | sim
<br>

Segue exemplo de um request body:

```javascript
{
    "sucess": {
        "name": "Tarefa teste",
        "description": "Essa é uma tarefa teste",
        "status": "0",
        "file_url": "www.net",
        "updated_at": "2022-06-12T22:48:26.000000Z",
        "created_at": "2022-06-12T22:48:26.000000Z",
        "id": 16
    }
}
```

<a name="section-2"></a>


## Show

Para retornar a tarefa com o id indicado na url e suas respectivas tags utilize a rota **`/api/task/:id`** com o método **`GET`**. 

<larecipe-badge type="primary">GET</larecipe-badge>

```http
/api/task/:id
```

<a name="section-3"></a>


## Update

Para fazer uma alteração nos dados de uma tarefa com o id informado na rota utilize a rota **`/api/task/:id`** com o método **`PUT`**.
<larecipe-badge type="primary">PUT</larecipe-badge>

```http
/api/task/{id}
```

| Parâmetro      | Tipo   | Obrigatório
| :-             | :-     | :-
| name           | string | sim
| description    | string | não
| status         | integer| sim
| file_url       | string | sim


<a name="section-4"></a>

## Delete

Para excluir uma tarefa cujo o id foi informado na rota utilize a rota **`/api/task/:id`** com o método **`DELETE`**.
<larecipe-badge type="primary">DELETE</larecipe-badge>

```http
/api/task/:id
```

<a name="section-5"></a>

## updateStatus

Para realizar a atualização do status da tarefa utilize a rota **`/api/task/:id/status`** com o método **`PATCH`**.<br>
O campo status segue uma regra de progressão automática: BACKLOG(0)->IN_PROGRESS(1)->WAITING_CUSTOMER_APPROVAL(2)->APPROVED(3)

<larecipe-badge type="primary">PATCH</larecipe-badge>

```http
/api/task/:id/status
```

<a name="section-6"></a>


## getUrl

Para retornar o file_url da tarefa cujo id indicado na rota utilize a rota **`/api/task/{id}/file_url`** com o método **`GET`**.<br>
Apenas tarefas com status APPROVED(3) poderão ser retornados

<larecipe-badge type="primary">GET</larecipe-badge>

```http
/api/task/{id}/file_url
```
