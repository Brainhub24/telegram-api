<?php
declare(strict_types=1);

require(__DIR__ . '/../vendor/autoload.php');

// Загружаем переменные из .env
$dotenv = new Symfony\Component\Dotenv\Dotenv();
$dotenv->load(__DIR__ . '/.env');

$token = $_ENV['TELEGRAM_BOT_TOKEN'];
$chatId = $_ENV['TELEGRAM_CHAT_ID'];

// Инициализируем менеджер для интеграции с Telegram API
$manager = PHPTCloud\TelegramApi\TelegramApiManagerFactory::create($token);

/**
 * Используйте этот метод, чтобы получать актуальную информацию о чате. Возвращает объект Chat в случае
 * успеха
 * @link https://core.telegram.org/bots/api#getchat
 */
dump($manager->getChat(new PHPTCloud\TelegramApi\Argument\DataObject\ChatIdArgument($chatId)));
