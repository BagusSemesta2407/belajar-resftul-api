# RESTful API by <a href="">Programmer Zaman Now</a>
Buat case sederhana yaitu Contact Management dengan fitur User Management, Contact Management, Address Management

### Buat API Spec

buat folder docs/{file}-api.json

#### User API Spec
```
{
    "openapi" : "3.0.3",
    "info" : {
        "title" : "User API",
        "description" : "User API",
        "version" : "1.0.0"
    },
    "servers" : [
        {
            "url" :"http://localhost:8000"
        }
    ],
    "paths" : {
        "/api/users" : {
            "post" : {
                "description" : "Register new user",
                "requestBody" : {
                    "content" : {
                        "application/json" : {
                            "examples" : {
                                "bagus" : {
                                    "description" : "Register user bagus",
                                    "value" : {
                                        "username" : "bagus",
                                        "password" : "password",
                                        "name" : "Bagus Semesta"
                                    }
                                }
                            },
                            "schema" : {
                                "type" : "object",
                                "required" : [
                                    "name", "password", "username"
                                ],
                                "properties" : {
                                    "username" : { 
                                        "type" : "string"
                                    },
                                    "password" : { 
                                        "type" : "string"
                                    },
                                    "name" : { 
                                        "type" : "string"
                                    }
                                }
                            }
                        }
                    }
                },
                "responses" : {
                    "400" : {
                        "description" : "Validation error",
                        "content" : {
                            "application/json" : {
                                "examples":{
                                    "validationerror" : {
                                        "description" : "Validation error",
                                        "value" : {
                                            "errors" : {
                                                "username" : [
                                                    "username must not be blank",
                                                    "username min 6 characters"
                                                ],
                                                "name" : [
                                                    "username must not be blank",
                                                    "username min 6 characters"
                                                ]
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    },
                    "201":{
                        "description" : "Success register user",
                        "content" : {
                            "application/json" : {
                                "examples" : {
                                    "success" : {
                                        "description" : "Success register user",
                                        "value" : {
                                            "data" : {
                                                "id" : 1,
                                                "name" : "Bagus Semesta",
                                                "username" : "bagus"
                                            }
                                        }
                                    }
                                },
                                "schema" : {
                                    "type" : "object",
                                    "properties" : {
                                        "data" : {
                                            "type" : "object",
                                            "properties" : {
                                                "id" : {
                                                    "type" :"number"
                                                },
                                                "username" : {
                                                    "type":"string"
                                                },
                                                "name" : {
                                                    "type" : "string"
                                                }
                                            }
                                        },
                                        "errors" : {
                                            "type" : "object"
                                        }
                                    }
                                }
                            }
                        } 
                    }
                }
            }
        },
        "/api/users/login" : {
            "post" : {
                "description" : "Login user",
                "requestBody" : {
                    "content" : {
                        "application/json" : {
                            "schema" : {
                                "type" : "object",
                                "properties" : {
                                    "username" : {
                                        "type" : "string"
                                    },
                                    "password" : {
                                        "type" : "string"
                                    }
                                }
                            }
                        }
                    }
                },
                "responses" :{
                    "200" : {
                        "description" : "Success login",
                        "content" : {
                            "application/json" : {
                                "schema" : {
                                    "type" : "object",
                                    "properties" : {
                                        "data" : {
                                            "type" : "object",
                                            "properties" : {
                                                "id" : {
                                                    "type" :"number"
                                                },
                                                "username" : {
                                                    "type":"string"
                                                },
                                                "name" : {
                                                    "type" : "string"
                                                },
                                                "token" : {
                                                    "type" : "string"
                                                }
                                            }
                                        },
                                        "errors" : {
                                            "type" : "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        },
        "/api/users/current" : {
            "get" : {
                "description" : "Get current user",
                "parameters" : [
                    {
                        "name" : "Authorization",
                        "in" : "header"
                    }
                ],
                "responses" : {
                    "200" : {
                        "description": "Success get current user",
                        "content" : {
                            "application/json" : {
                                "schema" : {
                                    "type" : "object",
                                    "properties" : {
                                        "data" : {
                                            "type" : "object",
                                            "properties" : {
                                                "id" : {
                                                    "type" :"number"
                                                },
                                                "username" : {
                                                    "type":"string"
                                                },
                                                "name" : {
                                                    "type" : "string"
                                                } 
                                            }
                                        },
                                        "errors" : {
                                            "type" : "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            },
            "patch" : {
                "description" : "Update current user",
                "parameters" : [
                    {
                        "name" : "Authorization",
                        "in" : "header"
                    }
                ],
                "requestBody" : {
                    "description":"Update current user",
                    "content" : {
                        "application/json" : {
                            "schema" : {
                                "type": "object",
                                "properties" : {
                                    "name" : {
                                        "type" : "string"
                                    },
                                    "password" : {
                                        "type" : "string"
                                    }
                                }
                            }
                        }
                    }
                },
                "responses" : {
                    "200" : {
                        "description": "Success update current user",
                        "content" : {
                            "application/json" : {
                                "schema" : {
                                    "type" : "object",
                                    "properties" : {
                                        "data" : {
                                            "type" : "object",
                                            "properties" : {
                                                "id" : {
                                                    "type" :"number"
                                                },
                                                "username" : {
                                                    "type":"string"
                                                },
                                                "name" : {
                                                    "type" : "string"
                                                } 
                                            }
                                        },
                                        "errors" : {
                                            "type" : "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        },
        "/api/users/logout" : {
            "delete" : {
                "description" : "Logout current user",
                "parameters" : [
                    {
                        "name" : "Authorization",
                        "in" : "header"
                    }
                ],
                "responses" : {
                    "200" : {
                        "description": "Success logout current user",
                        "content" : {
                            "application/json" : {
                                "schema" : {
                                    "type" : "object",
                                    "properties" : {
                                        "data" : {
                                            "type" : "boolean"
                                        },
                                        "errors" : {
                                            "type" : "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
```

