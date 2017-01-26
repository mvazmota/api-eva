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
            "start_time": "12h30",
            "end_time": "16h30",
            "location": "Aveiro",
            "created_by": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "title": "Festa da Catarina2",
            "date": "22\/01\/2017",
            "start_time": "12h30",
            "end_time": null,
            "location": "Aveiro",
            "created_by": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "title": "Festa da Catarina",
            "date": "12\/02\/2017",
            "start_time": "12h30",
            "end_time": null,
            "location": "Aveiro",
            "created_by": 2,
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
        "start_time": "12h30",
        "end_time": "16h30",
        "location": "Aveiro",
        "created_by": 1,
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
<!-- START_6d72cd5c1356ffe56dbf1392b5e71381 -->
## Add User

Inserts a user to a list in the database

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
`POST api/events/{event}/users`


<!-- END_6d72cd5c1356ffe56dbf1392b5e71381 -->
<!-- START_3c8037cb1ca9f386598217fd9c40627e -->
## Remove User

Deletes a user from a list in the database

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
`DELETE api/events/{event}/users`


<!-- END_3c8037cb1ca9f386598217fd9c40627e -->
#Families

Controller for family related operations
<!-- START_51aa80b48c1499b9df54721d0e820ad5 -->
## List all Families

Lists all families in the database

> Example request:

```bash
curl "http://localhost/api/families" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/families",
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
            "name": "Silva",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "name": "Mota",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/families`

`HEAD api/families`


<!-- END_51aa80b48c1499b9df54721d0e820ad5 -->
<!-- START_0a31013373952b88a8f7f64bc56927c2 -->
## Family Insert

Inserts a family in the database

> Example request:

```bash
curl "http://localhost/api/families" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/families",
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
`POST api/families`


<!-- END_0a31013373952b88a8f7f64bc56927c2 -->
<!-- START_2f896a105a3b82ae9255af3310a6e1e6 -->
## Family Detail

Gives the details of a family

> Example request:

```bash
curl "http://localhost/api/families/{family}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/families/{family}",
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
        "name": "Silva",
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/families/{family}`

`HEAD api/families/{family}`


<!-- END_2f896a105a3b82ae9255af3310a6e1e6 -->
<!-- START_e3c71128512329ce56ead73a5e468f40 -->
## Family Update

Update a family in the database

> Example request:

```bash
curl "http://localhost/api/families/{family}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/families/{family}",
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
`PUT api/families/{family}`

`PATCH api/families/{family}`


<!-- END_e3c71128512329ce56ead73a5e468f40 -->
<!-- START_f162693aa72c2b006cbecaa269c1ca1f -->
## Delete Family

Deletes a family in the database

> Example request:

```bash
curl "http://localhost/api/families/{family}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/families/{family}",
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
`DELETE api/families/{family}`


<!-- END_f162693aa72c2b006cbecaa269c1ca1f -->
<!-- START_6dca8a0dd2189996e742a3819cdc719a -->
## Get Family Users

Lists the users of a Family

> Example request:

```bash
curl "http://localhost/api/families/{family}/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/families/{family}/users",
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
`GET api/families/{family}/users`

`HEAD api/families/{family}/users`


<!-- END_6dca8a0dd2189996e742a3819cdc719a -->
<!-- START_d0f9ee403cea4164874149feeea61dc5 -->
## Owners of a Family

Returns the users that own a family

> Example request:

```bash
curl "http://localhost/api/families/{family}/owners" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/families/{family}/owners",
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
`GET api/families/{family}/owners`

`HEAD api/families/{family}/owners`


<!-- END_d0f9ee403cea4164874149feeea61dc5 -->
<!-- START_68f1fd0bf03f784691b85f4e5ccd1cd8 -->
## Add Owners

Inserts a owner to a family in the database

> Example request:

```bash
curl "http://localhost/api/families/{family}/owners" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/families/{family}/owners",
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
`POST api/families/{family}/owners`


<!-- END_68f1fd0bf03f784691b85f4e5ccd1cd8 -->
<!-- START_27d10428295b736f3157bbe412bc499c -->
## Remove Owner

Deletes a owner from a family in the database

> Example request:

```bash
curl "http://localhost/api/families/{family}/owners" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/families/{family}/owners",
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
`DELETE api/families/{family}/owners`


<!-- END_27d10428295b736f3157bbe412bc499c -->
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
            "name": "Casa",
            "icon": "casa",
            "created_by": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "name": "Festa Joana",
            "icon": "prenda",
            "created_by": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "name": "Passagem de Ano",
            "icon": "trabalho",
            "created_by": 2,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "name": "teste2",
            "icon": "natal",
            "created_by": 1,
            "created_at": "2017-01-26 16:11:22",
            "updated_at": "2017-01-26 16:11:22"
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
        "name": "Casa",
        "icon": "casa",
        "created_by": 1,
        "created_at": null,
        "updated_at": null
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
## Add Users

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
## Remove Users

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
    "status": 200,
    "msg": "OK",
    "data": [
        {
            "id": 1,
            "title": "Bananas",
            "description": "Comprar as mais baratas!",
            "quant": "1 cacho",
            "image": "",
            "list_id": 1,
            "created_by": 1,
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
            "created_by": 1,
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
            "created_by": 2,
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
            "created_by": 2,
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
            "created_by": 3,
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
            "created_by": 1,
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
            "created_by": 2,
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
            "created_by": 3,
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
            "created_by": 4,
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
    "status": 200,
    "msg": "OK",
    "data": {
        "id": 1,
        "title": "Bananas",
        "description": "Comprar as mais baratas!",
        "quant": "1 cacho",
        "image": "",
        "list_id": 1,
        "created_by": 1,
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
    "error": "Unauthenticated."
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
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/{user}`

`HEAD api/users/{user}`


<!-- END_8f99b42746e451f8dc43742e118cb47b -->
<!-- START_48a3115be98493a3c866eb0e23347262 -->
## User Update

Update a user in the database

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
{
    "error": "Unauthenticated."
}
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
{
    "error": "Unauthenticated."
}
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
{
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/users/{user}/family`

`HEAD api/users/{user}/family`


<!-- END_86b2a4d19352454372202146ec95b92d -->
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
    "error": "Unauthenticated."
}
```

### HTTP Request
`GET api/user`

`HEAD api/user`


<!-- END_2ea88ff35aa222f5582e50f39a2b35fd -->
