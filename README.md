# verdurasoft
Aplicativo para la venta de verduras online (SENA)

Se esta usando:
XAMPP 7.3 (PHP 7.3.0, MariaDB 10.1, Apache 2)

-------------------------------------------------------------------------------
- Carpeta admin: En esta carpeta se ubicada todo el front-end del administrador.(NICOL - VICTOR)
    - Carpeta css: se ubica todos los estilos del panel de administracion.
    - Carpeta js: se ubica todo el javascript que requiere el panel de administracion.
    - Carpeta img: se ubican todas la imagenes que se usara en el panel de administracion.
        - Carpeta avatar: se ubicaran todas las fotos de perfil de los administradores.
        - Carpeta productos: se ubicaran todas las fotos de los productos que se suban a la base de datos.
    - Carpeta views: se ubica todas las vistas (paginas) que usan el panel de administracion.
        - Carpeta login: se ubica las vistas especiales para el inicio de sesion del administrador.
     - Archivo index.php: es la pagina de inicio del panel de administracion.
-------------------------------------------------------------------------------
- Carpeta controller: En esta se ubicada todo el back-end del aplicativo.(DAVID - CAMILO)
    - Carpeta admins: se ubica todos los archivos CRUD del administrador.
    - Carpeta compras: se ubica todos los archivos CRUD de las compras.
    - Carpeta productos: se ubica todos los archivos CRUD de los productos.
    - Carpeta usuarios: se ubica todos los archivos CRUD de los usuarios.
    - Archivo conexion.php: sirve para conectarse a la base de datos, debe de ser incluido en cada archivo CRUD.
-------------------------------------------------------------------------------
- Carpeta documents: En esta se ubicada toda la documentacion del aplicativo. (FRANDERSON)
    - Archivo Modelo_ER: se ejecuta con mysql workbench 6.0, mustra el modelo entidad-relacion de la base de datos del aplicativo.
-------------------------------------------------------------------------------
- Carpeta public: En esta carpeta se ubicada todo el front-end de la pagina web que ve el usuario.(NICOL - VICTOR)
    - Carpeta css: se ubica todos los estilos de las paginas web.
    - Carpeta js: se ubica todo el javascript que requiere la pagina web.
    - Carpeta img: se ubican todas la imagenes que se usara en la pagina web.
    - Carpeta views: se ubica todas las vistas (paginas) que usan en la pagina web.
        - Carpeta login: se ubica las vistas especiales para el inicio de sesion del usuario.
-------------------------------------------------------------------------------
- Archivo index.php: es la pagina de inicio de la pagina web de verdurasoft.com que veran los usuarios.

-------------------------------------------------------
los archivos se deben llamar:
que hace - punto - a quien afecta - punto - php
EJ: crear.usuarios.php
    ver.productos.php

palabras compuestas en camelcase:
EJ: inicioSession.usuario.php
    restaurarPassword.admin.php
