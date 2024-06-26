<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\InvalidArgumentException;
use TelegramBot\Api\TypeInterface;

/**
 * Class Sticker
 * This object represents a sticker.
 *
 * @package TelegramBot\Api\Types
 */
class Sticker extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $requiredParams = [
        'file_id',
        'file_unique_id',
        'type',
        'width',
        'height',
        'is_animated',
        'is_video',
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'type' => true,
        'width' => true,
        'height' => true,
        'is_animated' => true,
        'is_video' => true,
        'thumb' => PhotoSize::class,
        'emoji' => true,
        'set_name' => true,
        'premium_animation' => File::class,
        'mask_position' => MaskPosition::class,
        'custom_emoji_id' => true,
        'file_size' => true,
    ];

    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;


    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     *
     * @var string
     */
    protected $fileUniqueId;

    /**
     * Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is independent from its format, which is determined by the fields is_animated and is_video.
     *
     * @var string
     */
    protected $type;

    /**
     * Sticker width
     *
     * @var int
     */
    protected $width;

    /**
     * Sticker height
     *
     * @var int
     */
    protected $height;

    /**
     * True, if the sticker is animated
     *
     * @var bool
     */
    protected $isAnimated;

    /**
     * True, if the sticker is a video sticker
     *
     * @var bool
     */
    protected $isVideo;

    /**
     * True, if the sticker is a video sticker
     */
    /**
     * Document thumbnail as defined by sender
     *
     * @var PhotoSize
     */
    protected $thumb;

    /**
     * Optional. Emoji associated with the sticker
     *
     * @var string
     */
    protected $emoji;

    /**
     * Optional. Name of the sticker set to which the sticker belongs
     *
     * @var string
     */
    protected $setName;

    /**
     * Optionl. For premium regular stickers, premium animation for the sticker
     *
     * @var File
     */
    protected $premiumAnimation;

    /**
     * Optional. For mask stickers, the position where the mask should be placed.
     *
     * @var MaskPosition
     */
    protected $maskPosition;

    /**
     * Optional. For custom emoji stickers, unique identifiers of the custome emoji.
     *
     * @var string
     */
    protected $customEmojiId;

    /**
     * Optional. File size
     *
     * @var int
     */
    protected $fileSize;

    /**
     * @return string
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
    }

    /**
     * @return string
     */
    public function getFileUniqueId()
    {
        return $this->fileUniqueId;
    }

    /**
     * @param string $fileUniqueId
     */
    public function setFileUniqueId($fileUniqueId)
    {
        $this->fileUniqueId = $fileUniqueId;
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
     * @return int
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     *
     * @throws InvalidArgumentException
     */
    public function setFileSize($fileSize)
    {
        if (is_integer($fileSize)) {
            $this->fileSize = $fileSize;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @throws InvalidArgumentException
     */
    public function setHeight($height)
    {
        if (is_integer($height)) {
            $this->height = $height;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return bool
     */
    public function isAnimated()
    {
        return $this->isAnimated;
    }

    /**
     * @param bool $isAnimated
     */
    public function setIsAnimated($isAnimated)
    {
        $this->isAnimated = $isAnimated;
    }

    /**
     * @return bool
     */
    public function isVideo()
    {
        return $this->isVideo;
    }

    /**
     * @param bool $isVideo
     */
    public function setIsVideo($isVideo)
    {
        $this->isVideo = $isVideo;
    }

    /**
     * @return PhotoSize
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize $thumb
     */
    public function setThumb(PhotoSize $thumb)
    {
        $this->thumb = $thumb;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @throws InvalidArgumentException
     */
    public function setWidth($width)
    {
        if (is_integer($width)) {
            $this->width = $width;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return string
     */
    public function getEmoji()
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     */
    public function setEmoji($emoji)
    {
        $this->emoji = $emoji;
    }

    /**
     * @return string
     */
    public function getSetName()
    {
        return $this->setName;
    }

    /**
     * @param string $setName
     */
    public function setSetName($setName)
    {
        $this->setName = $setName;
    }

    /**
     * @return File
     */
    public function getPremiumAnimation()
    {
        return $this->premiumAnimation;
    }

    /**
     * @param File $premiumAnimation
     */
    public function setPremiumAnimation($premiumAnimation)
    {
        $this->premiumAnimation = $premiumAnimation;
    }

    /**
     * @return string
     */
    public function getCustomEmojiId()
    {
        return $this->customEmojiId;
    }

    /**
     * @param string $customEmojiId
     */
    public function setCustomEmojiId($customEmojiId)
    {
        $this->customEmojiId = $customEmojiId;
    }

    /**
     * @return MaskPosition
     */
    public function getMaskPosition()
    {
        return $this->maskPosition;
    }

    /**
     * @param MaskPosition $maskPosition
     */
    public function setMaskPosition($maskPosition)
    {
        $this->maskPosition = $maskPosition;
    }
}
