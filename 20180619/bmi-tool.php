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
    if (isset($_GET["w"]) && isset($_GET["h"])) {
      $w = floatval($_GET["w"]); //体重（kg）
      $h = floatval($_GET["h"]); //身長（cm）
      $bmi = $w / pow($h / 100,2); //BMI値を計算
      $per = floor(($bmi / 22) * 100); //肥満値を計算
      //結果
      echo "体重{$w}kg, 身長{$h}cm<br>";
      echo "BMIは{$bmi}<br>";
      echo "肥満度は{$per}です。";
    } else {
      //データが送信されていなければフォームを表示
      echo "<form>";
      echo "体重：<input type='text' name='w' /><br />";
      echo "身長：<input type='text' name='h' /><br />";
      echo "<input type='submit' value='BMI判定' />";
      echo "</form>";
    }
  ?>
</body>
</html>
