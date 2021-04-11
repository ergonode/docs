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

## Extending

(How to add new features)

### Templates

(Adding new layout)

### Translations

(Adding new translations)

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

```twig
<p>{{'Hello'|trans}},</p>
<p>{{'Welcome in Looney Toons'|trans}} {{name}}</p>
```

Next, we need to setup `Ergonode\Mailer\Domain\Template`.

```php
$template = new Template(
    '@LooneyToonsModule/message/hello-message.html.twig',
    new Language('en_US'),
    [
        'name' => 'Elmer'
    ]
);
```

#### 3. Sender

(TODO)

#### 4. Create e-mail

Each message must be build using `Ergonode\Mailer\Domain\Mail`.

```php
$subject = $this->translator->trans('Looney Toons welcome');
$mail = new Mail($recipients, $template, $sender, $subject);
```

#### 5. Send it

```php
$command = new SendMailCommand($mail);
$this->commandBus->dispatch($command);
```

### All in one

```php
<?php
declare(strict_types=1);

use Ergonode\EventSourcing\Infrastructure\Bus\CommandBusInterface;
use Ergonode\Mailer\Domain\Recipient;
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
        $to = new EmailCollection([
            new Email('elmer@looney-toons.com'),
            new Email('duffy@looney-toons.com'),
        ]);
        $recipients = new Recipient($to);
        $recipients->addBcc(new Email('bugs@looney-toons.com'));
        $recipients->addCc(new Email('pepe@looney-toons.com'));
        
        $template = new Template(
            '@LooneyToonsModule/message/hello-message.html.twig',
            new Language('en_US'),
            [
                'name' => 'Elmer'
            ]
        );
        
        $sender = new Sender();
        
        $subject = $this->translator->trans('Welcome in Looney Toons');
        $mail = new Mail($recipients, $template, $sender, $subject);
        
        $command = new SendMailCommand($mail);
        $this->commandBus->dispatch($command);
    }
}
```
