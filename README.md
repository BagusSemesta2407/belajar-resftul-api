# RESTful API by <a href="">Programmer Zaman Now</a>
Buat case sederhana yaitu Contact Management dengan fitur User Management, Contact Management, Address Management

### Buat API Spec
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