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
    $cur = strtotime("2018-2");
    echo date("t", $cur);//指定した月の日数を表示
  ?>
  <?php
    $y = 2018;
    echo ($y%4 == 0 && $y%100 != 0 || $y%400 == 0) ? "閏年" : "平年";
  ?>
</body>
</html>
