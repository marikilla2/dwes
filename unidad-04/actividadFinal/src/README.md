# Gestor de incidencias del aula

Aplicación en PHP para registrar incidencias del aula. Usa sesiones, cookies y subida de imágenes, sin base de datos ni JavaScript.

## Dirección local

http://localhost:8081/login.php

## Credenciales

- **Usuario:** `aula`
- **Contraseña:** `aula123`

## Ejecución

1. Arrancar el contenedor:
   ```bash
   docker compose up -d
   ```
2. Configurar los límites de subida de PHP (cambia `SERVICIO` por el nombre que muestra `docker compose ps`):
   ```bash
   docker compose exec --user root SERVICIO bash -c "printf 'upload_max_filesize=100M\npost_max_size=120M\n' > /usr/local/etc/php/conf.d/uploads.ini"
   docker compose restart SERVICIO
   ```
3. Dar permisos de escritura en `uploads/` al usuario de Apache:
   ```bash
   docker compose exec --user root SERVICIO chown www-data:www-data /var/www/html/uploads
   docker compose exec --user root SERVICIO chmod 750 /var/www/html/uploads
   ```
4. Abrir la dirección local en el navegador e iniciar sesión.

## Archivos

| Archivo            | Función                                                         |
| ------------------ | --------------------------------------------------------------- |
| `login.php`        | Formulario de acceso y comprobación de credenciales             |
| `incidencias.php`  | Listado privado, preferencias de tamaño, vaciar y cerrar sesión |
| `nueva.php`        | Formulario de nueva incidencia con imagen opcional              |
| `preferencias.php` | Guarda o restablece la cookie de tamaño de letra                |
| `vaciar.php`       | Elimina las incidencias de la sesión                            |
| `logout.php`       | Cierra la sesión                                                |
| `uploads/`         | Imágenes subidas (se entrega vacía)                             |
| `trazabilidad/`    | Documento de trazabilidad HTTP, pruebas y capturas              |
