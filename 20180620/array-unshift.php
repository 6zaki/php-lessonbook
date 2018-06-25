<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <pre>
    <?php
      $a = array(100, 101, 102);
      array_unshift($a, 50, 51, 52);
      print_r($a);
    ?>
  </pre>
  <pre>
    <?php
      $a = array(100, 101, 102);
      array_push($a, 50, 51, 52);
      print_r($a);
    ?>
  </pre>
  <pre>
    <?php
      $a = array(100, 101, 102);
      array_unshift($a, 50, 51, 52);
      $b = array_reverse($a);
      print_r($b);
    ?>
  </pre>
</body>
</html>
