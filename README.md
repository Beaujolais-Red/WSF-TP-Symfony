### Getting started

```bash
docker-compose build --pull --no-cache
docker-compose up -d
```

```
# URL
http://127.0.0.1

# Env DB
DATABASE_URL="postgresql://postgres:password@db:5432/db?serverVersion=13&charset=utf8"
```
<<<<<<< HEAD
Commandes utiles
=======

### Commandes utiles
```
>>>>>>> bba8e3864ef695eb3ae16d718e3e38b16bd567ed
# Lister l'ensemble des commandes existances 
docker-compose exec php bin/console

# Création d'un controller vierge
docker-compose exec php bin/console make:controller
<<<<<<< HEAD
Gestion de base de données
Commandes de création d'entité
docker-compose exec php bin/console make:entity
Mise à jour de la base de données
=======
```

### Gestion de base de données

#### Commandes de création d'entité
```
docker-compose exec php bin/console make:entity
```

#### Mise à jour de la base de données
```
>>>>>>> bba8e3864ef695eb3ae16d718e3e38b16bd567ed
# Voir les requètes qui seront jouer avec force
docker-compose exec php bin/console doctrine:schema:update --dump-sql

# Executer les requètes en DB
docker-compose exec php bin/console doctrine:schema:update --force
<<<<<<< HEAD
Gestion des formulaires
https://symfony.com/doc/current/reference/forms/types.html

Gestion de l'auth
https://symfony.com/doc/current/components/security/authentication.html

Commande pour générer l'auth
=======
```

### Gestion des formulaires 
https://symfony.com/doc/current/reference/forms/types.html

### Gestion de l'auth
https://symfony.com/doc/current/components/security/authentication.html

#### Commande pour générer l'auth
```
>>>>>>> bba8e3864ef695eb3ae16d718e3e38b16bd567ed
docker-compose exec php bin/console make:user
docker-compose exec php bin/console doctrine:schema:update --force
docker-compose exec php bin/console make:auth

// Puis aller dans votre le fichier "custom authenticator" pour choisir la route de redirection après connexion (ligne 54).
<<<<<<< HEAD
Gestion de la securité
https://symfony.com/doc/current/security.html#securing-controllers-and-other-code https://symfony.com/doc/current/validation.html

http://localhost:8080/?pgsql=db&username=postgres&db=db&ns=public&table=name Lien DataBase

MDP : Password
=======
```

### Gestion de la securité 
https://symfony.com/doc/current/security.html#securing-controllers-and-other-code
https://symfony.com/doc/current/validation.html

_______________________________________________________________________

http://localhost:8080/?pgsql=db&username=postgres&db=db&ns=public&table=name
Lien DataBase

MDP : Password
>>>>>>> bba8e3864ef695eb3ae16d718e3e38b16bd567ed
