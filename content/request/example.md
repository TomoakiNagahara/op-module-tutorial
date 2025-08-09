# Example

app:/test/ディレクトリーの中にrequest.phpを作成して下さい。
form.phpには、以下のようにソースコードを作成します。

```php
<?php
D( OP()->Request() );
?>
```

## GET

GETメソッドとは、URLの末尾にフォームの値を設定して、サーバーに送信する手法です。
これをURLクエリーと呼びます。
URLクエリーのフォーマットは以下のようになります。
http://localhost/test/?キー名1=値1&キー名2=値2&キー名3=値3
?から始まり、キー名1=値1の組み合わせを&でつなぎます。

それでは、次のURLにアクセスしてみて下さい。http://localhost:81/test/request/?test=success&foo=bar
GETメソッドのリクエストが取得できましたね。

## POST

request.phpに、以下のようにフォームのソースコードを追加して下さい。

```php
<?php
D( OP()->Request() );
?>
<form method="post">
  <input type="text" name="test" value=""/>
  <button> Submit </button>
</form>
```

それでは早速、app:/test/request/にアクセスしてフォームを実行して下さい。
リクエストが取得できたと思います。
