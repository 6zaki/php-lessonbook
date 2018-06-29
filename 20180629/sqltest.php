<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SOLテスト</title>
</head>
<body bgcolor="#f0f0f0">
  <?php
    //sqlの入力フォームを表示
    $query = isset($_GET["query"]) ? $_GET["query"] : "";
    $q_html = htmlspecialchars($query);
    echo <<< EOF
    <form>
      <div>SQLを以下に記述：</div>
      <textarea name="query" cols="70" rows="5">{$q_html}</textarea>
      <div><input type="submit" value="SQLを実行"></div>
    </form>
EOF;
    //SQLを実行する
    if ($query != "") {
      $db = new PDO("sqlite:.test.db");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      try {
        //実行して結果を表示する
        $html = $head = "";
        foreach ($db->query($query, PDO::FETCH_ASSOC) as $row) {
          if ($head == "") {//ヘッダ行
            $keys = array_keys($row);
            $head .="<tr>";
            foreach ($keys as $c) {
              $c_html = htmlspecialchars($c);
              $head .= "<th>$c_html</th>";
            }
            $head .= "</tr>";
          }
          $html .= "<tr>";
          foreach ($row as $c) {//実行結果
            $c_html = htmlspecialchars($c);
            $html .= "<td><pre>$c_html</pre></td>";
          }
          $html .= "</tr>\n";
        }
        echo "<p style='font-weight:bold; color:blue;'>実行しました</p>";
        echo "<table boader='1' bgcolor='#fff' cellpadding='4'>";
        echo $head . $html;
        echo "</table>";
      } catch(Exception $e) {
        $msg = $e->getMessage();
        echo "<div style='color:red'>$msg</div>";
      }
    }
  ?>
</body>
</html>
