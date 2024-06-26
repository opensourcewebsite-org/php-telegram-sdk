<h1 align="center">PHP Telegram SDK</h1>

[![License](https://img.shields.io/badge/License-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![PHP Version](https://img.shields.io/badge/PHP-7.4-blue.svg?style=flat-square&logo=php)](https://www.php.net)

## Bots: An introduction for developers
>Bots are special Telegram accounts designed to handle messages automatically. Users can interact with bots by sending them command messages in private or group chats.
>
>You control your bots using HTTPS requests to [Telegram Bot API](https://core.telegram.org/bots/api).
>
>The Bot API is an HTTP-based interface created for developers keen on building bots for Telegram.
To learn how to create and set up a bot, please consult [Introduction to Bots](https://core.telegram.org/bots) and [Bot FAQ](https://core.telegram.org/bots/faq).

PHP Telegram SDK for the [Telegram Bot API](https://core.telegram.org/bots/api).

This library is under active development and should be considered beta quality. Please ensure that you've tested extensively on a test network and have added sanity checks in other places in your code.

The repository is a part of the [OpenSourceWebsite Organization](https://github.com/opensourcewebsite-org). This project and everyone participating in it is governed by the [Code of Conduct](CODE_OF_CONDUCT.md).

## Getting Started

[See the release notes for breaking changes](CHANGELOG.md).

Please read through [Telegram Bot API Documentation](https://core.telegram.org/bots/api).

## Contributing

Please read through our [Contribution Guidelines](CONTRIBUTING.md).

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require opensourcewebsite-org/php-telegram-sdk
```

or add

```
"opensourcewebsite-org/php-telegram-sdk": "*"
```

to the require section of your `composer.json` file.

## Usage

### API Wrapper

#### Send message

``` php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$bot->sendMessage($chatId, $messageText);
```
#### Send document

```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$document = new \CURLFile('document.txt');

$bot->sendDocument($chatId, $document);
```
#### Send message with reply keyboard

```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("one", "two", "three")), true); // true for one-time keyboard

$bot->sendMessage($chatId, $messageText, null, false, null, $keyboard);
```
#### Send message with inline keyboard

```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['text' => 'link', 'url' => 'https://core.telegram.org']
                ]
            ]
        );

$bot->sendMessage($chatId, $messageText, null, false, null, $keyboard);
```
#### Send media group

```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://avatars3.githubusercontent.com/u/9335727'));
$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://avatars3.githubusercontent.com/u/9335727'));
// Same for video
// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
$bot->sendMediaGroup($chatId, $media);
```

#### Client

```php
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN');

    //Handle /ping command
    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });

    //Handle text messages
    $bot->on(function (\TelegramBot\Api\Types\Update $update) use ($bot) {
        $message = $update->getMessage();
        $id = $message->getChat()->getId();
        $bot->sendMessage($id, 'Your message: ' . $message->getText());
    }, function () {
        return true;
    });

    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}
```

## Tests

``` bash
$ composer test
```

## Feedback

To request a new feature, submit a bug report, give us feedback, start a design discussion or have an idea to make this code better feel free to [open an issue](https://github.com/opensourcewebsite-org/php-telegram-sdk/issues), or [create a pull request](https://github.com/opensourcewebsite-org/php-telegram-sdk/pulls).

Please send all security issues to [security@opensourcewebsite.org](mailto:security@opensourcewebsite.org).

## License

This project is open source and available freely under the [MIT license](LICENSE.md).
