---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

API EXEMPLO MCMM-MI TDI 2016 - NEWS API
<!-- END_INFO -->

#Family

Controller for family related operations
<!-- START_1a24898fc594d249385c079d5cbf7353 -->
## List all Families

Lists all families in the database

> Example request:

```bash
curl "http://localhost/api/family" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/family",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[
    {
        "id": 2,
        "name": "Mota",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "name": "Silva",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 4,
        "name": "Mota",
        "created_at": null,
        "updated_at": null
    }
]
```

### HTTP Request
`GET api/family`

`HEAD api/family`


<!-- END_1a24898fc594d249385c079d5cbf7353 -->
<!-- START_d60496443e529c37287fd3855181d81d -->
## Family Insert

Inserts a family in the database

> Example request:

```bash
curl "http://localhost/api/family" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/family",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/family`


<!-- END_d60496443e529c37287fd3855181d81d -->
<!-- START_290c637213107aab0776fa671513a0a6 -->
## Family Detail

Gives the details of a family

> Example request:

```bash
curl "http://localhost/api/family/{family}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/family/{family}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/family/{family}`

`HEAD api/family/{family}`


<!-- END_290c637213107aab0776fa671513a0a6 -->
<!-- START_f8b8a12aad7af333bffbc3d4eddb22cd -->
## Family Update

Update a family in the database

> Example request:

```bash
curl "http://localhost/api/family/{family}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/family/{family}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/family/{family}`

`PATCH api/family/{family}`


<!-- END_f8b8a12aad7af333bffbc3d4eddb22cd -->
<!-- START_2ba79a5b9929988114a3b1a89261799c -->
## Delete Family

Deletes a family in the database

> Example request:

```bash
curl "http://localhost/api/family/{family}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/family/{family}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/family/{family}`


<!-- END_2ba79a5b9929988114a3b1a89261799c -->
<!-- START_8bb774a868ec24b998841380193620e1 -->
## Get Family Users

Lists the users of a Family

> Example request:

```bash
curl "http://localhost/api/family/{family}/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/family/{family}/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/family/{family}/users`

`HEAD api/family/{family}/users`


<!-- END_8bb774a868ec24b998841380193620e1 -->
#Lists

Controller for shopping lists related operations
<!-- START_2535121d38b5231985e5394363ce74e1 -->
## List all Lists

Lists all lists in the database

> Example request:

```bash
curl "http://localhost/api/lists" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/lists",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[
    {
        "id": 2,
        "name": "Festa Joana",
        "icon": "prenda",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "name": "Passagem de Ano",
        "icon": "trabalho",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 4,
        "name": "Passagem de Ano",
        "icon": "trabalho",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 5,
        "name": "Passagem de Ano",
        "icon": "trabalho",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 6,
        "name": "Nova Lista",
        "icon": "trabalho",
        "created_at": "2017-01-13 15:09:42",
        "updated_at": "2017-01-13 16:03:15"
    },
    {
        "id": 7,
        "name": "teste23",
        "icon": "natalol11",
        "created_at": "2017-01-13 15:22:43",
        "updated_at": "2017-01-13 15:22:43"
    },
    {
        "id": 8,
        "name": "teste234312",
        "icon": "natalol11",
        "created_at": "2017-01-13 15:29:30",
        "updated_at": "2017-01-13 15:29:30"
    },
    {
        "id": 9,
        "name": "teste234312",
        "icon": "natalol11",
        "created_at": "2017-01-13 15:29:42",
        "updated_at": "2017-01-13 15:29:42"
    },
    {
        "id": 11,
        "name": "teste234312",
        "icon": "natalol11",
        "created_at": "2017-01-13 15:30:37",
        "updated_at": "2017-01-13 15:30:37"
    },
    {
        "id": 12,
        "name": "Nova Lista",
        "icon": "trabalho",
        "created_at": "2017-01-13 17:00:40",
        "updated_at": "2017-01-13 17:00:40"
    },
    {
        "id": 13,
        "name": "Nova Lista34",
        "icon": "trabalho",
        "created_at": "2017-01-13 17:01:13",
        "updated_at": "2017-01-13 17:01:13"
    }
]
```

