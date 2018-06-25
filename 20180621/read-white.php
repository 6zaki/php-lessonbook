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
    //ファイルパスを設定
    $target_dir = dirname(__FILE__);
    $target_file = $target_dir . "/test.txt";
    //ファイルに文字列を書き込む
    file_put_contents($target_file, "光陰矢の如し");
    //ファイルから文字列を読み込む
    $str = file_get_contents($target_file);
    echo "読み書きした文字列 : $str";
  ?>
</body>
</html>
