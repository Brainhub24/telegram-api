<?php
declare(strict_types=1);

namespace PHPTCloud\TelegramApi\DomainService\Factory;

use PHPTCloud\TelegramApi\Argument\Factory\SerializersAbstractFactoryInterface;
use PHPTCloud\TelegramApi\DomainService\ChatDomainService;
use PHPTCloud\TelegramApi\DomainService\Interfaces\ChatDomainServiceInterface;
use PHPTCloud\TelegramApi\Exception\Interfaces\ExceptionAbstractFactoryInterface;
use PHPTCloud\TelegramApi\Request\Request;
use PHPTCloud\TelegramApi\TelegramApiManagerInterface;
use PHPTCloud\TelegramApi\TelegramBotInterface;
use PHPTCloud\TelegramApi\Type\Factory\DeserializersAbstractFactoryInterface;

/**
 * @author  Пешко Илья peshkoi@mail.ru
 * @version 1.0.0
 */
class ChatDomainServiceFactory implements ChatDomainServiceFactoryInterface
{
    public function __construct(
        private readonly DeserializersAbstractFactoryInterface $deserializersAbstractFactory,
        private readonly SerializersAbstractFactoryInterface   $serializersAbstractFactory,
        private readonly ExceptionAbstractFactoryInterface     $exceptionAbstractFactory,
    ) {}

    public function create(
        ?TelegramBotInterface $telegramBot = null,
        ?string               $host = TelegramApiManagerInterface::TELEGRAM_API_HOST,
    ): ChatDomainServiceInterface {
        return new ChatDomainService(
            Request::getInstance($telegramBot, $host),
            $this->serializersAbstractFactory,
            $this->deserializersAbstractFactory,
            $this->exceptionAbstractFactory,
        );
    }
}