# Nom du projet
## Description
TODO:
- [ ] ajouter une description du projet

## Installation
### Le fichier .env
Créer un fichier .env.local :
```bash
cp .env .env.local
```
### Modifier le fichier .env.local en fonction de votre environnement
- `DATABASE_URL` : url de connexion à la base de données
- `APP_ENV` : environnement de l'application
- `APP_NAME` : nom du projet ou du site web
- `MAILER_DSN` : url de connexion au serveur de mail
- `MESSENGER_TRANSPORT_DSN` : service de gestion des messages (ex: RabbitMQ)

### Vérification des prérequis
```bash
symfony check:requirements
symfony check:security
```

### Environnement de développement
#### Installation des dépendances
```bash
composer install
composer dump-autoload
yarn
```

### Base de données
```bash
symfony console d:d:c
symfony console d:m:m
symfony console d:f:l --group=dev
```

### Consummer les messages
```bash
symfony console messenger:consume async
```

#### Lancement du serveur de développement
```bash
symfony server:start
```
```bash
yarn dev-server
```
_Aller sur http://localhost:8000_

### Environnement de production
#### Installation des dépendances
```bash
composer install --no-dev
composer dump-autoload --no-dev --optimize
composer dump-env prod # optimizes the .env files for production
yarn --production
yarn build
```

#### Base de données
```bash
php bin/console d:d:c
php bin/console d:m:m
php bin/console d:f:l --group=prod
```

#### Consummer les messages
[Documentation](https://symfony.com/doc/current/messenger.html#deploying-to-production)

_Aller sur l'url de votre site_

## Publication (depuis l'environnement de développement)

## Lancer les tests
```bash
vendor/bin/phpcs
vendor/bin/php-cs-fixer fix --diff --dry-run
vendor/bin/phpcbf # facultative : to fix errors automatically
vendor/bin/php-cs-fixer fix --diff # facultative : to fix errors automatically
```

## Git flow
```bash
git checkout -b feature/feature-name
git add .
git commit -m "message"
git push origin feature/feature-name
```
