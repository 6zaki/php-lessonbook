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
    // 商品一覧の定義
    $goods = array("目薬", "日焼け止め", "シャンプー", "虫除けスプレー", "石鹸", "ガム", "チョコレート", "バナナ");

    //パラメーターに応じて処理を変える
    if (isset($_GET["goods"])) {
      show_item();
    } else {
      show_form();
    }

    //選択したアイテムを表示する
    function show_item() {
      $goods = $_GET["goods"];
      $goods_html = htmlspecialchars($goods);
      echo "商品「{$goods_html}」を購入しました";
    }
    //フォームを表示
    function show_form() {
      global $goods;
      $options = "";
      foreach ($goods as $item) {
        $options .="<option value='$item'>$item</option>";
      }
      echo <<< EOF
      <form>
        <select name="goods">
          <option>商品を選択</option>
          {$options}
        </select>
        <input type="submit" value="購入">
      </form>
EOF;
    }
  ?>
</body>
</html>
