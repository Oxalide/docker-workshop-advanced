# Demo app

This app is based on the Symfony demo app, but using a MySQL backend.

Before launching the app, the ``data.sql`` file must be imported in MySQL.

In K8s, this can be done with the notion of ``init containers`` ([doc](http://kubernetes.io/docs/user-guide/production-pods/#handling-initialization)).
