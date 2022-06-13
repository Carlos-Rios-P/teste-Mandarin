# Tarefas

---

* [Index](#section-0)
* [Store](#section-1)
* [Show](#section-2)
* [Update](#section-3)
* [Delete](#section-4)

<a name="section-0"></a>


## Index

Para retornar todas as tags a rota **`/api/tag/index`** com o método **`GET`**. Segue o exemplo de dados enviados:

<larecipe-badge type="primary">GET</larecipe-badge>

```http
/api/tag/index
```


<a name="section-1"></a>


## Store

Para fazer o cadastro de uma nova tag em uma respectiva tarefa JÁ EXISTENTE no banco de dados utilize a rota informando o id da tarefa a qual a tag será adicionada **`/api/task/:id/tag`** com o método **`POST`**. Segue o exemplo de dados enviados:

<larecipe-badge type="primary">POST</larecipe-badge>

```http
/api/task/:id/tag
```

| Parâmetro      | Tipo   | Obrigatório
| :-             | :-     | :-
| tag_name       | string | sim

<br>

Segue exemplo de um request body:

```javascript
{
    "tag_name": "Nova tag",
}
```

<a name="section-2"></a>


## Show

Para retornar a tag com o id indicado na url utilize a rota **`/api/tag/show/:id`** com o método **`GET`**. Segue o exemplo de dados enviados:

<larecipe-badge type="primary">GET</larecipe-badge>

```http
/api/tag/show/:id
```

<a name="section-3"></a>


## Update

Para fazer uma alteração nos dados de uma tag com o id informado na rota utilize a rota **`/api/tag/update/:id`** com o método **`PUT`**. Segue o exemplo de dados enviados:

<larecipe-badge type="primary">PUT</larecipe-badge>

```http
/api/tag/update/:id
```

| Parâmetro      | Tipo   | Obrigatório
| :-             | :-     | :-
| tag_name       | string | sim


<a name="section-4"></a>

## Delete

Para excluir uma tag cujo o id foi informado na rota utilize a rota **`/api/tag/delete/:id`** com o método **`DELETE`**. Segue o exemplo de dados enviados:

<larecipe-badge type="primary">DELETE</larecipe-badge>

```http
/api/tag/delete/:id
```
