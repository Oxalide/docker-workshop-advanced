# HowTo

```bash
kubectl create -f app-svc.yml
kubectl create -f mysql.yml
kubectl create -f mysql-svc.yml
kubectl create -f app.yml
POD=$(kubectl get pods | grep mysql | awk '{print $1}')
kubectl port-forward $POD 3306:3306
# in another terminal, after MySQL is ready
cat ../app/data.sql | mysql -p -h127.0.0.1 -uroot
```

Pour afficher l'application via minikube: ``minikube service app``.
