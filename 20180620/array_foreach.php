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
    //配列の要素を処理
    $fruits = array("バナナ", "リンゴ", "イチゴ");
    foreach ($fruits as $f) {
      echo "<p>{$f}が食べたい！</p>";
    }
    echo "<hr />";
    //連想配列の要素を処理
    $colors = array("赤" => "#ff0000", "青" => "#0000ff", "紫" => "ff00ff");
    foreach ($colors as $label => $code) {
      echo "<p style='color: $code'>$label {$code}</p>";
    }
  ?>

</body>
</html>
