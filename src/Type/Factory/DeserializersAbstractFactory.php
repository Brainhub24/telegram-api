<?php

declare(strict_types=1);

namespace PHPTCloud\TelegramApi\Type\Factory;

use PHPTCloud\TelegramApi\DeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatInviteLinkDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatLocationDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatMemberAdministratorDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatMemberBannedDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatMemberDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatMemberLeftDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatMemberMemberDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatMemberOwnerDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatMemberRestrictedDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatPermissionsDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatPhotoDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\LocationDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\MessageDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\MessageIdDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ReactionTypeCustomEmojiDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ReactionTypeDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ReactionTypeEmojiDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\UserDeserializer;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatInviteLinkDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatLocationDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatMemberAdministratorDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatMemberBannedDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatMemberDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatMemberLeftDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatMemberMemberDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatMemberOwnerDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatMemberRestrictedDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatPermissionsDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ChatPhotoDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\LocationDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\MessageDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\MessageIdDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ReactionTypeCustomEmojiDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ReactionTypeDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\ReactionTypeEmojiDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Deserializer\UserDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatInviteLinkTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatLocationTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatMemberAdministratorTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatMemberBannedTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatMemberLeftTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatMemberMemberTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatMemberOwnerTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatMemberRestrictedTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatPermissionsTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatPhotoTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ChatTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\DeserializersAbstractFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\LocationTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\MessageIdTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\MessageTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ReactionTypeCustomEmojiTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\ReactionTypeEmojiTypeFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\TypeFactoriesAbstractFactoryInterface;
use PHPTCloud\TelegramApi\Type\Interfaces\Factory\UserTypeFactoryInterface;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 */
class DeserializersAbstractFactory implements DeserializersAbstractFactoryInterface
{
    public function __construct(
        private readonly TypeFactoriesAbstractFactoryInterface $typeFactoriesAbstractFactory,
    ) {
    }

    public function create(string $type): DeserializerInterface
    {
        switch ($type) {
            case UserDeserializerInterface::class:
            case UserDeserializer::class:
                return $this->createUserDeserializer();
            case MessageDeserializer::class:
            case MessageDeserializerInterface::class:
                return $this->createMessageDeserializer();
            case ChatDeserializer::class:
            case ChatDeserializerInterface::class:
                return $this->createChatDeserializer();
            case ChatPhotoDeserializer::class:
            case ChatPhotoDeserializerInterface::class:
                return $this->createChatPhotoDeserializer();
            case ReactionTypeDeserializer::class:
            case ReactionTypeDeserializerInterface::class:
                return $this->createReactionTypeDeserializer();
            case ReactionTypeCustomEmojiDeserializer::class:
            case ReactionTypeCustomEmojiDeserializerInterface::class:
                return $this->createReactionTypeCustomEmojiDeserializer();
            case ReactionTypeEmojiDeserializer::class:
            case ReactionTypeEmojiDeserializerInterface::class:
                return $this->createReactionTypeEmojiDeserializer();
            case ChatPermissionsDeserializer::class:
            case ChatPermissionsDeserializerInterface::class:
                return $this->createChatPermissionsDeserializer();
            case ChatLocationDeserializer::class:
            case ChatLocationDeserializerInterface::class:
                return $this->createChatLocationDeserializer();
            case LocationDeserializer::class:
            case LocationDeserializerInterface::class:
                return $this->createLocationDeserializer();
            case MessageIdDeserializer::class:
            case MessageIdDeserializerInterface::class:
                return $this->createMessageIdDeserializer();
            case ChatInviteLinkDeserializer::class:
            case ChatInviteLinkDeserializerInterface::class:
                return $this->createChatInviteLinkDeserializer();
            case ChatMemberDeserializer::class:
            case ChatMemberDeserializerInterface::class:
                return $this->createChatMemberDeserializer();
            case ChatMemberBannedDeserializer::class:
            case ChatMemberBannedDeserializerInterface::class:
                return $this->createChatMemberBannedDeserializer();
            case ChatMemberAdministratorDeserializer::class:
            case ChatMemberAdministratorDeserializerInterface::class:
                return $this->createChatMemberAdministratorDeserializer();
            case ChatMemberOwnerDeserializer::class:
            case ChatMemberOwnerDeserializerInterface::class:
                return $this->createChatMemberOwnerDeserializer();
            case ChatMemberRestrictedDeserializer::class:
            case ChatMemberRestrictedDeserializerInterface::class:
                return $this->createChatMemberRestrictedDeserializer();
            case ChatMemberLeftDeserializer::class:
            case ChatMemberLeftDeserializerInterface::class:
                return $this->createChatMemberLeftDeserializer();
            case ChatMemberMemberDeserializer::class:
            case ChatMemberMemberDeserializerInterface::class:
                return $this->createChatMemberMemberDeserializer();
            default:
                throw new \InvalidArgumentException(sprintf('Десериалайзер с типом "%s" не определен.', $type));
        }
    }

