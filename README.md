# Penny Classic Bookshelf

This demo is based on the [penny-classic-app](https://github.com/pennyphp/penny-classic-app)

This penny demo application is using the following components:

- doctrine/orm
- symfony/form
- symfony/http-foundation
- twig/twig


## Production

### Edit your configurations
There are a couple of things you may want to configure like doctrine cache, twig cache and so on.
You can find them under the `config/` folder.

## Development

### Dependencies

**Frontend**

```
npm install
grunt dev
```

**Composer**
```
composer install
```

### Docker environment setup

For more information please refer to: https://github.com/pennyphp/penny-classic-app#docker-nginxphp-fpm

```
cp docker/development/docker-compose.yml.development docker-compose.yml
docker-compose build
docker-compose up -d
```

### Prepare database

```
docker exec -ti pennyclassicapp_mysql_1 mysql -pmysupersecretrootpassword -e 'create database demoapp'
docker exec -ti pennyclassicapp_fpm_1 ./vendor/bin/doctrine orm:schema-tool:create
```

### Screenshot

![bookshelf](http://i.imgur.com/Up5tHCd.png)
![bookshelf](http://i.imgur.com/Df4X2uC.png)