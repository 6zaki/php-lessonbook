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
    //言語と文字エンコーディングを正しくセット
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    //送信者と宛先をセット
    $form = "***@yahoo.co.jp"; //送信者Yahoo!を使うときは重要
    $to = "***@gmail.com"; //宛先
    //宛先情報をエンコード
    $to_name = "宛先太郎";
    $to_addr = "***@yahoo.co.jp";
    $to_name_enc = mb_encode_mimeheader($to_name, "ISO-2022-JP");
    $to = "$to_name_enc<$to_addr>";
    //送信元情報をエンコード
    $form_name = "送信元二郎";
    $form_addr = "jiro@example.com";
    $form_name_enc = mb_encode_mimeheader($form_name, "ISO-20222-JP");
    $form = "$form_name_enc<$from_addr>";
    //メールヘッダを作成
    $header = "From: $from\n";
    $header .= "Reply-To: $from";
    //件名や本文をセット
    $subject = "メールのテスト";
    $body = "こんにちは。メール送信のテストです。";
    //日本語メールの送信
    $r = mb_send_mail($to, $subject, $body, $header);
    if ($r) {
      echo "メール送信成功！";
    } else {
      echo "失敗!";
    }
  ?>
</body>
</html>
