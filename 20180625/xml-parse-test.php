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
      //水戸の天気を表すrss
      $weather_rss = "http://weather.livedoor.com/forecast/rss/area/080010.xml";
      //rssデータをwebからダウンドーロする
      $s = trim(@file_get_contents($weather_rss));
      //xmlをパースする
      $xml = simplexml_load_string($s);
      //xmlにある要素にアクセスする
      $title = $xml->channel->title;
      echo $title."\n";//rssタイトル
      //配列になっている要素にアクセス
      foreach ($xml->channel->item as $item) {
        $item_title = strval($item->title);
        echo "- $item_title\n";
      }
    ?></pre>
</body>
</html>
