<p align="center">
  <a href="https://github.com/ShaanCoding/ReadME-Generator">
    <img src="https://user-images.githubusercontent.com/115985120/217841496-2c1ba2a4-2ad6-47bd-945a-05fd256adb5b.png" alt="Logo" width="300" height="300">
  </a>

  <h2 align="center">Challenge_Web</h2>

  <p align="center">
    A website that allows you to manage events.
    <br/>
    <br/>
    <a href="https://github.com/SimonL14/challengeWebIut"><strong>Explore the docs »</strong></a>
    <br/>
    <br/>
    <a href="https://github.com/SimonL14/challengeWebIut">View Demo</a>
    .
    <a href="https://github.com/SimonL14/challengeWebIut/issues">Report Bug</a>
    .
    <a href="https://github.com/SimonL14/challengeWebIut/issues">Request Feature</a>
  </p>
</p>


### Installation

1. Récupérer le repository :

```sh
git clone https://github.com/SimonL14/challengeWebIut.git
```

2. Se positionner dans le dossier:

```sh
cd challengeWebIut/
```

3. Installer les dépendances :

```sh
composer install
yarn
yarn build
```
4. Base de donnée :


N'oubliez pas de modifier le ".env" pour l'adapter à votre base de donnée.
```sh
DATABASE_URL="mysql://User:Password@127.0.0.1:3306/u546677444_projetsymfony?serverVersion=5.7"
```

Vous devez créer une base de donnée en local avec le nom : ' challengewebiut '
Ensuite exécuter : 
```sh
symfony console make:migration
php bin/console doctrine:migrations:migrate
```

5. Lancer le projet : 

```sh
symfony server:start
```
