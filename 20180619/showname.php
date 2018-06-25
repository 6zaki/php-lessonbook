<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php
    $q = $_GET["q"];//form.htmlの入力内容を得る
    //htmlに変換
    $q_html = htmlspecialchars($q);
    //メッセージ表示
    echo "<p>{$q_html}さん、こんにちわ。</p>";
  ?>

</body>
</html>
