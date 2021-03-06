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
    //------------------
    // (1)パラ、エーターのチェックと処理の分岐
    //------------------

    //パラメーターが送信されているかチェック
    $param = "";
    if (isset($_GET["param"])) $param = $_GET["param"];

    //パラメーターにより処理を分岐する
    switch ($param) {
      case "big-qrcode" : show_qrcode(300); break;
      case "small-qrcode" : show_qrcode(150); break;
      default : show_form(); break;
    }
    //------------------
    // (2)それぞれの処理を行う関数
    //------------------
    //QRコード表示
    function show_qrcode($size) {
      $url = urlencode($_GET["url"]);
      $api = "http://chart.apis.google.com/chart?cht=qr&";
      $src = $api."chs={$size}x{$size}&chl={$url}";
      echo "<img src='$src' />";
    }
    //入力フォームを表示
    function show_form() {
      echo <<< END_OF_FORM
        <form>
          <h3>QRコードに変換したいURLとサイズを指定</h3>
          <input type="text" name="url" />
          <select name="param">
            <option value="big-qrcode">大</option>
            <option value="small-qrcode">小</option>
          </select>
          <input type="submit" value="変換" />
        </form>
END_OF_FORM;
    }
  ?>

</body>
</html>
