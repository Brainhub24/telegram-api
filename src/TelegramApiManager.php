<?php

declare(strict_types=1);

namespace PHPTCloud\TelegramApi;

use PHPTCloud\TelegramApi\Argument\Interfaces\DataObject\ChatIdArgumentInterface;
use PHPTCloud\TelegramApi\Argument\Interfaces\DataObject\MessageArgumentInterface;
use PHPTCloud\TelegramApi\DomainService\Interfaces\Factory\ChatDomainServiceFactoryInterface;
use PHPTCloud\TelegramApi\DomainService\Interfaces\Factory\MessageDomainServiceFactoryInterface;
use PHPTCloud\TelegramApi\DomainService\Interfaces\Factory\TelegramBotDomainServiceFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\DataObject\ChatInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\DataObject\MessageInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\DataObject\UserInterface;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 *
 * @version 1.0.0
 */
class TelegramApiManager implements TelegramApiManagerInterface
{
    private ?string $host = self::TELEGRAM_API_HOST;

    public function __construct(
        private readonly TelegramBotInterface $bot,
        private readonly TelegramBotDomainServiceFactoryInterface $telegramBotDomainServiceFactory,
        private readonly MessageDomainServiceFactoryInterface $messageDomainServiceFactory,
        private readonly ChatDomainServiceFactoryInterface $chatDomainServiceFactory,
    ) {
    }

    public function setTelegramApiHost(string $host): void
    {
        $this->host = $host;
    }

    public function getBot(): TelegramBotInterface
    {
        return $this->bot;
    }

    public function getMe(): UserInterface
    {
        return $this->telegramBotDomainServiceFactory->create($this->bot, $this->host)->getMe();
    }

    public function logOut(): bool
    {
        return $this->telegramBotDomainServiceFactory->create($this->bot, $this->host)->logOut();
    }

    public function close(): bool
    {
        return $this->telegramBotDomainServiceFactory->create($this->bot, $this->host)->close();
    }

    public function sendMessage(MessageArgumentInterface $argument): MessageInterface
    {
        return $this->messageDomainServiceFactory->create(
            $this->bot,
            $this->host,
        )->sendMessage($argument);
    }

    public function getChat(ChatIdArgumentInterface $argument): ChatInterface
    {
        return $this->chatDomainServiceFactory->create(
            $this->bot,
            $this->host,
        )->getChat($argument);
    }
}
