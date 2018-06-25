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
    $name = "amorous発売";
    $yotei = strtotime("2018-07-20");
    $today = time();
    $interval = $yotei - $today;
    $days = ceil($interval / (24 * 60 * 60));
    echo "<p>今日は" . date("Y.m.d", $today) . "だよ</p>";
    echo "<p>発売日は" . date("Y.m.d", $yotei) . "だよ</p>";
    echo "<p>{$name}まであと{$days}日！</p>";
  ?>

  <?php
    $t = strtotime("next monday", time());
    echo "次の月曜日は..." . date("Y.m.d", $t);
  ?>
</body>
</html>
