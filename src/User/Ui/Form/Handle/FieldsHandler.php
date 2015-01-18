<?php namespace Anomaly\UsersModule\User\Ui\Form\Handle;

/**
 * Class FieldsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Ui\Form\Handle
 */
class FieldsHandler
{

    /**
     * Return the form fields.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'username',
            'email',
            'password',
            'roles',
        ];
    }
}