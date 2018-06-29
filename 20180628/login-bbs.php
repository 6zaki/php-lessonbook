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
      "takeshi" => "$2y$10$t./azXD56nsNvf.vc0I28OOq4FtrUbp1i9.V8ApnfXqBA8TkGeSMW",
      "yutaka" => "$2y$10$tuo/DlBMGkUht0ef4xoSAumyS.guFU.puyI238YB3tx60GmN/ypKa",
      "akiko" => "$2y$10$pJoy8CjazMDft9jFUM/cje..Uqk6Tqvak8kUfp794nnvWHjHQQDmS"
    );
    $hash = password_hash($users, PASSWORD_DEFAULT);
    $script = $_SERVER["SCRIPT_NAME"];//このphpのパス
    $savefile = dirname(__FILE__).'/log.txt';
    //セッションを開始する
    session_start();
    //----------------------
    // ログイン状態や送信されたパラメータにより分岐
    if (isset($_SESSION["login"])) { //ログインしているか？
      show_login_contents();
    } else {
      //ログインフォームからの入力があるか？
      if (isset($_POST["user"])) {
        check_login(); //ログインできるかチェック
      } else {
        show_login_form(); //ログインフォームを表示
      }
    }
    //---------------------
    //ログインフォームを表示
    function show_login_form() {
      global $script;
      echo <<< EOF
      <div id="loginform">
        <form action="$script" method="POST">
          <h3>ログインしてください</h3>
          <label>ユーザー名</label><input type="text" name="user">
          <label>パスワード</label><input type="password" name="pass">
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
        echo "パスワードが入力されていません";
        exit;
      }
      $user = trim($_POST["user"]);
      $pass = trim($_POST["pass"]);
      if(empty($users[$user])) {
        echo "ユーザーが存在しないかパスワードが違います。";
        exit;
      }
      //パスワードが合致しているかチェック
      if(password_verify(($_POST["pass"]), $hash)) {
        echo "ユーザーが存在しないかパスワードが違います。";
        exit;
      }
      //ログインしたことをセッションに記録
      $_SESSION["login"] = array("user" => $user);
      echo "<a href='$script'>ログインしました！</a>";
    }
    //------------------------------
    //ログイン時のコンテンツを表示
    function show_login_contents() {
      $m = isset($_GET["m"]) ? $_GET["m"] : "";
      //必要な処理があれば分岐する
      switch ($m) {
        case "logout": show_logout();
        break;
        case "write": write_log();
        break;
        default: show_log();
        break;
      }
    }
    //ログの表示
    function show_log() {
      global $script, $savefile;
      //メニューの表示
      $user = $_SESSION["login"]["user"];
      echo "<h1>こんにちは、{$user}さん！</h1>";
      echo "現在ログイン中";
      echo "→（<a href='$script?m=logout'>ログアウトする</a>）";
      //掲示板の表示
      echo "<h3>掲示板</h3>";
      $log = array();
      if (file_exists($savefile)) {
        $log = unserialize(file_get_contents($savefile));
      }
      echo "<ul>";
      foreach ($log as $i) {
        $name = htmlspecialchars($i["name"]);
        $body = htmlspecialchars($i["body"]);
        echo "<li>$name: $body</li>";
      }
      echo "</ul>";
      //書き込みフォーム
      echo <<< EOF
      <form action="$script" method="get">
        <input type="text" name="body" size="40">
        <input type="hidden" name="m" value="write">
        <input type="submit" value="書き込み">
      </form>
EOF;
    }
    //ログの書き込み
    function write_log() {
      global $script, $savefile;
      if(empty($_GET["body"]) || $_GET["body"] == '') {
        echo "本文が空です。";
        exit;
      }
      $log = array();
      if(file_exists($savefile)) {
        $log = unserialize(file_get_contents($savefile));
      }
      $log[] = array(
        "name"=>$_SESSION["login"]["user"],
        "body"=>$_GET["body"]);
      file_put_contents($savefile, serialize($log));
      //ページをリロードする
      header("location: $script");
    }
    //ログアウト処理を行う
    function show_logout() {
      global $script;
      unset($_SESSION["login"]);
      echo "<a href='$script'>ログアウトしました</a>";
      exit;
    }
  ?>
</body>
</html>
