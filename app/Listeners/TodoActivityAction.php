<?php

namespace App\Listeners;

use App\Events\ToDoActivity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\ToDoActivityActionModel;

class TodoActivityAction
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ToDoActivity  $event
     * @return void
     */
    public function handle(ToDoActivity $event)
    {
        ToDoActivityActionModel::create([
            'user_id' => $event->user_id,
            'action' => $event->action,
            'activity_id' => $event->activity_id,
        ]);
    }
}
