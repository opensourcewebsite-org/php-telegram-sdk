<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\Audio;
use TelegramBot\Api\Types\Chat;
use TelegramBot\Api\Types\ChatShared;
use TelegramBot\Api\Types\Contact;
use TelegramBot\Api\Types\Dice;
use TelegramBot\Api\Types\Document;
use TelegramBot\Api\Types\ForumTopicClosed;
use TelegramBot\Api\Types\ForumTopicCreated;
use TelegramBot\Api\Types\ForumTopicEdited;
use TelegramBot\Api\Types\ForumTopicReopened;
use TelegramBot\Api\Types\GroupChat;
use TelegramBot\Api\Types\Location;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\MessageAutoDeleteTimerChanged;
use TelegramBot\Api\Types\PhotoSize;
use TelegramBot\Api\Types\Sticker;
use TelegramBot\Api\Types\User;
use TelegramBot\Api\Types\UserShared;
use TelegramBot\Api\Types\Video;
use TelegramBot\Api\Types\VideoNote;
use TelegramBot\Api\Types\Voice;

class MessageTest extends TestCase
{
    public function testSetMessageId()
    {
        $item = new Message();
        $item->setMessageId(1);
        $this->assertEquals(1, $item->getMessageId());
    }

    public function testSet64bitMessageId()
    {
        $item = new Message();
        $item->setMessageId(2147483648);
        $this->assertEquals(2147483648, $item->getMessageId());
    }

    public function testGetMessageId()
    {
        $item = new Message();
        $item->setMessageId(1);
        $this->assertEquals(1, $item->getMessageId());
    }

    public function testSetCaption()
    {
        $item = new Message();
        $item->setCaption('test');
        $this->assertEquals('test', $item->getCaption());
    }

    public function testGetCaption()
    {
        $item = new Message();
        $item->setCaption('test');
        $this->assertEquals('test', $item->getCaption());
    }

    public function testSetDate()
    {
        $item = new Message();
        $item->setDate(1234567);
        $this->assertEquals(1234567, $item->getDate());
    }

    public function testGetDate()
    {
        $item = new Message();
        $item->setDate(1234567);
        $this->assertEquals(1234567, $item->getDate());
    }

    public function testSetForwardDate()
    {
        $item = new Message();
        $item->setForwardDate(1234567);
        $this->assertEquals(1234567, $item->getForwardDate());
    }

    public function testGetForwardDate()
    {
        $item = new Message();
        $item->setForwardDate(1234567);
        $this->assertEquals(1234567, $item->getForwardDate());
    }

