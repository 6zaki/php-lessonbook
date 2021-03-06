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
    //ファイルがアップロードされたか調べる
    if (isset($_FILES["upfile"])) {
      save_jpeg();
    } else {
      show_form();
    }
    //ファイルのアップロードフォームの表示
    function show_form() {
      $self = $_SERVER["SCRIPT_NAME"];
      $maxsize = 1024 * 1024 * 3; //3MB
      echo <<< EOF
        <form action="$self" method="POST" enctype="multipart/form-data">
          JPEGファイルをアップロード<br>
          <!-- 最大ファイルサイズ（バイト）の指定 -->
          <input type="hidden" name="MAX_FILE_SIZE" value="$maxsize">
          <!-- アップロードの指定 -->
          <input type="file" name="upfile"><br>
          <input type="submit" value="ファイル送信">
        </form>
EOF;
    }
    //アップロードされたファイルを保存する
    function save_jpeg() {
      //ファイルのパスを指定する
      $tmp_file = $_FILES["upfile"]["tmp_name"];
      $save_file = dirname(__FILE__).'/test.jpeg';
      //指定ファイルがアップされたものかチェック
      if (!is_uploaded_file($tmp_file)) {
        echo "アップロードされたファイルが不正です";
        exit;
      }
      //アップロードされたファイルの形式を調べる
      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $type = finfo_file($finfo, $tmp_file);
      if ($type != "image/jpeg") {
        echo "送信されたファイルがJPEGではありません。";
        exit;
      }
      //ファイルを指定ディレクトリに保存
      if (!move_uploaded_file($tmp_file, $save_file)) {
        echo "アップロードに失敗しました。";
        exit;
      }
      //アップロードした画像を表示する
      echo "<h1>画像ファイルをアップしました！</h1>";
      echo "<img src='test.jpeg' />";
    }
  ?>
</body>
</html>
