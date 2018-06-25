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
    $kiramune = array ("CONNECT" => "青", "KAmiYU" => "ピンク", "trignal" => "水色", "爆弾おじさん" => "黄色＆ピンク");
    echo "<table>";
    foreach ($kiramune as $unit => $color) {
      echo "<tr><th>$unit</th><td>$color</td></tr>";
    }
    echo "</table>";
  ?>

</body>
</html>
