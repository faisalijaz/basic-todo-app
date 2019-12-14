<?php

namespace App\Policies;

use App\Tasks;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TasksPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user, Tasks $task)
    {
        return $user->id === $task->user_id;
    }
}
