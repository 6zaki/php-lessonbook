<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>インチからセンチに単位変換</h1>
  <?php
    if (isset ($_GET ["inch"])) {
      $inch = $_GET["inch"];
      $inch = floatval ($inch);
      $cm = 2.54 * $inch;
      echo "<p>結果： $inch インチ　= $cm センチメートル</p>";
    } else {
      $self = $_SERVER ["SCRIPT_NAME"];
      echo "<form action='$self' method='GET'>";
      echo "<input type='text' name='inch' value='' />";
      echo "<button type='submit'>変換</button>";
      echo "</form>";
    }
  ?>
  </body>
</html>
