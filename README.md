Cakephp2-Simple-ACL
===================

Objetivo
========

-- Crear un proyecto base con el manejo y control de accesos de usuarios

Instalar
=========

1. Descargar el proyecto
2. Instalar la BD -> Esta en el archivo cakephpacl.sql que esta en el ROOT del proyecto
3. Comentar y Decomentar las siguientes lineas
    3.1. En el Archivo GroupsController.php descomentar la Linea 38, esto permitira agregar el primer grupo que debe ser el grupo de administradores. Debes entrar por url a /groups/add/ colocar el nombre que quieras para tu grupo administrador y listo.
    3.2. Comentar la Linea 38 de GroupsController.php
    3.3. En el Archivo UsersController.php descomentar la Linea 44, esto permitira agregar el primer usuario en el grupo de administrador que es el unico creado hasta el momento. Debes entrar por url a /users/register colocas tu usuario, tu clave, seleccionas el grupo administrador, guardas y listo.
    3.3. Comentar linea 44 de UsersController.php
4. Al Iniciar sesión como el usuario que acabas de crear en users/login te arrojara un error como este "DbAcl::check() - Failed ARO/ACO node lookup in permissions check. Node references:" esto se debe a que no haz sync los accesos, es sencillo resolverlo solo debes colocar en la url "users/login" luego que cargue coloca esta ruta "users/initDB" esto sincronizara las funciones creadas y le dara acceso total al grupo 1 que es el administrador.
5.Listo ya con esto lo tienes instalado y con el usuario que tiene acceso a todo el sistema.

Funciones
=========
1. /users/login = Iniciar Sesión en el sistema
2. /users/logout =  Forzar el cierre de sesion
3. /users/home = Función principal al iniciar sesion
4. /user/initDB = Función importante para sincronizar una nueva función creada/borrada a nuestro ACL "Lista de control de acceso"
5. /users/register = Función para insertar un nuevo usuario
7. /users/acladmin = Administrador de permisos de los grupos creados
6. /groups/add = Permite agregar un Grupo


    
