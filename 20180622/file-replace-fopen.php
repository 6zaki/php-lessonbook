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
    //1.ファイルを開く
    $handle_r = fopen("old.txt", "r");
    $handle_w = fopen("new.txt", "w");
    //2.ファイルハンドルを指定して読み書きを行う
    while (!feof($handle_r)) {
      $line = fgets($handle_r);
      $line = str_replace("old@exaple.com", "new@example.com", $line);
      fwrite($handle_w, $line);
    }
    //3.ファイルを閉じる
    fclose($handle_r);
    fclose($handle_w);
    echo "ok";
  ?>
</body>
</html>
