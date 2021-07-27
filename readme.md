# Projet site react-apiplatform-with-symfony

Site facuration sous Symfony

## Environnement de developpement

### Pré-requis

- PHP 8.0
- Composer
- Symfony CLI
- Docker
- Docker-compose
- nodejs & npm

Vous pouvez vérifier les pré-requis (sauf Docker et Docker-compose) avec la commande suivante :

```bash
symfony check:requirements
```

### Lancer l'environnement de développement

```bash
composer install
yarn install
yarn run build
docker-compose up -d
symfony serve -d
```

### Lancer des tests

```bash
php bin/phpunit --testdox
```
