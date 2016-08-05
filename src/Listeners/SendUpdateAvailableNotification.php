<?php

namespace Codedge\Updater\Listeners;

use Codedge\Updater\Events\UpdateAvailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;
use Monolog\Logger;

/**
 * UpdateListener.php.
 *
 * @author Holger Lösken <holger.loesken@codedge.de>
 * @copyright See LICENSE file that was distributed with this source code.
 */
class SendUpdateAvailableNotification implements ShouldQueue
{
    /**
     * @var  Logger
     */
    protected $logger;

    /**
     * @var  Mailer
     */
    protected $mailer;

    /**
     * SendUpdateAvailableNotification constructor.
     *
     * @param Logger $logger
     * @param Mailer $mailer
     */
    public function __construct(Logger $logger, Mailer $mailer)
    {
        $this->logger = $logger;
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param UpdateAvailable $event
     */
    public function handle(UpdateAvailable $event)
    {
        if(config('self-update.log_events')) {
            $this->logger->addInfo('['.$event->getName().'] event: Notification triggered.');
        }

        $this->mailer->send(
            'vendors.mails.update-available',
            [
                'newVersion' => $event->getVersionAvailable(),
            ],
            function ($m) use($event) {
                $m->subject($event->getName());
                $m->from(config('mail.from.address'), config('mail.from.name'));
                $m->to(config('self-update.mail_to.address'), config('self-update.mail_to.name'));
            }
        );
    }
}