# Demo app

This app is based on the Symfony demo app, but using a MySQL backend.

Before launching the app, the ``data.sql`` file must be imported in MySQL.

In K8s, this can be done with the notion of ``init containers`` ([doc](http://kubernetes.io/docs/user-guide/production-pods/#handling-initialization)).

## HowTo

```bash
docker build -t oxalide/docker-workshop:app .
docker run --name mysql -e MYSQL_ROOT_PASSWORD=toto42 -d mysql:5.6
# wait a little for MySQL to be ready.
cat data.sql | docker run -a stdin -a stdout -a stderr -i --link mysql:mysql --rm mysql:5.6 sh -c 'exec mysql -hmysql -uroot -ptoto42'
docker run --link mysql:mysql --rm -p 8080:80 -it oxalide/docker-workshop:app
```

Access the [app](http://localhost:8080): you can surf and connect to the backoffice.

## Environment variables

Here are the available environment variables for the containers.

### mysql

* ``MYSQL_ROOT_PASSWORD``
* ``MYSQL_DATABASE``
* ``MYSQL_USER``
* ``MYSQL_PASSWORD``

### oxalide/docker-workshop:app-redis

* ``SYMFONY__DATABASE__HOST``
* ``SYMFONY__DATABASE__PORT``
* ``SYMFONY__DATABASE__NAME``
* ``SYMFONY__DATABASE__USER``
* ``SYMFONY__DATABASE__PASSWORD``
