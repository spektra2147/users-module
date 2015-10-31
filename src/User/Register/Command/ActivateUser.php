<?php namespace Anomaly\UsersModule\User\Register\Command;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserActivator;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;

/**
 * Class ActivateUser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register\Command
 */
class ActivateUser implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param UserRepositoryInterface $users
     * @param UserActivator           $activator
     * @param Encrypter               $encrypter
     * @param Request                 $request
     * @return bool
     */
    public function handle(
        UserRepositoryInterface $users,
        UserActivator $activator,
        Encrypter $encrypter,
        Request $request
    ) {
        $code  = $encrypter->decrypt($request->get('code'));
        $email = $encrypter->decrypt($request->get('email'));

        if (!$user = $users->findByEmail($email)) {
            return false;
        }

        return $activator->activate($user, $code);
    }
}
