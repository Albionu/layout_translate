<?php

require_once  "vendor/autoload.php";

use Telegram\Bot\Api;

$telegram = new Api(token: '7402378731:AAF_-wl_byFnbHWCS3-f-OzyfJkBrrHUvDM');

$message = $telegram->getWebhookUpdate()->getMessage();

$chat = $message->get('chat');

$text = $message->get('text');

$id = $chat->id;

if ($text == '/start') {startFunc($telegram, $id); die();}

$response = $telegram->sendMessage([
  'chat_id' => $id,
  'text' => switcher($text, $message->has('forward_origin')),
]);

function startFunc (object $telegram, int $ChatId) : void {
    $telegram->sendMessage([
      'chat_id' => $ChatId,
      'text' => 'Отправьте мне сообщение для начала',
    ]);
}

function switcher(string $text = "", bool $reverse = false) : string
{
    $converter = [
      'f' => 'а',',' => 'б','d' => 'в',	'u' => 'г',	'l' => 'д',	't' => 'е',	'`' => 'ё',
      ';' => 'ж','p' => 'з','b' => 'и',	'q' => 'й',	'r' => 'к',	'k' => 'л',	'v' => 'м',
      'y' => 'н','j' => 'о','g' => 'п',	'h' => 'р',	'c' => 'с',	'n' => 'т',	'e' => 'у',
      'a' => 'ф','[' => 'х','w' => 'ц',	'x' => 'ч',	'i' => 'ш',	'o' => 'щ',	'm' => 'ь',
      's' => 'ы',']' => 'ъ',"'" => "э",	'.' => 'ю',	'z' => 'я',

      'F' => 'А','<' => 'Б','D' => 'В',	'U' => 'Г',	'L' => 'Д',	'T' => 'Е',	'~' => 'Ё',
      ':' => 'Ж','P' => 'З','B' => 'И',	'Q' => 'Й',	'R' => 'К',	'K' => 'Л',	'V' => 'М',
      'Y' => 'Н','J' => 'О','G' => 'П',	'H' => 'Р',	'C' => 'С',	'N' => 'Т',	'E' => 'У',
      'A' => 'Ф','{' => 'Х','W' => 'Ц',	'X' => 'Ч',	'I' => 'Ш',	'O' => 'Щ',	'M' => 'Ь',
      'S' => 'Ы','}' => 'Ъ','"' => 'Э',	'>' => 'Ю',	'Z' => 'Я',

      '@' => '"','#' => '№','$' => ';',	'^' => ':',	'&' => '?',	'/' => '.',	'?' => ',',
    ];

    if ($reverse) $converter = array_flip($converter);

    return strtr($text, $converter);
}

die();