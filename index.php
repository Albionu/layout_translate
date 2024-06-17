<?php

require_once  "vendor/autoload.php";

use Telegram\Bot\Api;

$telegram = new Api('7402378731:AAF_-wl_byFnbHWCS3-f-OzyfJkBrrHUvDM');

$updates = $telegram->getWebhookUpdate();

$message = $updates->getMessage();

$id = $updates->getChat()->get('chat_id');


$response = $telegram->sendMessage([
  'chat_id' => $id,
  'text' => 'Hello World'
]);


//use Telegram\Bot\Api;
//
//$telegram = new Api('7402378731:AAF_-wl_byFnbHWCS3-f-OzyfJkBrrHUvDM');
////$result = $telegram->getUpdates();
//
//$id = $telegram->getChat()->id;
//
//function ruToEnLayout($text) : string {
//    $ru = ['й', 'ц', 'у', 'к', 'е', 'н', 'г', 'ш', 'щ', 'з', 'х', 'ъ', 'ф', 'ы', 'в', 'а', 'п', 'р', 'о', 'л', 'д', 'ж', 'э', 'я', 'ч', 'с', 'м', 'и', 'т', 'ь', 'б', 'ю'];
//    $en = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', '[', ']', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', ';', '\'', 'z', 'x', 'c', 'v', 'b', 'n', 'm', ',', '.'];
//    return str_replace($ru, $en, $text);
//}
//
//$telegram->sendMessage(['id' => $id,'text' => 'text']);