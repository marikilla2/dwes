# Gestor de incidencias del aula

## Dirección local

http://localhost:8081/login.php

## Credenciales

- Usuario: aula
- Contraseña: aula123

## Ejecución

1. `docker compose up -d`
2. Configurar los límites de PHP: upload_max_filesize=100M y post_max_size=120M.
3. Dar permisos de escritura a uploads/ para www-data.
4. Abrir la dirección local en el navegador.
