# Mailer

-----

## Introduction

`Ergonode Mailer` module uses `Symfony Mailer` solution.

What you should know before read:
- Symfony Mailer (https://symfony.com/doc/4.4/mailer.html)
- Twig (https://symfony.com/doc/4.4/templates.html)

## Configuration

For proper functioning, you need to configure environment variables:

**MAILER_DSN**

Basic DSN address for e-mail service. More information available in `Symfony Mailer` documentation.

**MAILER_SENDER**

E-mail address wich will be set as `from` and `reply-to`.

### File example

```yaml
framework:
    mailer:
        dsn: '%env(MAILER_DSN)%'
        envelope:
            sender: '%env(MAILER_SENDER)%'

ergonode_mailer:
    default:
        replyTo: '%env(MAILER_SENDER)%'
        from: '%env(MAILER_SENDER)%'
```

## Testing

When you setup basic configuration you should test it. To make your life easier, we have created a console command.

#### Command

Command will send test message to provided e-mail address.

Basic usage

```shell
bin/console ergonode:mailer:test receiver@email.com
```

With specific language (by default is `en_US`)

```shell
bin/console ergonode:mailer:test receiver@email.com -l en_GB
```

## Usage

### Step by step

For example we create new meessage in my custom module named `LooneyToons`.

#### 1. Recipient

In `Ergonode Mailer` we can set as many recipients as we want thanks to `Ergonode\Mailer\Domain\Recipient`.

```php
use Ergonode\Mailer\Domain\Recipient;
use Ergonode\SharedKernel\Domain\Collection\EmailCollection;
use Ergonode\SharedKernel\Domain\ValueObject\Email;

$to = new EmailCollection([
    new Email('elmer@looney-toons.com'),
    new Email('duffy@looney-toons.com'),
]);
$recipient = new Recipient($to);
$recipient->addBcc(new Email('bugs@looney-toons.com'));
$recipient->addCc(new Email('pepe@looney-toons.com'));
```

#### 2. Message template

Simply create new `Twig` template with e-mail message content.

LooneyToonsModule/message/hello-message.html.twig

```twig
<p>{{'Hello'|trans}},</p>
<p>{{'Welcome in Looney Toons'|trans}} {{name}}</p>
```

Next, we need to setup `Ergonode\Mailer\Domain\Template`.

```php
use Ergonode\Core\Domain\ValueObject\Language;
use Ergonode\Mailer\Domain\Template;

$template = new Template(
    '@LooneyToonsModule/message/hello-message.html.twig',
    new Language('en_US'),
    [
        'name' => 'Elmer'
    ]
);
```

#### 3. Sender

You can overwrite default sender settings like `from` and `reply-to` with 
`Ergonode\Mailer\Domain\Sender`.

```php
use Ergonode\Mailer\Domain\Sender;
use Ergonode\SharedKernel\Domain\ValueObject\Email;

$sender = new Sender();
$sender->addFrom(new Email('boss@looney-toons.com'));
$sender->addReplyTo(new Email('manager@looney-toons.com'));
```

#### 4. Create e-mail

Each message must be build using `Ergonode\Mailer\Domain\Mail`.

```php
use Ergonode\Mailer\Domain\Mail;
use Symfony\Contracts\Translation\TranslatorInterface;

$subject = $this->translator->trans('Looney Toons welcome');
$mail = new Mail($recipients, $template, $sender, $subject);
```

#### 5. Send it

You can easly send e-mail message using command bus by `Ergonode\Mailer\Domain\Command\SendMailCommand` command.

```php
use Ergonode\Mailer\Domain\Command\SendMailCommand;
use Ergonode\EventSourcing\Infrastructure\Bus\CommandBusInterface;

$command = new SendMailCommand($mail);
$this->commandBus->dispatch($command);
```

### All in one example

```php
<?php
declare(strict_types=1);

use Ergonode\Core\Domain\ValueObject\Language;
use Ergonode\EventSourcing\Infrastructure\Bus\CommandBusInterface;
use Ergonode\Mailer\Domain\Command\SendMailCommand;
use Ergonode\Mailer\Domain\Recipient;
use Ergonode\Mailer\Domain\Template;
use Ergonode\Mailer\Domain\Mail;
use Ergonode\SharedKernel\Domain\Collection\EmailCollection;
use Ergonode\SharedKernel\Domain\ValueObject\Email;
use Symfony\Contracts\Translation\TranslatorInterface;

final class LooneyToonsHelloMailService
{
    private CommandBusInterface $commandBus;
    
    private TranslatorInterface $translator;

    public function __construct(
        CommandBusInterface $commandBus,
        TranslatorInterface $translator
    ) {
        $this->commandBus = $commandBus;
        $this->translator = $translator;
    }

    public function send(): void
    {
        // setup recipients
        $to = new EmailCollection([
            new Email('elmer@looney-toons.com'),
            new Email('duffy@looney-toons.com'),
        ]);
        $recipients = new Recipient($to);
        $recipients->addBcc(new Email('bugs@looney-toons.com'));
        $recipients->addCc(new Email('pepe@looney-toons.com'));
        
        // setup template
        $template = new Template(
            '@LooneyToonsModule/message/hello-message.html.twig',
            new Language('en_US'),
            [
                'name' => 'Elmer'
            ]
        );
        
        // setup sender
        $sender = new Sender();
        $sender->addFrom(new Email('boss@looney-toons.com'));
        $sender->addReplyTo(new Email('manager@looney-toons.com'));
        
        // create mail message
        $subject = $this->translator->trans('Welcome in Looney Toons');
        $mail = new Mail($recipients, $template, $sender, $subject);
        
        // send command with our e-mail message
        $command = new SendMailCommand($mail);
        $this->commandBus->dispatch($command);
    }
}
```
