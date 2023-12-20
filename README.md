# 使用方法

## 依存関係のインストール
```
composer install
```

## 環境変数ファイルの定義
.env.exampleをコピーして.envを作成する。  
.envのデータベース接続に関する部分を編集する。

## アプリケーションキーの設定
```
php artisan key:generate
```

## テーブルとデータの作成
```
php artisan migrate:refresh --seed
php artisan db:seed --class=UsersTableSeeder
```

## 起動
```
php artisan serve
```

## ログイン
http://127.0.0.1:8000/api/login/  
に対し、bodyを以下の内容にしてPOSTすることでログインできる。
```
{
    "email":"john@doe.com",
    "password":"password"
}
```
受け取ったトークンをBearerトークンとしてHeadersのAuthorizationの値に設定する。  
例） Bearer 3|jKsK2Hz68GQBUQWMg5ghlN55MXksBCNGzbIN1vjo463cb716

## ToDo項目の確認・追加・編集・削除

### 一覧の取得
http://127.0.0.1:8000/api/todo/  
に対しGETリクエストを送ることで、ログイン中のユーザに紐づけられているToDo項目を取得できる。

### 確認
http://127.0.0.1:8000/api/todo/{id}  
に対しGETリクエストを送ることで、{id}のToDo項目がログイン中のユーザに紐づけられていればそのToDo項目を取得できる。

### 追加
http://127.0.0.1:8000/api/todo/  
に対しBodyを以下のような内容にしてPOSTリクエストを送ることで、ログイン中のユーザに紐つけられたToDo項目を追加できる。
```
{
    "title":"ToDoアプリ用api作成",
    "description":"LaravelでToDoアプリ用のAPIを作成する",
    "due_date":"2023-12-21"
}
```
### 編集
http://127.0.0.1:8000/api/todo/{id}  
に対しPUTリクエストを送ることで、{id}のToDo項目がログイン中のユーザに紐づけられていればそのToDo項目の内容を変更できる。BodyはToDo項目を追加するときと同じ形式にする。

### 削除
http://127.0.0.1:8000/api/todo/{id}  
に対しDELETEリクエストを送ることで、{id}のToDo項目がログイン中のユーザに紐づけられていればそのToDo項目を削除できる。
