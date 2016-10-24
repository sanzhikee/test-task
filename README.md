Yii 2 Basic Project Template

REQUIREMENTS
------------

Я локально установил php7, composer, mysql5.5, apache

INSTALLATION
-------------

Установка

Разворачиваем проект из гита локально
Далее запускаем команду composer install
После в корне проекта запускаем php yii migrate

CONFIGURATION
-------------

### База данных

Конфигирурем базу, например:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Server
-------------

#Рекомендуемая Apache конфигурация:

DocumentRoot "path/to/basic/web"

<Directory "path/to/basic/web">
    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . index.php
</Directory>

#Рекомендуемая Nginx конфигурация:

server
{
{
    charset utf-8;
    client_max_body_size 128M;

    listen 80; ## listen for ipv4

    server_name mysite.local;
    root        /path/to/basic/web;
    index       index.php;

    access_log  /path/to/basic/log/access.log;
    error_log   /path/to/basic/log/error.log;

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ ^/assets/.*\.php$ {
        deny all;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass 127.0.0.1:9000;
        #fastcgi_pass unix:/var/run/php5-fpm.sock;
        try_files $uri =404;
    }

    location ~* /\. {
        deny all;
    }
}
}