<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>インチからセンチへ変換</h1>
  <?php
    if (isset ($_GET["inch"])) {//値の送信、変換結果の表示
      $inch = $_GET["inch"];//入力データの送信
      $inch = floatval($inch);//文字列から数値へ変換
      $cm = 2.45 * $inch;//インチからセンチメートルに変換
      echo "<div>[結果] {$inch} インチ = {$cm}センチメートル</div>";
    } else {//値が送信されていない場合（フォーム表示）
      $self = $_SERVER["SCRIPT_NAME"];//このファイルのURLを取得
      echo "<form action='$self' method='GET'>";
      echo "<input type='text' name='inch' value='' />";
      echo "<input type='submit' value='変換' />";
      echo "</form>";
    }
  ?>

</body>
</html>
