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
    //ファイルパスを設定
    $target_dir = dirname(__FILE__);
    $target_file = $target_dir . "/test.txt";
    //書き込み
    //1.このディレクトリに書き込みできるか調べる
    if(!is_writable($target_dir)) {
      echo "1.ディレクトリに書き込みができません： $target_dir";
      exit;
    }
    //2.このファイルが既存か調べる
    if(file_exists($target_file)) {
      //ファイルに書き込めるか調べる
      if(!is_writable($target_file)) {
        echo "3.このファイルに書き込みができません： $target_file";
        exit;
      }
    }
    //ファイルに文字列を書き込む
    file_put_contents($target_file, "光陰矢の如し");

    //読み込み
    //ファイルが存在するか調べる
    if(!file_exists($target_file)) {
      echo "4.このファイルは存在しません： $target_file";
      exit;
    }
    //このファイルを読み込めるか調べる
    if(!is_readable($target_file)) {
      echo "5.ファイルの読み込みができません";
      exit;
    }
    //ファイルから文字列を読み込む
    $str = file_get_contents($target_file);
    echo "読み書きした文字列：　$str";
  ?>
</body>
</html>
