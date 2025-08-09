# URL

メタパスを利用すると、開発者はURLを簡単に出力できるようになります。

ドキュメントルートが、/var/www/public_html/で、
エントリーポイントが、/var/www/public_html/community/app.phpの場合、
$url = OP()->URL('app:/login/');
$urlには、/community/login/が代入されます。
