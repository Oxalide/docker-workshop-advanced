# HowTo

```bash
kubectl create -f redis.yml -f redis-svc.yml
kubectl replace -f app.yml
```

La dernière commande va effectuer un rolling-update sur le ``deployment`` app.

Pour vérifier que Redis est bien utilisé, vous pouvez utiliser la commande suivante :

```bash
POD=$(kubectl get pods | grep redis | awk '{print $1}')
kubectl exec $POD -- redis-cli keys '*'
```
