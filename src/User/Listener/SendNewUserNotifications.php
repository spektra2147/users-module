<?php namespace Anomaly\UsersModule\User\Listener;

use Anomaly\UsersModule\User\Event\UserHasRegistered;
use Illuminate\Notifications\AnonymousNotifiable;

/**
 * Class SendNewUserNotifications
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SendNewUserNotifications
{

    /**
     * Handle the event.
     *
     * @param UserHasRegistered $event
     */
    public function handle(UserHasRegistered $event)
    {
        $recipients = config('anomaly.module.users::notifications.new_user', []);

        foreach ($recipients as $email) {
            (new AnonymousNotifiable)
                ->route('mail', $email)
                ->notify(
                    new \Anomaly\UsersModule\User\Notification\UserHasRegistered(
                        $event->getUser()
                    )
                );
        }
    }
}
