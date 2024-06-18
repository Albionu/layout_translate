<?php

require_once  "vendor/autoload.php";

use Telegram\Bot\Api;

$telegram = new Api(token: '7402378731:AAF_-wl_byFnbHWCS3-f-OzyfJkBrrHUvDM');

$updates = $telegram->getWebhookUpdate();

$message = $updates->getMessage();

$chat = $message->get('chat');

$text = $message->get('text');

$id = $chat->id;

$is_forwarded = false;

if ($text == '/start') {startFunc($telegram, $id); die();}

if($message->has('forward_origin'))
    $is_forwarded = true;

$MAP = [
  '`' => 'ё','q' => 'й','w' => 'ц','e' => 'у','r' => 'к','t' => 'е','y' => 'н','u' => 'г','i' => 'ш','o' => 'щ','p' => 'з','[' => 'х',']' => 'ъ',
  'a' => 'ф','s' => 'ы','d' => 'в','f' => 'а','g' => 'п','h' => 'р','j' => 'о','k' => 'л','l' => 'д',';' => 'ж',"'" => "э",
  'z' => 'я','x' => 'ч','c' => 'с','v' => 'м','b' => 'и','n' => 'т','m' => 'ь',',' => 'б','.' => 'ю','/' => '.',
  '~' => 'Ё','Q' => 'Ё','W' => 'Ц','E' => 'У','R' => 'К','T' => 'Е','Y' => 'Н','U' => 'Г','I' => 'Ш','O' => 'Щ','P' => 'З','{' => 'Х','}' => 'Ъ',
  'A' => 'Ф','S' => 'Ы','D' => 'В','F' => 'А','G' => 'П','H' => 'Р','J' => 'О','K' => 'Л','L' => 'Д',':' => 'Ж','"' => 'Э',
  'Z' => 'Я','X' => 'Ч','C' => 'С','V' => 'М','B' => 'И','N' => 'Т','M' => 'Ь','<' => 'Б','>' => 'Ю','?' => ',',
];

if ($is_forwarded)
    $MAP = array_flip($MAP);

$res = '';

foreach (mb_str_split($text) as $char)
    $res .= $MAP[$char];

$response = $telegram->sendMessage([
  'chat_id' => $id,
  'text' => $res,
]);


function startFunc (object $telegram, int $ChatId) : void {
    $telegram->sendMessage([
      'chat_id' => $ChatId,
      'text' => 'Отправьте мне сообщение для начала',
    ]);
}


die();

//$ru = [
//  '`','q','w','e','r','t','y','u','i','o','p','[',']',
//        'a','s','d','f','g','h','j','k','l',';',"'",
//         'z','x','c','v','b','n','m',',','.','/',
//  '~','Q','W','E','R','T','Y','U','I','O','P','{','}',
//        'A','S','D','F','G','H','J','K','L',':','"',
//         'Z','X','C','V','B','N','M','<','>','?',
//];
//
//$en = [
//  'ё','й','ц','у','к','е','н','г','ш','щ','з','х','ъ',
//        'ф','ы','в','а','п','р','о','л','д','ж',"э",
//         'я','ч','с','м','и','т','ь','б','ю','.',
//  'Ё','Й','Ц','У','К','Е','Н','Г','Ш','Щ','З','Х','Ъ',
//        'Ф','Ы','В','А','П','Р','О','Л','Д','Ж',"Э",
//         'Я','Ч','С','М','И','Т','Ь','Б','Ю',',',
//];