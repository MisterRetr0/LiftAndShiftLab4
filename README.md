# Lift and Shift - Laboratorio 4

Aplicación PHP (MVC) llevada a Docker sin reescribirla.

## Cómo correrla

```
docker compose up --build
```

- Aplicación: http://localhost:8067
- phpMyAdmin: http://localhost:8085 (usuario `root`, clave `clave_secreta_nube`)

## Qué se agregó

| Archivo | Para qué |
|---|---|
| `Dockerfile` | PHP 8.2 con Apache, PDO MySQL y mod_rewrite |
| `docker-compose.yml` | La app, MySQL 8 y phpMyAdmin |
| `db/init.sql` | Crea la tabla `contactos` al iniciar |
| `views/gustos.php` | Sección "Mis gustos personales" |
| `assets/js/dibujo.js` | Dibujo sobre el fondo en Contacto |
| `assets/img/` | Imágenes de fondo y personajes |

## Qué se modificó

| Archivo | Cambio |
|---|---|
| `conexion.php` | El host pasó de `localhost` a `db-mysql` |
| `models/ContactoModel.php` | Guarda también correo y comentario |
| `controllers/SiteController.php` | Lee los campos nuevos y agrega la ruta `/gustos` |
| `views/contacto.php` | Formulario con nombre, correo y comentario |
| `views/header.php` y `footer.php` | Un tema y personajes distintos por sección |
| `assets/css/estilos.css` | Nuevo estilo (liquid glass) |

Nota: se usa el puerto 8067 porque el 8080 estaba ocupado en mi equipo.

## Uso de Claude

Usé Claude (asistente de IA de Anthropic) como apoyo en dos cosas:

- **Comandos:** me recordó comandos básicos de Docker.
- **Interfaz:** me ayudó con detalles pequeños del diseño.

El resto del laboratorio lo hice yo.