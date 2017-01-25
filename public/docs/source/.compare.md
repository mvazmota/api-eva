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

#Events

Controller for event related operations
<!-- START_0f5e59e5d39a318daed6631442199c5d -->
## List all Events

Lists all events in the database

> Example request:

```bash
curl "http://localhost/api/events" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/events",
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
    "status": 200,
    "msg": "OK",
    "data": [
        {
            "id": 1,
            "title": "Festa da Catarina",
            "date": "09\/01\/2017",
            "time": "12h30",
            "location": "Aveiro",
            "description": "Que festa que vai ser!",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "title": "Festa da Catarina2",
            "date": "22\/01\/2017",
            "time": "12h30",
            "location": "Aveiro",
            "description": "Que festa que vai ser!",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "title": "Festa da Catarina",
            "date": "12\/02\/2017",
            "time": "12h30",
            "location": "Aveiro",
            "description": "Que festa que vai ser!",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/events`

`HEAD api/events`


<!-- END_0f5e59e5d39a318daed6631442199c5d -->
<!-- START_de3413bf02c9bb71627fa96e1c1c409f -->
## Event Insert

Inserts an event in the database

> Example request:

```bash
curl "http://localhost/api/events" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/events",
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
`POST api/events`


<!-- END_de3413bf02c9bb71627fa96e1c1c409f -->
<!-- START_c54bb5cf8265a0ccd3737adca15dfb18 -->
## Event Detail

Gives the details of a event

> Example request:

```bash
curl "http://localhost/api/events/{event}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/events/{event}",
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
    "status": 200,
    "msg": "OK",
    "data": {
        "id": 1,
        "title": "Festa da Catarina",
        "date": "09\/01\/2017",
        "time": "12h30",
        "location": "Aveiro",
        "description": "Que festa que vai ser!",
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/events/{event}`

`HEAD api/events/{event}`


<!-- END_c54bb5cf8265a0ccd3737adca15dfb18 -->
<!-- START_d16967fd1d3d935666f7e8112a1a4451 -->
## Event Update

Update an event in the database

> Example request:

```bash
curl "http://localhost/api/events/{event}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/events/{event}",
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
`PUT api/events/{event}`

`PATCH api/events/{event}`


<!-- END_d16967fd1d3d935666f7e8112a1a4451 -->
<!-- START_379a30feb2949828b5f95efbfd7649c3 -->
## Delete Event

Deletes an event in the database

> Example request:

```bash
curl "http://localhost/api/events/{event}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/events/{event}",
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
`DELETE api/events/{event}`


<!-- END_379a30feb2949828b5f95efbfd7649c3 -->
<!-- START_0950a4da92a2c2dfccd656f9df9ea43e -->
## Users of a Event

Returns the users linked to an event

> Example request:

```bash
curl "http://localhost/api/events/{event}/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/events/{event}/users",
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
`GET api/events/{event}/users`

`HEAD api/events/{event}/users`


<!-- END_0950a4da92a2c2dfccd656f9df9ea43e -->
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
{
    "status": 0,
    "msg": "OK",
    "data": [
        {
            "id": 1,
            "name": "Silva",
            "created_at": null,
            "updated_at": null
        },
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
}
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
{
    "status": 0,
    "msg": "OK",
    "data": {
        "id": 1,
        "name": "Silva",
        "created_at": null,
        "updated_at": null
    }
}
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
{
    "status": 200,
    "msg": "OK",
    "data": [
        {
            "id": 1,
            "name": "Event test2",
            "icon": "natal",
            "created_at": null,
            "updated_at": "2017-01-24 15:44:11"
        },
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
            "name": "Event test2",
            "icon": "natal",
            "created_at": "2017-01-24 15:41:20",
            "updated_at": "2017-01-24 15:41:20"
        }
    ]
}
```

### HTTP Request
`GET api/lists`

`HEAD api/lists`


<!-- END_2535121d38b5231985e5394363ce74e1 -->
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
{
    "status": 200,
    "msg": "OK",
    "data": {
        "id": 1,
        "name": "Event test2",
        "icon": "natal",
        "created_at": null,
        "updated_at": "2017-01-24 15:44:11"
    }
}
```

### HTTP Request
`GET api/lists/{list}`

`HEAD api/lists/{list}`


<!-- END_ea2a7ee423318c58030a68197e50cf45 -->
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

Returns the users linked to a list

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
## Add User

Inserts a user to a list in the database

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
<!-- START_f03e909c4a9ba65a080628887a9a442b -->
## Remove User

Deletes a user from a list in the database

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
`DELETE api/lists/{list}/users`


<!-- END_f03e909c4a9ba65a080628887a9a442b -->
<!-- START_1ddf7af8bf64c4c731a227b1fb9ebb76 -->
## Get List Products

Shows the users of a list

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

Lists all products in the database

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
{
    "status": 0,
    "msg": "OK",
    "data": [
        {
            "id": 1,
            "title": "Bananas",
            "description": "Comprar as mais baratas!",
            "quant": "1 cacho",
            "image": "",
            "list_id": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "title": "Laranjas",
            "description": "Comprar as mais baratas!",
            "quant": "6",
            "image": "",
            "list_id": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "title": "Café",
            "description": "Comprar as mais baratas!",
            "quant": "2 pacotes",
            "image": "",
            "list_id": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "title": "Bananas",
            "description": "Comprar as mais baratas!",
            "quant": "1 cacho",
            "image": "",
            "list_id": 3,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 5,
            "title": "Laranjas",
            "description": "Comprar as mais baratas!",
            "quant": "6",
            "image": "",
            "list_id": 2,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 6,
            "title": "Café",
            "description": "Comprar as mais baratas!",
            "quant": "2 pacotes",
            "image": "",
            "list_id": 2,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 7,
            "title": "Bananas",
            "description": "Comprar as mais baratas!",
            "quant": "1 cacho",
            "image": "",
            "list_id": 3,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 8,
            "title": "Laranjas",
            "description": "Comprar as mais baratas!",
            "quant": "6",
            "image": "",
            "list_id": 3,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 9,
            "title": "Café",
            "description": "Comprar as mais baratas!",
            "quant": "2 pacotes",
            "image": "",
            "list_id": 3,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/products`

`HEAD api/products`


<!-- END_d6315c0f80fdc5b8b5cafcb7768d054e -->
<!-- START_05b4383f00fd57c4828a831e7057e920 -->
## Product Insert

Inserts a product in the database

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
## Products Detail

Shows the details of a product

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
{
    "status": 0,
    "msg": "OK",
    "data": {
        "id": 1,
        "title": "Bananas",
        "description": "Comprar as mais baratas!",
        "quant": "1 cacho",
        "image": "",
        "list_id": 1,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/products/{product}`

`HEAD api/products/{product}`


<!-- END_963ec11fd78da94f0900b0c6baf959a3 -->
<!-- START_1d809ca5e8b10fa7fdc75d04506a55ea -->
## Product Delete

Deletes a product in the database

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
<!-- START_7ad6b2dbfbd58a7c201ba85e185e0eb4 -->
## Product Update

Updates a product in the database

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
`POST api/products/{product}`


<!-- END_7ad6b2dbfbd58a7c201ba85e185e0eb4 -->
#Users

Controller for user related operations
<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## List all Users

Lists all users in the database

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
{
    "status": 200,
    "msg": "OK",
    "data": [
        {
            "id": 1,
            "name": "Carlos",
            "color": "red",
            "email": "carlos@ua.pt",
            "birthday": "22\/10\/2000",
            "family_id": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "name": "Alexandre",
            "color": "blue",
            "email": "alex@ua.pt",
            "birthday": "22\/10\/2000",
            "family_id": 2,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "name": "Ana",
            "color": "pink",
            "email": "ana@ua.pt",
            "birthday": "22\/10\/2000",
            "family_id": 2,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "name": "Martinho",
            "color": "red",
            "email": "martinho@ua.pt",
            "birthday": "22\/10\/2000",
            "family_id": 2,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 5,
            "name": "Catarina",
            "color": "yellow",
            "email": "cat@ua.pt",
            "birthday": "22\/10\/2000",
            "family_id": 2,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->
<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## User Insert

Inserts a user in the database

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
## User Detail

Gives the details of a user

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
    "status": 200,
    "msg": "OK",
    "data": {
        "id": 1,
        "name": "Carlos",
        "color": "red",
        "email": "carlos@ua.pt",
        "birthday": "22\/10\/2000",
        "family_id": null,
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/users/{user}`

`HEAD api/users/{user}`


<!-- END_8f99b42746e451f8dc43742e118cb47b -->
<!-- START_48a3115be98493a3c866eb0e23347262 -->
## User Update

Update a family in the database

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
## Delete User

Deletes a user in the database

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
<!-- START_2ea88ff35aa222f5582e50f39a2b35fd -->
## Authenticate User

Authenticate a user in the database

> Example request:

```bash
curl "http://localhost/api/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/user",
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
    "status": 200,
    "msg": "OK",
    "data": null
}
```

### HTTP Request
`GET api/user`

`HEAD api/user`


<!-- END_2ea88ff35aa222f5582e50f39a2b35fd -->
<!-- START_d2a1e462baf2dbbe6836e5367388a5ed -->
## Lists of a User

Returns the lists of a user

> Example request:

```bash
curl "http://localhost/api/users/{user}/lists" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/{user}/lists",
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
`GET api/users/{user}/lists`

`HEAD api/users/{user}/lists`


<!-- END_d2a1e462baf2dbbe6836e5367388a5ed -->
<!-- START_44a387fde23b81c87db08ac5b063091e -->
## Events of a User

Returns the lists of a user

> Example request:

```bash
curl "http://localhost/api/users/{user}/events" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/{user}/events",
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
`GET api/users/{user}/events`

`HEAD api/users/{user}/events`


<!-- END_44a387fde23b81c87db08ac5b063091e -->
<!-- START_86b2a4d19352454372202146ec95b92d -->
## Family of a User

Returns the users that belong to the family of a user

> Example request:

```bash
curl "http://localhost/api/users/{user}/family" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/{user}/family",
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
`GET api/users/{user}/family`

`HEAD api/users/{user}/family`


<!-- END_86b2a4d19352454372202146ec95b92d -->