### HTTP Request
`GET api/lists`

`HEAD api/lists`


<!-- END_2535121d38b5231985e5394363ce74e1 -->
<!-- START_45576e17ce2b7b15720a3060e601dbac -->
## api/lists/create

> Example request:

```bash
curl "http://localhost/api/lists/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/lists/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/lists/create`

`HEAD api/lists/create`


<!-- END_45576e17ce2b7b15720a3060e601dbac -->
<!-- START_6e80312e61d28100fddedd59ee6f1dc9 -->
## List Insert

Inserts a list in the database

> Example request:

```bash
curl "http://localhost/api/lists" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/lists",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/lists`


<!-- END_6e80312e61d28100fddedd59ee6f1dc9 -->
<!-- START_ea2a7ee423318c58030a68197e50cf45 -->
## List Detail

Gives the details of a list

> Example request:

```bash
curl "http://localhost/api/lists/{list}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/lists/{list}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/lists/{list}`

`HEAD api/lists/{list}`


<!-- END_ea2a7ee423318c58030a68197e50cf45 -->
<!-- START_c15d64c5208426d308516ee8be4abe6c -->
## api/lists/{list}/edit

> Example request:

```bash
curl "http://localhost/api/lists/{list}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/lists/{list}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/lists/{list}/edit`

`HEAD api/lists/{list}/edit`


<!-- END_c15d64c5208426d308516ee8be4abe6c -->
<!-- START_2a34ad1fcadacd12d8f5fe79f9ccc127 -->
## List Update

Update a list in the database

> Example request:

```bash
curl "http://localhost/api/lists/{list}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/lists/{list}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/lists/{list}`

`PATCH api/lists/{list}`


<!-- END_2a34ad1fcadacd12d8f5fe79f9ccc127 -->
<!-- START_956541e48346440c128d087e6133ce21 -->
## Delete List

Deletes a list in the database

> Example request:

```bash
curl "http://localhost/api/lists/{list}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/lists/{list}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/lists/{list}`


<!-- END_956541e48346440c128d087e6133ce21 -->
<!-- START_201a586a6cf4a763fdd4caec7d524eeb -->
## Users of a List

Gives the users linked of a list

> Example request:

```bash
curl "http://localhost/api/lists/{list}/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/lists/{list}/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/lists/{list}/users`

`HEAD api/lists/{list}/users`


<!-- END_201a586a6cf4a763fdd4caec7d524eeb -->
<!-- START_996cd264227f3a33843985d3cb9279a9 -->
## api/lists/{list}/users

> Example request:

```bash
curl "http://localhost/api/lists/{list}/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/lists/{list}/users",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/lists/{list}/users`


<!-- END_996cd264227f3a33843985d3cb9279a9 -->
<!-- START_1ddf7af8bf64c4c731a227b1fb9ebb76 -->
## api/lists/{list}/products

> Example request:

```bash
curl "http://localhost/api/lists/{list}/products" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/lists/{list}/products",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/lists/{list}/products`

`HEAD api/lists/{list}/products`


<!-- END_1ddf7af8bf64c4c731a227b1fb9ebb76 -->
#Produtos

Método geral para controla produtos
<!-- START_d6315c0f80fdc5b8b5cafcb7768d054e -->
## List All Products

Listagem de todas os produtos existentes em base de dados

> Example request:

```bash
curl "http://localhost/api/products" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/products",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[
    {
        "id": 2,
        "title": "kcwyl9t9Yg",
        "description": "D9dMZ2C5lB",
        "quant": "4 peças",
        "image": "vP8o4sOEEp.png",
        "list_id": 2,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "title": "HKvTw6q949",
        "description": "fuNumBKsMJ",
        "quant": "2 caixas",
        "image": "rRsHNWfWO0.png",
        "list_id": 2,
        "created_at": null,
        "updated_at": null
    }
]
```

