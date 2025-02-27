<?php


/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Nodeloc\Telegram\Job;

use Flarum\Notification\Blueprint\BlueprintInterface;
use Flarum\Queue\AbstractJob;
use Flarum\User\User;
use Nodeloc\Telegram\Notifications\TelegramMailer;

class SendTelegramNotificationJob extends AbstractJob
{
    /**
     * @var BlueprintInterface
     */
    private $blueprint;

    /**
     * @var User[]
     */
    private $recipients;

    public function __construct(BlueprintInterface $blueprint,  array $recipients = [])
    {
        $this->blueprint = $blueprint;
        $this->recipients = $recipients;
    }

    public function handle(TelegramMailer $mailer)
    {
        $mailer->send($this->blueprint, $this->recipients);
    }
}
