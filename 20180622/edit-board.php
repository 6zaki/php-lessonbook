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
    //ファイルの保存先を指定する
    $save_file = dirname(__FILE__) . "/message.txt";
    //更新用パスワードを指定する
    $master_password = "suwapass";
    //投稿があるか？
    if(isset($_POST["msg"])) {
      //パスワードが合わない場合は保存しない
      $pass = isset($_POST["pass"]) ? $_POST["pass"] : "";
      if ($pass !== $master_password) {
        echo "パスワードが違います！";
        exit;
      }
      //ファイルにメッセージを保存
      file_put_contents($save_file, $_POST["msg"]);
      echo "保存しました！";
    } else {
      //投稿フォームの表示
      $self = $_SERVER["SCRIPT_NAME"];
      echo <<< EOF
      <!--投稿フォーム-->
      <form method="POST" action="$self">
        <textarea name="msg" cols="60" rows="6">ここにメッセージを記入してください。</textarea><br>
        パスワード：
        <input type="password" name="pass" />
        <input type="submit" value="記録" />
      </form>
EOF;
    }
  ?>
</body>
</html>
