# HowTo

```bash
kubectl --namespace=workshop create -f app-svc.yml
kubectl --namespace=workshop create -f mysql.yml
kubectl --namespace=workshop create -f mysql-svc.yml
POD=$(kubectl --namespace=workshop get pods | grep mysql)
kubectl --namespace=workshop port-forward $POD 3306:3306
cat ../app/data.sql | mysql -p -h127.0.0.1 -uroot
kubectl --namespace=workshop create -f app.yml
kubectl --namespace=workshop describe service app
```

La dernière commande donne l'adresse de l'ELB.