### HTTP Request
`GET api/products`

`HEAD api/products`


<!-- END_d6315c0f80fdc5b8b5cafcb7768d054e -->
<!-- START_05b4383f00fd57c4828a831e7057e920 -->
## News Insert

Inserir uma nova notícia em base de dados

> Example request:

```bash
curl "http://localhost/api/products" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/products",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/products`


<!-- END_05b4383f00fd57c4828a831e7057e920 -->
<!-- START_963ec11fd78da94f0900b0c6baf959a3 -->
## News Detail

Detalhe de uma notícia

> Example request:

```bash
curl "http://localhost/api/products/{product}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/products/{product}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/products/{product}`

`HEAD api/products/{product}`


<!-- END_963ec11fd78da94f0900b0c6baf959a3 -->
<!-- START_b7842ce7893c09eb3c53713f82c2e12d -->
## News Update

Atualizar uma notícia em base de dados

> Example request:

```bash
curl "http://localhost/api/products/{product}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/products/{product}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/products/{product}`

`PATCH api/products/{product}`


<!-- END_b7842ce7893c09eb3c53713f82c2e12d -->
<!-- START_1d809ca5e8b10fa7fdc75d04506a55ea -->
## News Delete

Apagar uma notícia da base de dados

> Example request:

```bash
curl "http://localhost/api/products/{product}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/products/{product}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/products/{product}`


<!-- END_1d809ca5e8b10fa7fdc75d04506a55ea -->
<!-- START_c9ceb101ecf927d266fb890d551c7e84 -->
## api/products/upload

> Example request:

```bash
curl "http://localhost/api/products/upload" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/products/upload",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/products/upload`


<!-- END_c9ceb101ecf927d266fb890d551c7e84 -->
#general
<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## api/users

> Example request:

```bash
curl "http://localhost/api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[
    {
        "id": 1,
        "name": "Carlos",
        "color": "red",
        "email": "carlos@ua.pt",
        "family_id": null,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "name": "Alexandre",
        "color": "blue",
        "email": "alex@ua.pt",
        "family_id": 2,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "name": "Ana",
        "color": "pink",
        "email": "ana@ua.pt",
        "family_id": 2,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 4,
        "name": "Martinho",
        "color": "red",
        "email": "martinho@ua.pt",
        "family_id": 2,
        "created_at": null,
        "updated_at": null
    }
]
```

### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->
<!-- START_4e4753f9744661bac1222d8c1d4f2ff5 -->
## api/users/create

> Example request:

```bash
curl "http://localhost/api/users/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/create`

`HEAD api/users/create`


<!-- END_4e4753f9744661bac1222d8c1d4f2ff5 -->
<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## api/users

> Example request:

```bash
curl "http://localhost/api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users`


<!-- END_12e37982cc5398c7100e59625ebb5514 -->
<!-- START_8f99b42746e451f8dc43742e118cb47b -->
## api/users/{user}

> Example request:

```bash
curl "http://localhost/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name": "Carlos",
    "color": "red",
    "email": "carlos@ua.pt",
    "family_id": null,
    "created_at": null,
    "updated_at": null
}
```

### HTTP Request
`GET api/users/{user}`

`HEAD api/users/{user}`


<!-- END_8f99b42746e451f8dc43742e118cb47b -->
<!-- START_6fd4489b8b8c9812aa72c8e332ce8b39 -->
## api/users/{user}/edit

> Example request:

```bash
curl "http://localhost/api/users/{user}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/{user}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/{user}/edit`

`HEAD api/users/{user}/edit`


<!-- END_6fd4489b8b8c9812aa72c8e332ce8b39 -->
<!-- START_48a3115be98493a3c866eb0e23347262 -->
## api/users/{user}

> Example request:

```bash
curl "http://localhost/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/{user}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/users/{user}`

`PATCH api/users/{user}`


<!-- END_48a3115be98493a3c866eb0e23347262 -->
<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## api/users/{user}

> Example request:

```bash
curl "http://localhost/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/{user}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/users/{user}`


<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->
