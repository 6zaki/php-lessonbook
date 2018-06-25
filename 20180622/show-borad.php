<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <!-- メッセージを表示するプログラム -->
  <h1>店主による本日の"つぼやき"</h1>
  <?php
    //ファイルの保存先を指定する
    $save_file = dirname(__FILE__) . "/message.txt";
    //ファイルがあるか？
    if(!file_exists($save_file)) {
      echo "まだメッセージはありません";
      exit;
    }
    //メッセージを読み込んで画像に表示
    $msg = file_get_contents($save_file);
    //htmlに変換
    $msg_html = htmlspecialchars($msg);
    //改行をbrに変換する
    $msg_html = str_replace("¥n", "<br>", $msg_html);
    //htmlを表示
    echo <<< EOF
    <div style="border: dashed 3px red; padding: 12px">
      <div style="font-size: 16px; color: black">
        {$msg_html}
      </div>
    </div>
EOF;
  ?>
</body>
</html>
