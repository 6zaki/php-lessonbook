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
    $users = array(
      //ユーザー名 => パスワード（password_hashでハッシュ化）
      "takeshi" => "$2y$10$t./azXD56nsNvf.vc0I28OOq4FtrUbp1i9.V8ApnfXqBA8TkGeSMW",
      "yutaka" => "$2y$10$tuo/DlBMGkUht0ef4xoSAumyS.guFU.puyI238YB3tx60GmN/ypKa",
      "akiko" => "$2y$10$pJoy8CjazMDft9jFUM/cje..Uqk6Tqvak8kUfp794nnvWHjHQQDmS"
    );
    $option = ['cost' => 10];//コスト10
    $hash = password_hash($users, PASSWORD_DEFAULT, $option);
    $script = $_SERVER["SCRIPT_NAME"];//このPHPファイルのパス
    //セッションを開始する
    session_start();
    //ログインしているか？
    if (isset($_SESSION["login"])) {
      show_login_contents();
      exit;
    }
    //ログインフォームからの入力があるか？
    if (isset($_POST["user"])) {
      check_login(); //ログインできているかチェック
    } else {
      show_login_form(); //ログインフォームを表示
    }
    //ログインフォームを表示
    function show_login_form() {
      global $script;
      echo <<< EOF
      <div id="loginform">
        <form action="$script" method="POST">
          <h3>ログインしてください</h3>
          <label>ユーザー名</label>
          <input type="text" name="user">
          <label>パスワード</label>
          <input type="password" name="pass">
          <button type="submit">ログイン</button>
        </form>
      </div>
EOF;
    }
    //ログインするかチェック
    function check_login() {
      global $users, $script;
      //入力を検証する
      if (empty($_POST["pass"])) {
        echo "パスワードが入力されていません。";
        exit;
      }
      if (empty($users[$_POST["user"]])){
        echo "ユーザーが存在しないかパスワードが違います。";
        exit;
      }
      //パスワードが合致しているかチェック
      if (password_verify(($_POST["pass"]), $hash)) {//ハッシュ値の検証
        echo "ユーザーが存在しないかパスワードが違います。";
        exit;
      }
      //ログインしたことをセッションに記録
      $_SESSION["login"] = array("user" => $_POST["user"]);
      echo "<a href='$script'>ログインしました！</a>";
    }
    //ログインしている時の処理
    function show_login_contents() {
      $user = $_SESSION["login"]["user"];
      echo "<h1>こんにちは、{$user}さん！</h1>";
      echo "<p>このページはログインした人にだけ見える秘密のページです。</p>";
    }
  ?>
</body>
</html>
