### Route 確認

```
docker exec -it crmsystem php artisan route:list
```

### Controller 作成

```
docker exec -it crmsystem php artisan make:controller コントローラ名
```

### model 作成

オプション一覧確認　 php artisan make:model -h
基本的にオプションは -a で作る
Model, Factory, Migration, Seeder, Request, Controller, Policy

```
docker exec -it crmsystem php artisan make:model モデル名 -a
```

### マイグレーション

```
docker exec -it crmsystem php artisan migrate
```

### ストレージリンク作成

public に配置した画像などを外部からアクセスできるようにする

```
docker exec -it crmsystem php artisan storage:link
```

### マイグレート時にシーダーを実行

```
docker exec -it crmsystem php artisan migrate:fresh --seed
```
