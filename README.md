# PHP API REST - Test para Satoshi T.

Este es el repositorio de un proyecto que realicé para un test,  para el mismo debia realizar una api restful la cual debia tener un crud de productos, el proyecto debia realizarse puramente en php sin utilizar ningún framework.
La estructura de archivos es sencilla, es un MVC que contiene:

- Tiene por un lado el core / bootstrap, archivo config. 
- Un pequeño contenedor de depencias, 
- Un router que fue lo que más que me gustó realizar aunque es muy básico y aún le falta muchisimo por mejorar permite apuntar una url según el http method a un controller y un action especifico. 
- Un QueryBuilder para interactuar con la base de datos ( SELECT ALL, FINDBYID, INSER,UPDATE, DELETE )
- Controladores
- Vistas.

Debido al poco tiempo disponible que tengo definiria este proyecto como v0.01. 

Debajo dejo la lista de TODOs, la información de los WS disponibles y también la configuración a realizar para que funcione correctamente el proyecto.

También incluyo un archivo sql (database.sql) con el dump de la base de datos de prueba.


### TODO

 - Devolver un http status code especifico para cada tipo de respuesta
 - Usar namespaces
 - Crear sistema de validación de parametros
 - Optimizar el router 
 - Crear un sistema de autenticación con token para los servicios
 - Crear un controlador de errores / excepciones


### API DOC

#### List products
**URL:**

    http://195.201.100.59/products

**Metodo:**

  `GET`

**REQUEST de ejemplo:**

  ```
   curl -X GET \
  http://195.201.100.59/products/ \
  -H 'Cache-Control: no-cache' \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'Postman-Token: 4210e004-6ef5-6bc3-cb17-d15c22a4e6bd'
  ```
  **RESPONSE**

  [![GET](https://i.imgur.com/8pTzRsd.png)](https://i.imgur.com/8pTzRsd.png)
  
  
#### Create product
**URL:**

    http://195.201.100.59/products

**Metodo:**

  `POST`

**Parametros:**


| Param Name | Param Description |
----------|:----------:|
| Name | Nombre del producto - VARCHAR(45) |
| Description | Descripción del producto -  VARCHAR(100) |
| Size | Talle o talles del producto- VARCHAR(25) |
| Price | Precio del producto - INT(11) |

**REQUEST de ejemplo:**

  ```
   curl -X POST \
  http://195.201.100.59/products \
  -H 'Cache-Control: no-cache' \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'Postman-Token: cb087398-edde-d39a-3613-961de178442b' \
  -d 'name=Sratcher%20itcher&description=Nuevo%20rascador&size=XLXL&price=900'
  ```
  **RESPONSE**

  [![POST](https://i.imgur.com/jlM1Wfa.png)](https://i.imgur.com/jlM1Wfa.png)
  
  
#### Update product
**URL:**

    http://195.201.100.59/products/{ID}

**Metodo:**

  `PUT`

**Parametros:**

| Param Name | Param Description |
----------|:----------:|
| Name | Nombre del producto - VARCHAR(45) |
| Description | Descripción del producto -  VARCHAR(100) |
| Size | Talle o talles del producto- VARCHAR(25) |
| Price | Precio del producto - INT(11) |

**REQUEST de ejemplo:**

  ```
  curl -X PUT \
  http://195.201.100.59/products/{ID} \
  -H 'Cache-Control: no-cache' \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'Postman-Token: 8753fa50-ba90-2afd-0942-55d15b4eeaf6' \
  -d 'name=Scratcher&description=Rascador%20de%20espaldas&size=XS&price=100'
  ```
  **RESPONSE**

  [![POST](https://i.imgur.com/5sTMkVt.png)](https://i.imgur.com/5sTMkVt.png)
  
  
#### Delete product
**URL:**

    http://195.201.100.59/products/{ID}

**Metodo:**

  `DELETE`

**REQUEST de ejemplo:**

  ```
  curl -X DELETE \
  http://195.201.100.59/products/{ID} \
  -H 'Cache-Control: no-cache' \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'Postman-Token: 28b70566-bd74-722c-cbea-b8b6ee419c8a'
  ```
  **RESPONSE**

  [![POST](https://i.imgur.com/mqmkGpA.png)](https://i.imgur.com/mqmkGpA.png)


##IMPORTANTE

Para el correcto funcionamiento es necesario configurar apache con AllowOverride all , crear un .htaccess en la raiz del proyecto con la siguiente informacion
  ```
  RewriteEngine on
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule ^.*$ index.php [END]
    ```
