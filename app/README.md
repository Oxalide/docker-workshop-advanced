# Demo app

Cette application est basée sur l'app de démonstration de Symfony, avec un backend MySQL.

Avant de lancer l'applicaiton, le fichier ``data.sql`` doit être importer dans MySQL.

Dans K8s, cela peut être fait à l'aide d'un ``init container`` ([doc](http://kubernetes.io/docs/user-guide/production-pods/#handling-initialization)).

## HowTo

```bash
docker build -t oxalide/workshop-docker-advanced:app .
docker run --name mysql -e MYSQL_ROOT_PASSWORD=toto42 -d mysql:5.6
# wait a little for MySQL to be ready.
cat data.sql | docker run -a stdin -a stdout -a stderr -i --link mysql:mysql --rm mysql:5.6 sh -c 'exec mysql -hmysql -uroot -ptoto42'
docker run --link mysql:mysql --rm -p 8080:80 -it oxalide/workshop-docker-advanced:app
```

L'application est disponible [ici](http://localhost:8080): vous pouvez la parcourir et vous connecter au backoffice.

## Variables d'environnement

Voici les variables d'environnement disponibles pour les containers:

### mysql

* ``MYSQL_ROOT_PASSWORD``
* ``MYSQL_DATABASE``
* ``MYSQL_USER``
* ``MYSQL_PASSWORD``

### oxalide/docker-workshop:app

* ``SYMFONY__DATABASE__HOST``
* ``SYMFONY__DATABASE__PORT``
* ``SYMFONY__DATABASE__NAME``
* ``SYMFONY__DATABASE__USER``
* ``SYMFONY__DATABASE__PASSWORD``
