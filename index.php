<?php

require_once  "vendor/autoload.php";

use Telegram\Bot\Api;

$telegram = new Api('7402378731:AAF_-wl_byFnbHWCS3-f-OzyfJkBrrHUvDM');

try {
    $updates = $telegram->getWebhookUpdate();
    
    $response = $telegram->sendMessage([
      'chat_id' => 1311951933,
      'text' => 'text'
    ]);
    
    file_put_contents('output.txt', "Message sent successfully\n", FILE_APPEND);
} catch (\Telegram\Bot\Exceptions\TelegramSDKException $e) {
    file_put_contents('output.txt', "Error: " . $e->getMessage() . "\n", FILE_APPEND);
} catch (Exception $e) {
    file_put_contents('output.txt', "Error: " . $e->getMessage() . "\n", FILE_APPEND);
}


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