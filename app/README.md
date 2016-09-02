# Demo app

This app is based on the Symfony demo app, but using a MySQL backend.

Before launching the app, the ``data.sql`` file must be imported in MySQL.

In K8s, this can be done with the notion of ``init containers`` ([doc](http://kubernetes.io/docs/user-guide/production-pods/#handling-initialization)).

## HowTo

```bash
docker build -t oxalide/docker-workshop:app .
docker run --name mysql -e MYSQL_ROOT_PASSWORD=toto42 -d mysql:5.6
cat data.sql | docker run -a stdin -a stdout -a stderr -i --link mysql:mysql --rm mysql:5.6 sh -c 'exec mysql -hmysql -uroot -ptoto42'
docker run --link mysql:mysql --rm -p 8080:80 -it oxalide/docker-workshop:app
```

Access the [app](http://localhost:8080): you can surf and connect to the backoffice.
