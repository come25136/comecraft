<?php
  require __DIR__ .'/config.php';
  require __DIR__ .'/api-keys.php';
  require __DIR__ .'/vendor/autoload.php';

  // テキストとして結果を表示
  header('Content-Type: text/plain; charset=utf-8');

  use xPaw\MinecraftQuery;
  use xPaw\MinecraftQueryException;

  // インスタンス生成
  $to = new TwistOAuth($ck, $cs, $at, $as);

  $Query = new MinecraftQuery( );

  try { // twitter
    try { // minecraft
      $Query->Connect( $serveraddress, $port );
    } catch( MinecraftQueryException $e ) {
      echo "$servsername は現在何らかのエラーによって稼働していない可能性があります $hashtag \n";
      $status = $to->post("statuses/update", ["status" => "$servsername は現在何らかのエラーによって稼働していない可能性があります $hashtag"]);
    }
  } catch (TwistException $e) {
    echo "[{$e->getCode()}] {$e->getMessage()}";
  }
?>
