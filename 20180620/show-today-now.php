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
    //タイムゾーンを明示的に指定する場合
    date_default_timezone_set("Asia/Tokyo");
    //現在の時刻をエポックタイムスタンプ（unixタイム）で得る
    $now = time();
    //様々な形式で日付を出力する
    show_div("red", date("Y/m/d", $now));
    show_div("red", date("H:i:s", $now));
    show_div("blue", date("Y年n月j日", $now));
    show_div("blue", date("H時i分s秒", $now));
    show_div("blue", date("Y年n月j日", $now));
    //特定の書式
    show_div("green", date("c", $now));
    show_div("green", date("r", $now));
    //曜日
    $week = array("日", "月", "火", "水", "木", "金", "土");
    show_div("red", date("w", $now));
    show_div("red", $week[date("w", $show)]);
    //---------------
    //文章を指定のスタイルで出力する関数
    function show_div($color, $str) {
      $str = htmlspecialchars($str);
      echo "<div style='color:$color;'>$str</div>";
    }
  ?>
  <?php
    echo date("Y-m-d H:i:s")."<br />";
    echo strftime("%Y-%m-%d %H:%M:%S");
  ?>
</body>
</html>
