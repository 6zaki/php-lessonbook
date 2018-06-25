<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form>
    <select name="year">
      <option>生年を選んでください。</option>
      <?php
        $this_year = date("Y");
        $end_year = $this_year - 80;
        $y = $this_year;
        while ($y >= $end_year) {
          echo "<option value='$y'>西暦{$y}年</option>";
          $y--;//1年分減算
        }
      ?>
    </select>
    <input type="submit" value="計算する">
  </form>

  <?php
    if (isset($_GET["year"])) {
      echo "今年" . ($this_year - intval($_GET["year"])) . "歳です。";
    }
  ?>
</body>
</html>
