# Examen ATC

# Christopher Jaramillo

# Primera parte: Laravel

En el presente repositorio, se encuentra un script de la base de datos creada en MySql y gestionada mediante Workbech.

La primera parte se encuentra en la carpeta ExamenLARAVEL.

![image](https://user-images.githubusercontent.com/65567183/197237168-ec6f3fa4-0e2f-4334-b68b-b56de9376481.png)

Prerequisitos:

- Composer (v2.4.3)

- Laravel (v9.19)

- PHP (8.1.8)

Ejecución:

1. Se debe cambiar la especificación de la base de datos en el archivo enviroment (.env) del proyecto.

![image](https://user-images.githubusercontent.com/65567183/197226577-3cdde991-cfb8-49d0-b7af-6cee11090809.png)

2. Para ejecutar el proyecto se debe ejecutar el comando: php artisan serve.
   Esto se debe realizar dentro del directorio del proyecto desde una consulta de comando externa o propia del IDE.
   
![image](https://user-images.githubusercontent.com/65567183/197228972-ec8e3f76-bfd2-45f8-b55c-a40e17885965.png)

3. Para la prueba de APIS se ha utilizado Postman.

3.1 Métodos GET.

Conductores.
![image](https://user-images.githubusercontent.com/65567183/197236390-2b1260f6-792f-422b-9932-ec2fa741b8cc.png)

Vehículos.
![image](https://user-images.githubusercontent.com/65567183/197236461-80086054-3c94-4f5f-95bd-4b9e1e7f98e9.png)

Asignación de conductor a vehículo.
![image](https://user-images.githubusercontent.com/65567183/197236509-a79b59ff-b752-42ed-9163-4855640d73b8.png)

3.2 Método POST.

Asignación de vehículo a conductores mediante ids de registro de base de datos.
![image](https://user-images.githubusercontent.com/65567183/197236699-c2e1cf2e-1c0b-4d8a-9fee-1d42decf9a09.png)

# Segunda parte: Vue

La segunda parte se encuentra en la carpeta ExamenVUE.

![image](https://user-images.githubusercontent.com/65567183/197237822-40f85512-8e2c-45f3-a5b2-53f3cca7a927.png)

Prerequisitos:

- Node JS (v16.17.0)

- VUE (v5.0.8)

Ejecución

1. Dentro del directorio se ejecuta el comando: npm install.
![image](https://user-images.githubusercontent.com/65567183/197238783-725c557b-1f26-4e13-822d-3ba6f829a847.png)

2. Dentro del directorio se ejecuta el comando: npm run dev
![image](https://user-images.githubusercontent.com/65567183/197238978-4b62d8e5-6f2d-45f2-9a14-37f78b88af0d.png)

3. Las APIS son consumidas desde la proyecto de VUE.
![image](https://user-images.githubusercontent.com/65567183/197240027-da3b3a56-5cad-40d5-9a4c-2a7437a657c7.png)
![image](https://user-images.githubusercontent.com/65567183/197240183-7dfca26c-06f4-438d-a062-e2105d41a832.png)
