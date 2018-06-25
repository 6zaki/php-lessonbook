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
    $txt = file_get_contents("old.txt");
    $txt = str_replace("old@example.com", "new@example.com", $txt);
    file_put_contents("new.txt", $txt);
    echo "ok";
  ?>
</body>
</html>
