<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

class Chat extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = ['id', 'type'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'id' => true,
        'type' => true,
        'title' => true,
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'is_forum' => true,
        'photo' => ChatPhoto::class,
        'active_usernames' => true,
        'emoji_status_custom_emoji_id' => true,
        'bio' => true,
        'has_private_forwards' => true,
        'has_restricted_voice_and_video_messages' => true,
        'join_to_send_messages' => true,
        'join_by_request' => true,
        'description' => true,
        'invite_link' => true,
        'pinned_message' => Message::class,
        'permissions' => ChatPermissions::class,
        'slow_mode_delay' => true,
        'message_auto_delete_time' => true,
        'has_hidden_members' => true,
        'has_protected_content' => true,
        'sticker_set_name' => true,
        'can_set_sticker_set' => true,
        'linked_chat_id' => true,
        'location' => ChatLocation::class,
    ];

    /**
     * Unique identifier for this chat, not exceeding 1e13 by absolute value
     *
     * @var int|string
     */
    protected $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     *
     * @var string
     */
    protected $type;

    /**
     * Optional. Title, for channels and group chats
     *
     * @var string
     */
    protected $title;

    /**
     * Optional. Username, for private chats and channels if available
     *
     * @var string
     */
    protected $username;

    /**
     * Optional. First name of the other party in a private chat
     *
     * @var string
     */
    protected $firstName;

    /**
     * Optional. Last name of the other party in a private chat
     *
     * @var string
     */
    protected $lastName;

    /**
     * Optionl. True if the supergroup chat is a forum (has topics enabled)
     *
     * @var bool
     */
    protected $isForum;

    /**
     * Optional. Chat photo. Returned only in getChat.
     *
     * @var ChatPhoto
     */
    protected $photo;

    /**
     * Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels. Returned only in getChat.
     *
     * @var array
     */
    protected $activeUsernames;

    /**
     *  	Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels. Returned only in getChat.
     *
     * @val string
     */
    protected $emojiStatusCustomEmojiId;

    /**
     * Optional. Bio of the other party in a private chat. Returned only in getChat
     *
     * @var string
     */
    protected $bio;

    /**
     * Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user. Returned only in getChat.
     *
     * @var bool
     */
    protected $hasPrivateForwards;

    /**
     * Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat. Returned only in getChat.
     *
     * @var bool
     */
    protected $hasRestrictedVoiceAndVideoMessages;

    /**
     * Optional. True, if users need to join the supergroup before they can send messages. Returned only in getChat.
     *
     * @var bool
     */
    protected $joinToSendMessages;

    /**
     * Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned only in getChat.
     *
     * @var bool
     */
    protected $joinByRequest;

    /**
     * Optional. Description, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string
     */
    protected $description;

    /**
     * Optional. Chat invite link, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string
     */
    protected $inviteLink;

    /**
     * Optional. Pinned message, for supergroups. Returned only in getChat.
     *
     * @var Message
     */
    protected $pinnedMessage;

    /**
     * Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
     *
     * @var ChatPermissions
     */
    protected $permissions;

    /**
     * Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged
     * user. Returned only in getChat.
     *
     * @var int
     */
    protected $slowModeDelay;

    /**
     * Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in getChat.
     *
     * @var integer
     */
    protected $messageAutoDeleteTime;


    /**
     * Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators. Returned only in getChat.
     *
     * @var bool
     */
    protected $hasAggressiveAntiSpamEnabled;

    /**
     * Optional. True if non-administrators can only get the list of bots and administrators in the chat. Returned only in getChat.
     *
     * @var bool
     */
    protected $hasHiddenMembers;

    /**
     * Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat.
     *
     * @var bool
     */
    protected $hasProtectedContent;

    /**
     * Optional. For supergroups, name of group sticker set. Returned only in getChat.
     *
     * @var string
     */
    protected $stickerSetName;

    /**
     * Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     *
     * @var bool
     */
    protected $canSetStickerSet;

    /**
     * Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice
     * versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64
     * bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat.
     *
     * @var int
     */
    protected $linkedChatId;

    /**
     * Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat.
     *
     * @var ChatLocation
     */
    protected $location;

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|string $id
     *
     * @throws InvalidArgumentException
     */
    public function setId($id)
    {
        if (is_integer($id) || is_float($id) || is_string($id)) {
            $this->id = $id;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return bool
     */
    public function isForum()
    {
        return $this->isForum;
    }

    /**
     * @param bool $isForum
     */
    public function setIsForum($isForum)
    {
        $this->isForum = $isForum;
    }

    /**
     * @return ChatPhoto
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param ChatPhoto $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return array
     */
    public function getActiveUsernames()
    {
        return $this->activeUsernames;
    }

    /**
     * @param array $activeUsernames
     */
    public function setActiveUsernames($activeUsernames)
    {
        $this->activeUsernames = $activeUsernames;
    }

    /**
     * @return string
     */
    public function getEmojiStatusCustomEmojiId()
    {
        return $this->emojiStatusCustomEmojiId;
    }

    /**
     * @param string
     */
    public function setEmojiStatusCustomEmojiId($emojiStatusCustomEmojiId)
    {
        $this->emojiStatusCustomEmojiId = $emojiStatusCustomEmojiId;
    }

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return bool
     */
    public function getHasPrivateForwards()
    {
        return $this->hasPrivateForwards;
    }

    /**
     * @param bool $hasPrivateForwards
     */
    public function setHasPrivateForwards($hasPrivateForwards)
    {
        $this->hasPrivateForwards = $hasPrivateForwards;
    }

    /**
     * @return bool
     */
    public function getHasRestrictedVoiceAndVideoMessages()
    {
        return $this->hasRestrictedVoiceAndVideoMessages;
    }

    /**
     * @param bool $hasRestrictedVoiceAndVideoMessages
     */
    public function setHasRestrictedVoiceAndVideoMessages($hasRestrictedVoiceAndVideoMessages)
    {
        $this->hasRestrictedVoiceAndVideoMessages = $hasRestrictedVoiceAndVideoMessages;
    }

    /**
     * @return bool
     */
    public function getJoinToSendMessages()
    {
        return $this->joinToSendMessages;
    }

    /**
     * @param bool $joinToSendMessages
     */
    public function setJoinToSendMessages($joinToSendMessages)
    {
        $this->joinToSendMessages = $joinToSendMessages;
    }

    /**
     * @return bool
     */
    public function getJoinByRequest()
    {
        return $this->joinByRequest;
    }

    /**
     * @param bool $joinByRequest
     */
    public function setJoinByRequest($joinByRequest)
    {
        $this->joinByRequest = $joinByRequest;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getInviteLink()
    {
        return $this->inviteLink;
    }

    /**
     * @param string $inviteLink
     */
    public function setInviteLink($inviteLink)
    {
        $this->inviteLink = $inviteLink;
    }

    /**
     * @return Message
     */
    public function getPinnedMessage()
    {
        return $this->pinnedMessage;
    }

    /**
     * @param Message $pinnedMessage
     */
    public function setPinnedMessage($pinnedMessage)
    {
        $this->pinnedMessage = $pinnedMessage;
    }

    /**
     * @return ChatPermissions
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param ChatPermissions $permissions
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @return int
     */
    public function getSlowModeDelay()
    {
        return $this->slowModeDelay;
    }

    /**
     * @param int $slowModeDelay
     */
    public function setSlowModeDelay($slowModeDelay)
    {
        $this->slowModeDelay = $slowModeDelay;
    }

    /**
     * @return integer
     */
    public function getMessageAutoDeleteTime()
    {
        return $this->messageAutoDeleteTime;
    }

    /**
     * @param integer $messageAutoDeleteTime
     */
    public function setMessageAutoDeleteTime($messageAutoDeleteTime)
    {
        $this->messageAutoDeleteTime = $messageAutoDeleteTime;
    }


    /**
     * @return bool
     */
    public function hasAggressiveAntiSpamEnabled()
    {
        return $this->hasAggressiveAntiSpamEnabled;
    }

    /**
     * @param bool $hasAggressiveAntiSpamEnabled
     */
    public function setHasAggressiveAntiSpamEnabled($hasAggressiveAntiSpamEnabled)
    {
        $this->hasAggressiveAntiSpamEnabled = $hasAggressiveAntiSpamEnabled;
    }

    /**
     * @return bool
     */
    public function hasHiddenMembers()
    {
        return $this->hasHiddenMembers;
    }

    /**
     * @param bool $hasHiddenMembers
     */
    public function setHasHiddenMembers($hasHiddenMembers)
    {
        $this->hasHiddenMembers = $hasHiddenMembers;
    }

    /**
     * @return bool
     */
    public function getHasProtectedContent()
    {
        return $this->hasProtectedContent;
    }

    /**
     * @param bool $hasProtectedContent
     */
    public function setHasProtectedContent($hasProtectedContent)
    {
        $this->hasProtectedContent = $hasProtectedContent;
    }

    /**
     * @return string
     */
    public function getStickerSetName()
    {
        return $this->stickerSetName;
    }

    /**
     * @param string $stickerSetName
     */
    public function setStickerSetName($stickerSetName)
    {
        $this->stickerSetName = $stickerSetName;
    }

    /**
     * @return bool
     */
    public function isCanSetStickerSet()
    {
        return $this->canSetStickerSet;
    }

    /**
     * @param bool $canSetStickerSet
     */
    public function setCanSetStickerSet($canSetStickerSet)
    {
        $this->canSetStickerSet = $canSetStickerSet;
    }

    /**
     * @return int
     */
    public function getLinkedChatId()
    {
        return $this->linkedChatId;
    }

    /**
     * @param int $linkedChatId
     */
    public function setLinkedChatId($linkedChatId)
    {
        $this->linkedChatId = $linkedChatId;
    }

    /**
     * @return ChatLocation
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param ChatLocation $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
}