    public function createUserDeserializer(): UserDeserializerInterface
    {
        /** @var UserTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(UserTypeFactoryInterface::class);

        return new UserDeserializer($typeFactory);
    }

    public function createMessageDeserializer(bool $wantCreateMessageDeserializer = true): MessageDeserializerInterface
    {
        /** @var MessageTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(MessageTypeFactoryInterface::class);

        return new MessageDeserializer(
            $typeFactory,
            $this->createChatDeserializer($wantCreateMessageDeserializer),
        );
    }

    /**
     * @param bool $wantCreateMessageDeserializer - флаг для того, чтобы избежать циклической зависимости между
     *                                            ChatDeserializer и MessageDeserializer
     */
    public function createChatDeserializer(bool $wantCreateMessageDeserializer = true): ChatDeserializerInterface
    {
        /** @var ChatTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatTypeFactoryInterface::class);

        $messageDeserializer = null;
        if ($wantCreateMessageDeserializer) {
            $messageDeserializer = $this->createMessageDeserializer(false);
        }

        return new ChatDeserializer(
            $typeFactory,
            $this->createChatPhotoDeserializer(),
            $this->createReactionTypeDeserializer(),
            $this->createChatPermissionsDeserializer(),
            $this->createChatLocationDeserializer(),
            $messageDeserializer,
        );
    }

    public function createChatPhotoDeserializer(): ChatPhotoDeserializerInterface
    {
        /** @var ChatPhotoTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatPhotoTypeFactoryInterface::class);

        return new ChatPhotoDeserializer($typeFactory);
    }

    public function createReactionTypeDeserializer(): ReactionTypeDeserializerInterface
    {
        return new ReactionTypeDeserializer(
            $this->createReactionTypeCustomEmojiDeserializer(),
            $this->createReactionTypeEmojiDeserializer(),
        );
    }

    public function createReactionTypeCustomEmojiDeserializer(): ReactionTypeCustomEmojiDeserializerInterface
    {
        /** @var ReactionTypeCustomEmojiTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ReactionTypeCustomEmojiTypeFactoryInterface::class);

        return new ReactionTypeCustomEmojiDeserializer($typeFactory);
    }

    public function createReactionTypeEmojiDeserializer(): ReactionTypeEmojiDeserializerInterface
    {
        /** @var ReactionTypeEmojiTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ReactionTypeEmojiTypeFactoryInterface::class);

        return new ReactionTypeEmojiDeserializer($typeFactory);
    }

    public function createChatPermissionsDeserializer(): ChatPermissionsDeserializerInterface
    {
        /** @var ChatPermissionsTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatPermissionsTypeFactoryInterface::class);

        return new ChatPermissionsDeserializer($typeFactory);
    }

    public function createChatLocationDeserializer(): ChatLocationDeserializerInterface
    {
        /** @var ChatLocationTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatLocationTypeFactoryInterface::class);

        return new ChatLocationDeserializer($typeFactory, $this->createLocationDeserializer());
    }

    public function createLocationDeserializer(): LocationDeserializerInterface
    {
        /** @var LocationTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(LocationTypeFactoryInterface::class);

        return new LocationDeserializer($typeFactory);
    }

    public function createMessageIdDeserializer(): MessageIdDeserializerInterface
    {
        /** @var MessageIdTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(MessageIdTypeFactoryInterface::class);

        return new MessageIdDeserializer($typeFactory);
    }

    public function createChatInviteLinkDeserializer(): ChatInviteLinkDeserializerInterface
    {
        /** @var ChatInviteLinkTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatInviteLinkTypeFactoryInterface::class);

        return new ChatInviteLinkDeserializer($typeFactory, $this->createUserDeserializer());
    }

    public function createChatMemberDeserializer(): ChatMemberDeserializerInterface
    {
        return new ChatMemberDeserializer(
            $this->createChatMemberAdministratorDeserializer(),
            $this->createChatMemberOwnerDeserializer(),
            $this->createChatMemberLeftDeserializer(),
            $this->createChatMemberRestrictedDeserializer(),
            $this->createChatMemberMemberDeserializer(),
            $this->createChatMemberBannedDeserializer(),
        );
    }

    public function createChatMemberBannedDeserializer(): ChatMemberBannedDeserializerInterface
    {
        /** @var ChatMemberBannedTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatMemberBannedTypeFactoryInterface::class);

        return new ChatMemberBannedDeserializer($typeFactory, $this->createUserDeserializer());
    }

    public function createChatMemberAdministratorDeserializer(): ChatMemberAdministratorDeserializerInterface
    {
        /** @var ChatMemberAdministratorTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatMemberAdministratorTypeFactoryInterface::class);

        return new ChatMemberAdministratorDeserializer($typeFactory, $this->createUserDeserializer());
    }

    public function createChatMemberOwnerDeserializer(): ChatMemberOwnerDeserializerInterface
    {
        /** @var ChatMemberOwnerTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatMemberOwnerTypeFactoryInterface::class);

        return new ChatMemberOwnerDeserializer($typeFactory, $this->createUserDeserializer());
    }

    public function createChatMemberMemberDeserializer(): ChatMemberMemberDeserializerInterface
    {
        /** @var ChatMemberMemberTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatMemberMemberTypeFactoryInterface::class);

        return new ChatMemberMemberDeserializer($typeFactory, $this->createUserDeserializer());
    }

    public function createChatMemberRestrictedDeserializer(): ChatMemberRestrictedDeserializerInterface
    {
        /** @var ChatMemberRestrictedTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatMemberRestrictedTypeFactoryInterface::class);

        return new ChatMemberRestrictedDeserializer($typeFactory, $this->createUserDeserializer());
    }

    public function createChatMemberLeftDeserializer(): ChatMemberLeftDeserializerInterface
    {
        /** @var ChatMemberLeftTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatMemberLeftTypeFactoryInterface::class);

        return new ChatMemberLeftDeserializer($typeFactory, $this->createUserDeserializer());
    }
}
