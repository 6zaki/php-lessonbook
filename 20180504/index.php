<?php
  $name = みゆううう;
  $age = 30;
  $hobby = 観劇;
  $image = "panda.jpg";
?>

<html>
  <body>
    <h1>自己紹介</h1>
    <img src="<?php echo $image; ?>" width="300">
    <ul>
      <li>名前：　<?php echo $name; ?></li>
      <li>年齢：　<?php echo $age; ?>歳</li>
      <li>趣味：　<?php echo $hobby; ?></li>
    </ul>
  </body>
</html>
