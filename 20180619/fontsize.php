<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>pxからremへ変換</h1>
  <?php
    if (isset($_GET["px"]) && ($_GET["bodyPx"])) {
      $px = $_GET["px"];
      $bodyPx = $_GET["bodyPx"];
      $px = floatval($px);
      $bodyPx = floatval($bodyPx);
      $rem = $px / $bodyPx;
      echo "<p>{$rem}rem<br>body {$bodyPx}px, 対象 {$px}px</p>";
    } else {
      $self = $_SERVER["SCRIPT_NAME"];
      echo "<form action='$self' method='GET'>";
      echo "body <input type='text' name='bodyPx' value='' />px<br>";
      echo "child <input type='text' name='px' value='' />px<br>";
      echo "<input type='submit' value='計算する' />";
      echo "</form>";
    }
  ?>

</body>
</html>
