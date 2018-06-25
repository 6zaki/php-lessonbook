<!DOCTYPE html>
  <?php
    //主な処理の流れ
    show_header(); //htmlのヘッダを表示する
    show_form(); //色変更フォームを表示する
    show_footer(); //htmlのfooterを表示する

    //-------------------
    //htmlのheadを表示する（この時、背景色を指定
    //色が送信されているか調べて背景色を決定する
    function show_header() {
      $color = "#fff"; //デフォは白
      if (isset($_GET["color"])) { //色が送信されているか
        $color = htmlspecialchars($_GET["color"]);
      }
      echo "<html><body bgcolor='$color'>";//headを表示
    }

    function show_footer() {
      echo "</body></html>"; //htmlのfooterを表示
    }

    function show_form() {
      //色名とカラーコードを連想配列で指定する
      $colors = array("赤" => "#ff0000", "水色" => "#00ffff", "白" => "#fff");
      echo "<form>";
      //ラジオボタンを次々と表示する
      foreach ($colors as $name => $color) {
        echo create_radio_code($name, $color);
      }
      echo "<input type='submit' value='色変更' />";
      echo "</form>";
    }
    //フォームの表示で利用するラジオボタンとラベルの作成
    function create_radio_code($name, $code) {
      return <<< EOF
      <input type="radio" id="$name" name="color" value="$code" />
      <label for="$name">$name</label>
EOF;
    }
  ?>
