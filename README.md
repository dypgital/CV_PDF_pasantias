# Sistema de Generación de CV en PDF

## Requisitos del Sistema
- PHP 7.4 o superior
- Composer
- MySQL/MariaDB
- Servidor web (Apache/Nginx)

## Instalación

1. Clonar el repositorio:
```bash
git clone <url-del-repositorio>
cd <directorio-del-proyecto>
```

2. Instalar dependencias:
```bash
composer install
```

3. Configurar la base de datos:
- Crear una base de datos en MySQL
- Importar el archivo `db.sql`
- Configurar las credenciales de la base de datos en `db.php`

4. Configurar permisos:
```bash
chmod 755 uploads/
```

## Configuración del Servidor Web

### Apache
Asegúrate de que el archivo `.htaccess` tenga los siguientes permisos:
```bash
chmod 644 .htaccess
```

### Nginx
Agregar la siguiente configuración al bloque del servidor:
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
}
```

## Estructura del Proyecto
- `index.php`: Formulario de ingreso de datos
- `guardar.php`: Procesa y guarda los datos del formulario
- `generar_pdf.php`: Genera el PDF del CV
- `templates/`: Contiene las plantillas del CV
- `uploads/`: Directorio para almacenar las fotos

## Uso
1. Acceder al formulario a través de `http://tu-dominio/`
2. Completar los datos del CV
3. Subir una foto (formatos permitidos: jpg, png)
4. El sistema generará automáticamente el PDF

## Solución de Problemas

### Permisos de Archivos
Si hay problemas con la carga de imágenes:
```bash
chmod -R 755 uploads/
chown -R www-data:www-data uploads/
```

### Errores de PDF
Si hay problemas con la generación de PDF, verificar:
- Permisos de escritura en el directorio temporal
- Extensión PHP GD instalada
- Memoria suficiente para PHP

## Mantenimiento
- Limpiar periódicamente el directorio `uploads/`
- Hacer respaldos regulares de la base de datos