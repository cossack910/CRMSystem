# CRMSystem

## inertia 公式

https://inertiajs.com/

## clone 時の儀式

#### env 設定(開発用 db 設定)

```
cp .env.example .env
```

#### composer のインストール

Laravel のプロジェクトは基本的に /vendor フォルダは個々の環境に依存して Git の管理下に置かれないためインストールし直す

```
docker exec -it crmsystem composer install
```

#### マイグレーション実行（必要時のみ）

開発 DB がコンテナなので, laravel_ucrm DB を作成後に実行

```
docker exec -it crmsystem php artisan migrate:fresh --seed
```

#### npm インストール

```
docker exec -it crmsystem npm install
```

## 環境構築構

#### npm 開発サーバー起動 (Inertia 使用のため開発時は必ず起動する　)

```
docker exec -it crmsystem npm run dev
```

#### プロジェクト作成

```
docker exec -it crmsystem composer create-project laravel/laravel crmsystem
```

#### マイグレート

```
docker exec -it crmsystem php artisan migrate
```

#### crmsystem/config/app.php

73 行目 日本時間に変更

```
 'timezone' => 'Asia/Tokyo',
```

86 行目 日本語ローカライズ

```
'locale' => 'ja',
```

#### laravel デバッグバーインストール

```
docker exec -it crmsystem composer require barryvdh/laravel-debugbar
```

#### キャッシュクリア

```
docker exec -it crmsystem php artisan cache:clear
```

#### コンフィグクリア

```
docker exec -it crmsystem php artisan config:clear
```

#### 言語設定

lang ディレクトリ作成

```
docker exec -it crmsystem php artisan lang:publish
```

ja.json 作成

```
touch ja.json
```

中身

```
{
    "Email": "メールアドレス",
    "Password": "パスワード",
    "Remember me": "ログイン情報を保存する",
    "Forgot your password?": "パスワードを忘れた方はこちら",
    "Log in": "ログイン"
}
```

##### breeze で出来るやつ

https://github.com/askdkc/breezejp

```
docker exec -it crmsystem composer require askdkc/breezejp --dev
```

```
docker exec -it crmsystem php artisan breezejp
```

#### breeze インストール

```
docker exec -it crmsystem composer require laravel/breeze --dev
```

#### vue(inertia) インストール

```
docker exec -it crmsystem php artisan breeze:install vue
```

#### npm インストール

```
docker exec -it crmsystem npm install
```