    public function testSetFrom()
    {
        $item = new Message();
        $user = User::fromResponse(array(
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
        $item->setFrom($user);
        $this->assertEquals($user, $item->getFrom());
    }

    public function testGetFrom()
    {
        $item = new Message();
        $user = User::fromResponse(array(
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
        $item->setFrom($user);
        $this->assertEquals($user, $item->getFrom());
        $this->assertInstanceOf('\TelegramBot\Api\Types\User', $item->getFrom());
    }

    public function testSetForwardFrom()
    {
        $item = new Message();
        $user = User::fromResponse(array(
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
        $item->setForwardFrom($user);
        $this->assertEquals($user, $item->getForwardFrom());
    }

    public function testGetForwardFrom()
    {
        $item = new Message();
        $user = User::fromResponse(array(
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
        $item->setForwardFrom($user);
        $this->assertEquals($user, $item->getForwardFrom());
        $this->assertInstanceOf('\TelegramBot\Api\Types\User', $item->getForwardFrom());
    }

    public function testSetChatGroup()
    {
        $item = new Message();
        $chat = Chat::fromResponse(array(
            'id' => 1,
            'type' => 'group',
            'title' => 'test chat'
        ));
        $item->setChat($chat);
        $this->assertEquals($chat, $item->getChat());
    }

    public function testGetChatGroup()
    {
        $item = new Message();
        $chat = Chat::fromResponse(array(
            'id' => 1,
            'type' => 'group',
            'title' => 'test chat'
        ));
        $item->setChat($chat);
        $this->assertEquals($chat, $item->getChat());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Chat', $item->getChat());
    }

    public function testSetChatUser()
    {
        $item = new Message();
        $user = Chat::fromResponse(array(
            'id' => 1,
            'type' => 'private',
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
        $item->setChat($user);
        $this->assertEquals($user, $item->getChat());
    }

    public function testGetChatUser()
    {
        $item = new Message();
        $user = Chat::fromResponse(array(
            'id' => 1,
            'type' => 'private',
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
        $item->setChat($user);
        $this->assertEquals($user, $item->getChat());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Chat', $item->getChat());
    }

    public function testSetContact()
    {
        $item = new Message();
        $contact = Contact::fromResponse(array(
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'phone_number' => '123456',
            'user_id' => 'iGusev'
        ));
        $item->setContact($contact);
        $this->assertEquals($contact, $item->getContact());
    }

    public function testGetContact()
    {
        $item = new Message();
        $contact = Contact::fromResponse(array(
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'phone_number' => '123456',
            'user_id' => 'iGusev'
        ));
        $item->setContact($contact);
        $this->assertEquals($contact, $item->getContact());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Contact', $item->getContact());
    }

    public function testSetDocument()
    {
        $item = new Message();
        $document = Document::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_name' => 'testFileName',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
        $item->setDocument($document);
        $this->assertEquals($document, $item->getDocument());
    }

    public function testGetDocument()
    {
        $item = new Message();
        $document = Document::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_name' => 'testFileName',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
        $item->setDocument($document);
        $this->assertEquals($document, $item->getDocument());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Document', $item->getDocument());
    }

    public function testSetLocation()
    {
        $item = new Message();
        $location = Location::fromResponse(array('latitude' => 55.585827, 'longitude' => 37.675309));
        $item->setLocation($location);
        $this->assertEquals($location, $item->getLocation());
    }

    public function testGetLocation()
    {
        $item = new Message();
        $location = Location::fromResponse(array('latitude' => 55.585827, 'longitude' => 37.675309));
        $item->setLocation($location);
        $this->assertEquals($location, $item->getLocation());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Location', $item->getLocation());
    }

    public function testSetAudio()
    {
        $item = new Message();
        $audio = Audio::fromResponse(array(
            'file_id' => 'testFileId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
        $item->setAudio($audio);
        $this->assertEquals($audio, $item->getAudio());
    }

    public function testGetAudio()
    {
        $item = new Message();
        $audio = Audio::fromResponse(array(
            'file_id' => 'testFileId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
        $item->setAudio($audio);
        $this->assertEquals($audio, $item->getAudio());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Audio', $item->getAudio());
    }

    public function testSetVoice()
    {
        $item = new Message();
        $voice = Voice::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testUniqueFileId',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
        $item->setVoice($voice);
        $this->assertEquals($voice, $item->getVoice());
    }

    public function testGetVoice()
    {
        $item = new Message();
        $voice = Voice::fromResponse(array(
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testUniqueFileId',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3
        ));
        $item->setVoice($voice);
        $this->assertEquals($voice, $item->getVoice());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Voice', $item->getVoice());
    }

    public function testSetVideo()
    {
        $item = new Message();
        $video = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
        $item->setVideo($video);
        $this->assertEquals($video, $item->getVideo());
    }

    public function testGetVideo()
    {
        $item = new Message();
        $video = Video::fromResponse(array(
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumb' => array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            )
        ));
        $item->setVideo($video);
        $this->assertEquals($video, $item->getVideo());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Video', $item->getVideo());
    }

    public function testSetDice()
    {
        $item = new Message();
        $dice = Dice::fromResponse(array(
            'emoji' => '🎲',
            'value' => 3
        ));
        $item->setDice($dice);
        $this->assertEquals($dice, $item->getDice());
    }

    public function testGetDice()
    {
        $item = new Message();
        $dice = Dice::fromResponse(array(
            'emoji' => '🎲',
            'value' => 3
        ));
        $item->setDice($dice);
        $this->assertEquals($dice, $item->getDice());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Dice', $item->getDice());
    }

    public function testSetSticker()
    {
        $item = new Message();
        $sticker = Sticker::fromResponse(array(
            "file_id" => 'testFileId1',
            'file_unique_id' => 'unique_id',
            'type' => 'regular',
            'width' => 1,
            'height' => 2,
            'is_animated' => false,
            'is_video' => false,
            'file_size' => 3,
            'thumb' => array(
                "file_id" => 'testFileId1',
                'width' => 1,
                'height' => 2,
                'file_size' => 3
            )
        ));
        $item->setSticker($sticker);
        $this->assertEquals($sticker, $item->getSticker());
    }

    public function testGetSticker()
    {
        $item = new Message();
        $sticker = Sticker::fromResponse(array(
            "file_id" => 'testFileId1',
            'file_unique_id' => 'unique_id',
            'type' => 'regular',
            'width' => 1,
            'height' => 2,
            'is_animated' => false,
            'is_video' => false,
            'file_size' => 3,
            'thumb' => array(
                "file_id" => 'testFileId1',
                'width' => 1,
                'height' => 2,
                'file_size' => 3
            )
        ));
        $item->setSticker($sticker);
        $this->assertEquals($sticker, $item->getSticker());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Sticker', $item->getSticker());
    }

    public function testSetGroupChatCreated()
    {
        $item = new Message();
        $item->setGroupChatCreated(true);
        $this->assertTrue($item->isGroupChatCreated());
    }

    public function testIsGroupChatCreated()
    {
        $item = new Message();
        $item->setGroupChatCreated(true);
        $this->assertTrue($item->isGroupChatCreated());
    }

    public function testSetDeleteChatPhoto()
    {
        $item = new Message();
        $item->setDeleteChatPhoto(true);
        $this->assertTrue($item->isDeleteChatPhoto());
    }

    public function testIsDeleteChatPhoto()
    {
        $item = new Message();
        $item->setDeleteChatPhoto(true);
        $this->assertTrue($item->isDeleteChatPhoto());
    }

    public function testSetLeftChatParticipant()
    {
        $item = new Message();
        $user = User::fromResponse(array(
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
        $item->setLeftChatMember($user);
        $this->assertEquals($user, $item->getLeftChatMember());
    }

    public function testGetLeftChatParticipant()
    {
        $item = new Message();
        $user = User::fromResponse(array(
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
        $item->setLeftChatMember($user);
        $this->assertEquals($user, $item->getLeftChatMember());
        $this->assertInstanceOf('\TelegramBot\Api\Types\User', $item->getLeftChatMember());
    }

    public function testSetNewChatParticipant()
    {
        $item = new Message();
        $user = User::fromResponse(array(
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
        $item->setNewChatMembers([$user]);
        $this->assertEquals([$user], $item->getNewChatMembers());
    }

    public function testGetNewChatParticipant()
    {
        $item = new Message();
        $user = User::fromResponse(array(
            'id' => 1,
            'is_bot' => false,
            'first_name' => 'Ilya',
            'last_name' => 'Gusev',
            'username' => 'iGusev'
        ));
        $item->setNewChatMembers([$user]);
        $this->assertEquals([$user], $item->getNewChatMembers());
        $this->assertInstanceOf('\TelegramBot\Api\Types\User', $item->getNewChatMembers()[0]);
    }

    public function testSetNewChatTitle()
    {
        $item = new Message();
        $item->setNewChatTitle('testtitle');
        $this->assertEquals('testtitle', $item->getNewChatTitle());
    }

    public function testGetNewChatTitle()
    {
        $item = new Message();
        $item->setNewChatTitle('testtitle');
        $this->assertEquals('testtitle', $item->getNewChatTitle());
    }

    public function testSetText()
    {
        $item = new Message();
        $item->setText('testtitle');
        $this->assertEquals('testtitle', $item->getText());
    }

    public function testGetText()
    {
        $item = new Message();
        $item->setText('testtitle');
        $this->assertEquals('testtitle', $item->getText());
    }

    public function testSetReplyToMessage()
    {
        $item = new Message();
        $replyMessage = Message::fromResponse(array(
            'message_id' => 1,
            'from' => array(
                'first_name' => 'Ilya',
                'is_bot' => false,
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev'
            ),
            'date' => 2,
            'chat' => array(
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            )
        ));
        $item->setReplyToMessage($replyMessage);
        $this->assertEquals($replyMessage, $item->getReplyToMessage());
    }

    public function testGetReplyToMessage()
    {
        $item = new Message();
        $replyMessage = Message::fromResponse(array(
            'message_id' => 1,
            'from' => array(
                'first_name' => 'Ilya',
                'is_bot' => false,
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev'
            ),
            'date' => 2,
            'chat' => array(
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            )
        ));
        $item->setReplyToMessage($replyMessage);
        $this->assertEquals($replyMessage, $item->getReplyToMessage());
        $this->assertInstanceOf('\TelegramBot\Api\Types\Message', $item->getReplyToMessage());
    }

    public function testSetViaBot()
    {
        $item = new Message();
        $bot = User::fromResponse(array(
            'first_name' => 'Test',
            'last_name' => 'Bot',
            'is_bot' => true,
            'username' => 'TestingBot',
            'is_bot' => 'true',
            'id' => 654321
        ));
        $item->setViaBot($bot);
        $this->assertEquals($bot, $item->getViaBot());
    }

    public function testGetViaBot()
    {
        $item = new Message();
        $bot = User::fromResponse(array(
            'first_name' => 'Test',
            'last_name' => 'Bot',
            'username' => 'TestingBot',
            'is_bot' => 'true',
            'id' => 654321,
            'is_bot' => true,
        ));
        $item->setViaBot($bot);
        $this->assertEquals($bot, $item->getViaBot());
        $this->assertInstanceOf('\TelegramBot\Api\Types\User', $item->getViaBot());
    }

    public function testViaBotMessage()
    {
        $item = new Message();
        $item = Message::fromResponse(array(
            'message_id' => 1,
            'from' => array(
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev',
                'is_bot' => false,
            ),
            'date' => 2,
            'chat' => array(
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ),
            'via_bot' => array(
                'first_name' => 'Test',
                'last_name' => 'Bot',
                'username' => 'TestingBot',
                'is_bot' => 'true',
                'id' => 654321,
                'is_bot' => true,
            )
        ));
        $this->assertEquals(654321, $item->getViaBot()->getId());
    }

    public function testSetPhoto()
    {
        $item = new Message();
        $photo = array(
            PhotoSize::fromResponse(array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ))
        );
        $item->setPhoto($photo);
        $this->assertEquals($photo, $item->getPhoto());
    }

    public function testGetPhoto()
    {
        $item = new Message();
        $photo = array(
            PhotoSize::fromResponse(array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ))
        );
        $item->setPhoto($photo);
        $this->assertEquals($photo, $item->getPhoto());
        foreach ($item->getPhoto() as $photoItem) {
            $this->assertInstanceOf('\TelegramBot\Api\Types\PhotoSize', $photoItem);
        }
    }

    public function testGetNewChatPhoto()
    {
        $item = new Message();
        $photo = array(
            PhotoSize::fromResponse(array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ))
        );
        $item->setNewChatPhoto($photo);
        $this->assertEquals($photo, $item->getNewChatPhoto());
    }

    public function testSetNewChatPhoto()
    {
        $item = new Message();
        $photo = array(
            PhotoSize::fromResponse(array(
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7
            ))
        );
        $item->setNewChatPhoto($photo);
        $this->assertEquals($photo, $item->getNewChatPhoto());
        foreach ($item->getNewChatPhoto() as $photoItem) {
            $this->assertInstanceOf('\TelegramBot\Api\Types\PhotoSize', $photoItem);
        }
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetMessageIdException()
    {
        $this->expectException(\TelegramBot\Api\InvalidArgumentException::class);

        $item = new Message();
        $item->setMessageId('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetDateException()
    {
        $this->expectException(\TelegramBot\Api\InvalidArgumentException::class);

        $item = new Message();
        $item->setDate('s');
    }

    /**
     * @expectedException \TelegramBot\Api\InvalidArgumentException
     */
    public function testSetForwardDateException()
    {
        $this->expectException(\TelegramBot\Api\InvalidArgumentException::class);

        $item = new Message();
        $item->setForwardDate('s');
    }

    public function testSetSupergroupChatCreated()
    {
        $item = new Message();
        $item->setSupergroupChatCreated(true);
        $this->assertTrue($item->isSupergroupChatCreated());
    }

    public function testIsSupergroupChatCreated()
    {
        $item = Message::fromResponse(array(
            'message_id' => 1,
            'from' => array(
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev',
                'is_bot' => false,
            ),
            'date' => 2,
            'chat' => array(
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ),
            'supergroup_chat_created' => true
        ));
        $this->assertTrue($item->isSupergroupChatCreated());
    }

    public function testSetChannelChatCreated()
    {
        $item = new Message();
        $item->setChannelChatCreated(true);
        $this->assertTrue($item->isChannelChatCreated());
    }

    public function testIsChannelChatCreated()
    {
        $item = Message::fromResponse(array(
            'message_id' => 1,
            'from' => array(
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev',
                'is_bot' => false,
            ),
            'date' => 2,
            'chat' => array(
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ),
            'channel_chat_created' => true
        ));
        $this->assertTrue($item->isChannelChatCreated());
    }

    public function testSetMigrateToChatId()
    {
        $item = new Message();
        $item->setMigrateToChatId(2);
        $this->assertEquals(2, $item->getMigrateToChatId());
    }

    public function testGetMigrateToChatId()
    {
        $item = Message::fromResponse(array(
            'message_id' => 1,
            'from' => array(
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev',
                'is_bot' => false,
            ),
            'date' => 2,
            'chat' => array(
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ),
            'migrate_to_chat_id' => 2
        ));
        $this->assertEquals(2, $item->getMigrateToChatId());
    }

    public function testSetMigrateFromChatId()
    {
        $item = new Message();
        $item->setMigrateFromChatId(2);
        $this->assertEquals(2, $item->getMigrateFromChatId());
    }

    public function testGetMigrateFromChatId()
    {
        $item = Message::fromResponse(array(
            'message_id' => 1,
            'from' => array(
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev',
                'is_bot' => false,
            ),
            'date' => 2,
            'chat' => array(
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ),
            'migrate_from_chat_id' => 3
        ));
        $this->assertEquals(3, $item->getMigrateFromChatId());
    }

    public function testToJson1()
    {
        $data = array(
            'message_id' => 1,
            'from' => array(
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev',
                'is_bot' => false,
            ),
            'date' => 2,
            'chat' => array(
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ),
            'migrate_from_chat_id' => 3
        );
        $item = Message::fromResponse($data);
        $this->assertJson(json_encode($data), $item->toJson());
    }

    public function testToJson2()
    {
        $data = array(
            'message_id' => 1,
            'from' => array(
                'first_name' => 'Ilya',
                'last_name' => 'Gusev',
                'id' => 123456,
                'username' => 'iGusev',
                'is_bot' => false,
            ),
            'date' => 2,
            'chat' => array(
                'id' => 1,
                'type' => 'group',
                'title' => 'test chat'
            ),
            'entities' => array(
                array(
                    "type" => "bot_command",
                    "offset" => 0,
                    "length" => 7,
                )
            ),
            'migrate_from_chat_id' => 3
        );
        $item = Message::fromResponse($data);
        $this->assertJson(json_encode($data), $item->toJson());
    }

    public function testGetSenderChat()
    {
        $message = Message::fromResponse(array(
            'message_id' => 255,
            'date' => 16,
            'chat' => array(
                'id' => 255,
                'type' => 'private',
            ),
            'sender_chat' => array(
                'id' => 255,
                'type' => 'private',
            ),
        ));
        $this->assertEquals(
            Chat::fromResponse(array(
                'id' => 255,
                'type' => 'private',
            )),
            $message->getSenderChat(),
        );
    }

    public function testSetSenderChat()
    {
        $message = Message::fromResponse(array(
            'message_id' => 255,
            'date' => 16,
            'chat' => array(
                'id' => 255,
                'type' => 'private',
            ),
        ));
        $message->setSenderChat(Chat::fromResponse(array(
            'id' => 255,
            'type' => 'private',
        )));
        $this->assertEquals(
            Chat::fromResponse(array(
                'id' => 255,
                'type' => 'private',
            )),
            $message->getSenderChat(),
        );
    }

    public function testGetHasProtectedContent()
    {
        $message = new Message();
        $message->setHasProtectedContent(true);
        $this->assertEquals(true, $message->getHasProtectedContent());
    }

    public function testSetHasProtectedContent()
    {
        $message = new Message();
        $message->setHasProtectedContent(false);
        $this->assertEquals(false, $message->getHasProtectedContent());
    }

    public function testSetMessageAutoDeleteTimerChanged()
    {
        $message = new Message();
        $message->setMessageAutoDeleteTimerChanged(MessageAutoDeleteTimerChanged::fromResponse(array(
            'message_auto_delete_time' => 255,
        )));
        $this->assertEquals(
            MessageAutoDeleteTimerChanged::fromResponse(array(
                'message_auto_delete_time' => 255,
            )),
            $message->getMessageAutoDeleteTimerChanged(),
        );
    }

    public function testeGetMessageAutoDeleteTimerChanged()
    {
        $message = new Message();
        $message->setMessageAutoDeleteTimerChanged(MessageAutoDeleteTimerChanged::fromResponse(array(
            'message_auto_delete_time' => 255,
        )));
        $this->assertEquals(
            MessageAutoDeleteTimerChanged::fromResponse(array(
                'message_auto_delete_time' => 255,
            )),
            $message->getMessageAutoDeleteTimerChanged(),
        );
    }

    public function testGetVideoNote()
    {
        $item = new Message();
        $videoNote = VideoNote::fromResponse([
            'file_id' => 'file',
            'file_unique_id' => 'unique_id',
            'length' => 256,
            'duration' => 512,
        ]);
        $item->setVideoNote($videoNote);
        $this->assertEquals($videoNote, $item->getVideoNote());
    }

    public function testSetVideoNote()
    {
        $item = new Message();
        $videoNote = VideoNote::fromResponse([
            'file_id' => 'file',
            'file_unique_id' => 'unique_id',
            'length' => 256,
            'duration' => 512,
        ]);
        $item->setVideoNote($videoNote);
        $this->assertEquals($videoNote, $item->getVideoNote());
    }

    public function testIsTopicMessage()
    {
        $item = new Message();
        $item->setIsTopicMessage(false);
        $this->assertEquals(false, $item->isTopicMessage());
    }

    public function testMessageThreadId()
    {
        $item = new Message();
        $item->setMessageThreadId(512);
        $this->assertEquals(512, $item->getMessageThreadId());
    }

    public function testForumTopicCreated()
    {
        $item = new Message();
        $forumTopicCreated = ForumTopicCreated::fromResponse([
            'name' => 'forum topic',
            'icon_color' => 512,
        ]);
        $item->setForumTopicCreated($forumTopicCreated);
        $this->assertEquals($forumTopicCreated, $item->getForumTopicCreated());
    }

    public function testForumTopicClosed()
    {
        $item = new Message();
        $forumTopicClosed = new ForumTopicClosed();
        $item->setForumTopicClosed($forumTopicClosed);
        $this->assertEquals($forumTopicClosed, $item->getForumTopicClosed());
    }

    public function testForumTopicReopened()
    {
        $item = new Message();
        $forumTopicReopened = new ForumTopicReopened();
        $item->setForumTopicReopened($forumTopicReopened);
        $this->assertEquals($forumTopicReopened, $item->getForumTopicReopened());
    }

    public function testHasMediaSpoiler()
    {
        $item = new Message();
        $item->setHasMediaSpoiler(false);
        $this->assertEquals(false, $item->hasMediaSpoiler());
    }

    public function testForumTopicEdited()
    {
        $item = new Message();
        $topicEdited = new ForumTopicEdited();
        $topicEdited->setName('topic name');
        $topicEdited->setIconCustomEmojiId('emoji_id');
        $item->setForumTopicEdited($topicEdited);
        $this->assertEquals($topicEdited, $item->getForumTopicEdited());
    }

    public function testUserShared()
    {
        $item = new Message();
        $userShared = new UserShared();
        $userShared->setRequestId(1);
        $userShared->setUserId(1);
        $item->setUserShared($userShared);
        $this->assertEquals($userShared, $item->getUserShared());
    }

    public function testChatShared()
    {
        $item = new Message();
        $chatShared = new ChatShared();
        $chatShared->setRequestId(1);
        $chatShared->setChatId(1);
        $item->setChatShared($chatShared);
        $this->assertEquals($chatShared, $item->getChatShared());
    }
}
