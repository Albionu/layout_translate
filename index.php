<?php

require_once  'vendor/autoload.php';
require_once  'src/switcher.php';

use Telegram\Bot\Api;

$api = new Api(token: getenv('TELEGRAM_BOT_TOKEN'));

$message = $api->getWebhookUpdate()->getMessage();

$chat = $message->get('chat');

$text = $message->get('text');

$api->sendMessage([
  'chat_id' => $chat->id,
  'text' => ($text == '/start')?'Отправьте мне сообщение для начала':switcher($text, !$message->has('forward_origin')),
]);

die();