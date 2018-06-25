<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1 style="font-size:14px">6月の予定</h1>
  <?php
    showStyleTag();
    //2018.06のカレンダーを作成
    $yotei = array(1 => "飲み会", 10 => "旅行プラン作成", 15 => "ディナー", 20 =>"FREEDOM発売", 22 => "送別会", 29 => "慰労会");
    showCalendar(2018,6, $yotei);
    //------------------------
    //カレンダーを表示する関数
    function showCalendar ($year, $mon, $yotei) {
      $week_list = array("日", "月", "火", "水", "木", "金", "土");
      $colors = array(0 => "#fff0f0", 6 => "#f0f0ff" );
      $cur = strtotime("$year-$mon-1");//初日のタイムスタンプを求める
      echo "<table>";
      for(;;) {
        //月番号、日付、曜日を得る
        $cur_mon = intval(date("m", $cur));
        if ($cur_mon > $mon) break;//月が変わったら終わり
        $d = date("d", $cur);
        $w = date("w", $cur);
        $weekname = $week_list[$w];
        $color = isset($colors[$w]) ? $colors[$w] : "white";
        //予定があるか確認する
        $i = intval($d);
        $sc = isset($yotei[$i]) ? $yotei[$i] : "なし";
        //HTMlを出力する
        echo "<tr style='background-color: $color;'>";
        echo "<td>$d</td><td>$weekname</td>";
        echo "<td>$sc</td>";
        echo "</tr>";
        //1日進める
        $cur += 24 * 60 * 60;
      }
      echo "</table>";
    }
    function showStyleTag() {
      echo <<< EOF
      <style>
        table {
          border-top: 1px solid black;
          border-collapse: collapse;
          border-spacing: 0;
        }
        td {
          border-bottom: solid 1px black;
          padding: 6px;
          margin: 0;
        }
      </style>
EOF;
    }
  ?>

</body>
</html>
