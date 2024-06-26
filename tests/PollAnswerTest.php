<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\PollAnswer;
use TelegramBot\Api\Types\User;

class PollAnswerAnswerTest extends TestCase
{
    public function testGetPollId()
    {
        $item = new PollAnswer();
        $item->setPollId(123456789);
        $this->assertEquals(123456789, $item->getPollId());
    }

    public function testGetUser()
    {
        $item = new PollAnswer();
        $user = new User();
        $user->setId(123456);
        $item->setUser($user);
        $this->assertEquals(123456, $item->getUser()->getId());
    }
    public function testGetFrom()
    {
        $item = new PollAnswer();
        $user = new User();
        $user->setId(123456);
        $item->setFrom($user);
        $this->assertEquals(123456, $item->getFrom()->getId());
    }
}
