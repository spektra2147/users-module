<?php namespace Anomaly\UsersModule\User\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Http\Request;

/**
 * Class UserFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UserFormBuilder extends FormBuilder
{

    /**
     * The skipped fields.
     *
     * @var array
     */
    protected $skips = [
        'ip_address',
        'reset_code',
        'permissions',
        'remember_token',
        'activation_code',
    ];

    /**
     * Fired just before posting.
     *
     * @param Request $request
     */
    public function onPosting(Request $request)
    {
        if (!$request->get('password') && $this->form->getMode() == 'edit') {
            $this->disableFormField('password');
        };
    }
}
