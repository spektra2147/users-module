<?php

namespace Anomaly\UsersModule\User\Command;

use Illuminate\Support\Facades\Gate;
use Anomaly\UsersModule\Role\RoleModel;
use Anomaly\Streams\Platform\Stream\Event\StreamWasBuilt;

/**
 * Class DefineStreamGate
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DefineStreamGate
{

    /**
     * Handle the event.
     *
     * @param StreamWasBuilt $event
     */
    public function handle(StreamWasBuilt $event)
    {
        $stream = $event->getStream();

        /**
         * This all needs to be replaced with permissions
         * but useage through gates only in core.
         */
        //Gate::define($stream->getSlug() . '.update', function () {
        Gate::define('users.update', function () {
            dd('Here at last');
            return true;
        });

        // This one
        //dd(Gate::check('update', auth()->user()));
        //dd(Gate::check('update', RoleModel::first()));

        //$response = Gate::inspect($stream->getSlug() . '.edit', $stream);

        //dd(Gate::allows($stream->getSlug() . '.edit'));
    }
}
