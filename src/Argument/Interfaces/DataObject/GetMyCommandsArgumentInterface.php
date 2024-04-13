<?php
declare(strict_types=1);

namespace PHPTCloud\TelegramApi\Argument\Interfaces\DataObject;

interface GetMyCommandsArgumentInterface extends ArgumentInterface
{
    /**
     * @return BotCommandScopeAllChatAdministratorsArgumentInterface
     * @return BotCommandScopeAllGroupChatsArgumentInterface
     * @return BotCommandScopeAllPrivateChatsArgumentInterface
     * @return BotCommandScopeArgumentInterface
     * @return BotCommandScopeChatAdministratorsArgumentInterface
     * @return BotCommandScopeChatArgumentInterface
     * @return BotCommandScopeChatMemberArgumentInterface
     * @return BotCommandScopeDefaultArgumentInterface
     * @return null
     */
    public function getScope(): ?BotCommandScopeArgumentInterface;

    public function getLanguageCode(): ?string;
}
