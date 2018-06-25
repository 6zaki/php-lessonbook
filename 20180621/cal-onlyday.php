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
    $year = 2018;
    $mon = 6;
    $cur = strtotime("$year - $mon - 1");//初日のタイムスタンプを求める
    for(;;) {
      //これから表示するタイムスタンプの月/日を求める
      $cur_mon = intval(date("m", $cur));
      $d = date("d", $cur);
      if ($cur_mon > $mon) break; //月が変わっているなら繰り返し終わり
      echo "[$d]"; //日付を求める
      //1日進める
      $cur += 24*60*60;
    }
  ?>

</body>
</html>
