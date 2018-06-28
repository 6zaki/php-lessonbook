<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
  <?php
    $self = $_SERVER["SCRIPT_NAME"];
    //サイズ指定が行われたか？
    if (isset($_GET["size"])) {
      //値の検証
      $size = intval($_GET["size"]);
      if ($size < 12 || $size > 72) {
        echo "サイズ指定が不正です";
        exit;
      }
      //保存有効期限を指定
      $expire = time() + (60 * 60 *24) * 365;//一年間有効
      setcookie("size", $size, $expire);
      header("location: $self");
      exit;
    }
    //クッキーから値を読み出す
    $size = 26;
    if (isset($_COOKIE["size"])) {
      $size = intval($_COOKIE["size"]);
      $size = $size . "px";//単位がないとstyleに効果がないので追加
    }
    //文字サイズの指定フォームを表示する
    echo <<< EOF
    <body style="font-size:$size;">
      <div style="background-color:yellow; text-align:right;">
        文字サイズ【<a href="$self?size=46">大</a>】
        【<a href="$self?size=26">中</a>】
        【<a href="$self?size=14">小</a>】
      </div>
EOF;
  ?>
  <p>「ジョパンニさん。あなたはわかっているのでしょう。」</p>
  <p>ジョパンニは勢いよく立ち上がりましたが、立ってみるともうはっきりとそれを答えることができないのでした。ザネリが前の席からふりかえって、ジョパンニをみてクスッと笑いました。助パンにはもうどぎまぎしてまっ赤になってしまいました。</p>
  </body>
</html>
