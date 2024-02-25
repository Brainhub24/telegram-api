<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

if (!str_starts_with(phpversion(), '8')) {
    throw new \RuntimeException('Примеры использования библиотеки не работают с PHP ниже 8 версии.');
}

// Загружаем переменные из .env
$dotenv = new Symfony\Component\Dotenv\Dotenv();
$dotenv->load(__DIR__ . '/.env');

$token = $_ENV['TELEGRAM_BOT_TOKEN'];
$chatId = $_ENV['TELEGRAM_CHAT_ID'];

// Инициализируем менеджер для интеграции с Telegram API
$manager = PHPTCloud\TelegramApi\TelegramApiManagerFactory::create($token);

$actions = array_column(\PHPTCloud\TelegramApi\DomainService\Enums\ChatActionEnum::cases(), 'value');

// Отправляем все типы "действий" бота и удерживаем статус 3 секунды.
foreach ($actions as $action) {
    $manager->sendChatAction(new \PHPTCloud\TelegramApi\Argument\DataObject\SendChatActionArgument($chatId, $action));
    sleep(3);
}
