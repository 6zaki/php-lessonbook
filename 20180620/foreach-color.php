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
    $colors = array ("赤" => "#ff0000", "水色" => "#00ffff", "白" => "#fff");
    foreach ($colors as $name => $color) {
      echo "<p>$name → $color</p>";
    }
  ?>

</body>
</html>
