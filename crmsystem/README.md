### Route 確認

```
docker exec -it crmsystem php artisan route:list
```

### Controller 作成

```
docker exec -it crmsystem php artisan make:controller コントローラ名
```

### model 作成

```
docker exec -it crmsystem php artisan make:model InertiaTest -m
```

### マイグレーション

```
docker exec -it crmsystem php artisan migrate
```
