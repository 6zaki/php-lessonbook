<?php
  $apple_place = 160;
  $apple_count = 3;
  $banana_place = 120;
  $banana_count = 6;
  $friend = 3;
  $tax = 0.05;

  $value = ($apple_place * $apple_count) + ($banana_place * $banana_count);
  $total = $value * (1 + $tax);
  $personal = $total / 3;
?>
商品合計金額は<?php echo $value; ?>円
税込金額は<?php echo $total; ?>円
１人あたり<?php echo $personal; ?>円
