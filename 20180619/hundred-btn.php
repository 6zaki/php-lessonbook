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
    echo "<form>";
    for ($i = 1; $i <= 100; $i++) {
      echo "<input type='submit' name='btn' value='{$i}' style='width:48px;' />";
    }
    echo "</form>";
    if (isset($_GET["btn"])) {
      $btn = intval($_GET["btn"]);
      echo "<p>ボタンの{$btn}番が押されました！</p>";
    }
  ?>
</body>
</html>
