<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <pre>
    <?php
      //変数に秒を代入
      $hour = 60 * 60; //1時間 = 60秒 * 60分
      $day = 24 * $hour; //1日 = 24時間
      //計算
      $now = time();
      $result = $now + 3 * $day;
      //結果を表示
      echo "今日は・・・" . date("Y-m-d", $now) . "<br />";
      echo "3日後は・・・" . date("Y-m-d", $result);
    ?>
  </pre>

  <pre>
    <?php
      $hour = 60 * 60; //1h
      $day = 24 * $hour; //1d
      $now = time(); //now
      $fiveD_before = $now - 5 * $day; //5day before
      echo date("Y.m.d", $fiveD_before) . "<br />";
    ?>
  </pre>

  <?php
    $now = time();
    echo $now . "←今日のタイムスタンプ<br>";
    $today = date("Y.m.d", $now);
    echo $today . "←今日の日付に変換したもの";
  ?>

</body>
</html>
