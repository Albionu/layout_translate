<?php

require_once  "vendor/autoload.php";

use Telegram\Bot\Api;

$telegram = new Api('7402378731:AAF_-wl_byFnbHWCS3-f-OzyfJkBrrHUvDM');

try {
    $updates = $telegram->getWebhookUpdate();
    
    $message = $updates->getMessage();
    
    $id = $message->get('chat')->id;
    
    if($message->has('forward_origin'))
        $is_forwarded = true;
    
    $response = $telegram->sendMessage([
      'chat_id' => $id,
      'text' => ruToEnLayout($message->get('text'), $is_forwarded),
    ]);
    
    file_put_contents('output.txt', "Message sent successfully\n", FILE_APPEND);
} catch (\Telegram\Bot\Exceptions\TelegramSDKException $e) {
    file_put_contents('output.txt', "Error: " . 'not sent' . "\n", FILE_APPEND);
} catch (Exception $e) {
    file_put_contents('output.txt', "Error: " . 'trash' . "\n", FILE_APPEND);
}

file_put_contents('output.txt', "Request getten " . rand(0, PHP_INT_MAX) . "\n", FILE_APPEND);

function ruToEnLayout(string $text, bool $is_forwarded = false) : string {
    $ru = ['й', 'ц', 'у', 'к', 'е', 'н', 'г', 'ш', 'щ', 'з', 'х', 'ъ', 'ф', 'ы', 'в', 'а', 'п', 'р', 'о', 'л', 'д', 'ж', 'э', 'я', 'ч', 'с', 'м', 'и', 'т', 'ь', 'б', 'ю', 'ё', 'Ё'];
    $en = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', '[', ']', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', ';', '\'', 'z', 'x', 'c', 'v', 'b', 'n', 'm', ',', '.', '`', '~'];
    return $is_forwarded?str_replace($en, $ru, $text):str_replace($ru, $en, $text);
}