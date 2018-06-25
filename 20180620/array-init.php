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
    $fruits = array ("apple", "orange", "banana");
    $colors = array ("red", "green", "blue");
    echo $fruits[2] . "<br />";
    echo $colors[0] . "<br />";
  ?>

  <?php
    $fruits = array ("apple" => 250, "orange" => 90, "banana" => 110);
    echo $fruits["orange"] . "<br />";
    $colors = array ("red" => "#ff0000", "green" => "#00ff00", "blue" => "#0000ff");
    echo $colors["blue"] . "<br />"
  ?>
</body>
</html>