### Contact API Spec
```
{
    "openapi" : "3.0.3",
    "info" : {
        "title" : "Contact API",
        "description" : "Contact API",
        "version" : "1.0.0"
    },
    "servers" : [
        {
            "url" :"http://localhost:8000"
        }
    ],
    "paths" : {
        "/api/contacts" : {
            "post" : {
                "description" : "Create new contact",
                "parameters" : [
                    {
                        "name" : "Authorization",
                        "in" : "header"
                    }
                ],
                "requestBody" : {
                    "description" : "Create new contact",
                    "content" : {
                        "application/json" : {
                            "schema" : {
                                "type" : "object",
                                "properties" :{
                                    "first_name" : {
                                        "type" : "string"
                                    },
                                    "last_name" : {
                                        "type" : "string"
                                    },
                                    "email" : {
                                        "type" : "string"
                                    },
                                    "phone" : {
                                        "type" : "string"
                                    }
                                }
                            }
                        }
                    }
                },
                "responses" : {
                    "200" : {
                        "description" : "Success create contact",
                        "content" : {
                            "application/json" : {
                                "schema" : {
                                    "type" : "object",
                                    "properties" : {
                                        "data" : {
                                            "type" : "object",
                                            "properties" : {
                                                "id" : {
                                                    "type" : "number"
                                                },
                                                "first_name" : {
                                                    "type" : "string"
                                                },
                                                "last_name" : {
                                                    "type" : "string"
                                                },
                                                "email" : {
                                                    "type" : "string"
                                                },
                                                "phone" : {
                                                    "type" : "string"
                                                }
                                            }
                                        },
                                        "errors" : {
                                            "type" : "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            },
            "get" :{
                "description" : "Search contact",
                "parameters" : [
                    {
                        "name" : "Authorization",
                        "in" : "header"
                    },
                    {
                        "name" : "name",
                        "in" : "query"
                    },
                    {
                        "name" : "phone",
                        "in" : "query"
                    },
                    {
                        "name" : "email",
                        "in" : "query"
                    },
                    {
                        "name" : "size",
                        "in" : "query"
                    },
                    {
                        "name" : "page",
                        "in" : "query"
                    }
                ],
                "responses" : {
                    "200" : {
                        "description" : "Success search contacts",
                        "content" : {
                            "application/json" : {
                                "schema" : {
                                    "type" : "object",
                                    "properties" : {
                                        "data" : {
                                            "type" : "array",
                                            "items" : {
                                                "type" : "object",
                                                "properties" : {
                                                    "id" : {
                                                        "type" : "number"
                                                    },
                                                    "first_name" : {
                                                        "type" : "string"
                                                    },
                                                    "last_name" : {
                                                        "type" : "string"
                                                    },
                                                    "email" : {
                                                        "type" : "string"
                                                    },
                                                    "phone" : {
                                                        "type" : "string"
                                                    }   
                                                }
                                            }
                                        },
                                        "errors" : {
                                            "type" : "object"
                                        },
                                        "meta" : {
                                            "type" : "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        },
        "/api/contacts/{id}" : {
            "put" : {
                "description" : "Update contact",
                "parameters" : [
                    {
                        "name" : "Authorization",
                        "in" : "header"
                    },
                    {
                        "name" : "id",
                        "in" : "path"
                    }
                ],
                "requestBody" : {
                    "description" : "Update contact",
                    "content" : {
                        "application/json" : {
                            "schema" : {
                                "type" : "object",
                                "properties" :{
                                    "first_name" : {
                                        "type" : "string"
                                    },
                                    "last_name" : {
                                        "type" : "string"
                                    },
                                    "email" : {
                                        "type" : "string"
                                    },
                                    "phone" : {
                                        "type" : "string"
                                    }
                                }
                            }
                        }
                    }
                },
                "responses" : {
                    "200" : {
                        "description" : "Success update contact",
                        "content" : {
                            "application/json" : {
                                "schema" : {
                                    "type" : "object",
                                    "properties" : {
                                        "data" : {
                                            "type" : "object",
                                            "properties" : {
                                                "id" : {
                                                    "type" : "number"
                                                },
                                                "first_name" : {
                                                    "type" : "string"
                                                },
                                                "last_name" : {
                                                    "type" : "string"
                                                },
                                                "email" : {
                                                    "type" : "string"
                                                },
                                                "phone" : {
                                                    "type" : "string"
                                                }
                                            }
                                        },
                                        "errors" : {
                                            "type" : "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            },
            "get" : {
                "description" : "Get contact",
                "parameters" : [
                    {
                        "name" : "Authorization",
                        "in" : "header"
                    },
                    {
                        "name" : "id",
                        "in" : "path"
                    }
                ],
                "responses" : {
                    "200" : {
                        "description" : "Success get contact",
                        "content" : {
                            "application/json" : {
                                "schema" : {
                                    "type" : "object",
                                    "properties" : {
                                        "data" : {
                                            "type" : "object",
                                            "properties" : {
                                                "id" : {
                                                    "type" : "number"
                                                },
                                                "first_name" : {
                                                    "type" : "string"
                                                },
                                                "last_name" : {
                                                    "type" : "string"
                                                },
                                                "email" : {
                                                    "type" : "string"
                                                },
                                                "phone" : {
                                                    "type" : "string"
                                                }
                                            }
                                        },
                                        "errors" : {
                                            "type" : "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            },
            "delete" : {
                "description" : "Remove contact",
                "parameters" : [
                    {
                        "name" : "Authorization",
                        "in" : "header"
                    },
                    {
                        "name" : "id",
                        "in" : "path"
                    }
                ],
                "responses" : {
                    "200" : {
                        "description" : "Success delete contact",
                        "content" : {
                            "application/json" : {
                                "schema" : {
                                    "type" : "object",
                                    "properties" : {
                                        "data" : {
                                            "type" : "boolean"
                                        },
                                        "errors" : {
                                            "type" : "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
```

### Address API Spec
```
{
    "openapi": "3.0.3",
    "info": {
        "title": "Address API",
        "description": "Address API",
        "version": "1.0.0"
    },
    "servers": [
        {
            "url": "http://localhost:8000"
        }
    ],
    "paths": {
        "/api/contacts/{idContact}/addresses": {
            "post": {
                "description": "Create new address",
                "parameters": [
                    {
                        "name": "Authorization",
                        "in": "header"
                    },
                    {
                        "name": "idContact",
                        "in": "path"
                    }
                ],
                "requestBody": {
                    "description": "Create new address",
                    "content": {
                        "application/json" : {
                            "schema": {
                                "type": "object",
                                "properties": {
                                    "street" : {
                                        "type": "string"
                                    },
                                    "city" : {
                                        "type": "string"
                                    },
                                    "province" : {
                                        "type": "string"
                                    },
                                    "country" : {
                                        "type": "string"
                                    },
                                    "postal_code" : {
                                        "type": "string"
                                    }
                                }
                            }
                        }
                    }
                },
                "responses": {
                    "201": {
                        "description": "Success create address",
                        "content": {
                            "application/json" : {
                                "schema": {
                                    "type": "object",
                                    "properties": {
                                        "data" : {
                                            "type": "object",
                                            "properties": {
                                                "id" : {
                                                    "type": "number"
                                                },
                                                "street" : {
                                                    "type": "string"
                                                },
                                                "city" : {
                                                    "type": "string"
                                                },
                                                "province" : {
                                                    "type": "string"
                                                },
                                                "country" : {
                                                    "type": "string"
                                                },
                                                "postal_code" : {
                                                    "type": "string"
                                                }
                                            }
                                        },
                                        "errors" : {
                                            "type": "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            },
            "get": {
                "description": "Get list addresses",
                "parameters": [
                    {
                        "name": "Authorization",
                        "in": "header"
                    },
                    {
                        "name": "idContact",
                        "in": "path"
                    }
                ],
                "responses": {
                    "200" : {
                        "description": "List addresses",
                        "content": {
                            "application/json" : {
                                "schema": {
                                    "type": "object",
                                    "properties": {
                                        "data": {
                                            "type": "array",
                                            "items": {
                                                "type": "object",
                                                "properties": {
                                                    "id" : {
                                                        "type": "number"
                                                    },
                                                    "street" : {
                                                        "type": "string"
                                                    },
                                                    "city" : {
                                                        "type": "string"
                                                    },
                                                    "province" : {
                                                        "type": "string"
                                                    },
                                                    "country" : {
                                                        "type": "string"
                                                    },
                                                    "postal_code" : {
                                                        "type": "string"
                                                    }
                                                }
                                            }
                                        },
                                        "errors" : {
                                            "type": "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        },
        "/api/contacts/{idContact}/addresses/{idAddress}": {
            "get": {
                "description": "Get address",
                "parameters": [
                    {
                        "name": "Authorization",
                        "in": "header"
                    },
                    {
                        "name": "idContact",
                        "in": "path"
                    },
                    {
                        "name": "idAddress",
                        "in": "path"
                    }
                ],
                "responses": {
                    "200": {
                        "description": "Success create address",
                        "content": {
                            "application/json" : {
                                "schema": {
                                    "type": "object",
                                    "properties": {
                                        "data" : {
                                            "type": "object",
                                            "properties": {
                                                "id" : {
                                                    "type": "number"
                                                },
                                                "street" : {
                                                    "type": "string"
                                                },
                                                "city" : {
                                                    "type": "string"
                                                },
                                                "province" : {
                                                    "type": "string"
                                                },
                                                "country" : {
                                                    "type": "string"
                                                },
                                                "postal_code" : {
                                                    "type": "string"
                                                }
                                            }
                                        },
                                        "errors" : {
                                            "type": "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            },
            "put": {
                "description": "Update address",
                "parameters": [
                    {
                        "name": "Authorization",
                        "in": "header"
                    },
                    {
                        "name": "idContact",
                        "in": "path"
                    },
                    {
                        "name": "idAddress",
                        "in": "path"
                    }
                ],
                "requestBody": {
                    "description": "Update existing contact address",
                    "content": {
                        "application/json" : {
                            "schema": {
                                "type": "object",
                                "properties": {
                                    "street" : {
                                        "type": "string"
                                    },
                                    "city" : {
                                        "type": "string"
                                    },
                                    "province" : {
                                        "type": "string"
                                    },
                                    "country" : {
                                        "type": "string"
                                    },
                                    "postal_code" : {
                                        "type": "string"
                                    }
                                }
                            }
                        }
                    }
                },
                "responses": {
                    "200": {
                        "description": "Success create address",
                        "content": {
                            "application/json" : {
                                "schema": {
                                    "type": "object",
                                    "properties": {
                                        "data" : {
                                            "type": "object",
                                            "properties": {
                                                "id" : {
                                                    "type": "number"
                                                },
                                                "street" : {
                                                    "type": "string"
                                                },
                                                "city" : {
                                                    "type": "string"
                                                },
                                                "province" : {
                                                    "type": "string"
                                                },
                                                "country" : {
                                                    "type": "string"
                                                },
                                                "postal_code" : {
                                                    "type": "string"
                                                }
                                            }
                                        },
                                        "errors" : {
                                            "type": "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            },
            "delete": {
                "description": "Delete address",
                "parameters": [
                    {
                        "name": "Authorization",
                        "in": "header"
                    },
                    {
                        "name": "idContact",
                        "in": "path"
                    },
                    {
                        "name": "idAddress",
                        "in": "path"
                    }
                ],
                "responses": {
                    "200" : {
                        "description": "Success delete",
                        "content": {
                            "application/json" : {
                                "schema": {
                                    "type": "object",
                                    "properties": {
                                        "data" : {
                                            "type": "boolean"
                                        },
                                        "errors" : {
                                            "type": "object"
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
```