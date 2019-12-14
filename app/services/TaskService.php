<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/14/19
 * Time: 9:37 AM
 */

namespace App\services;

use App\Tasks;
use App\User;

class TaskService
{
    /**
     * Get all of the task for a given user.
     *
     * @param  User $user
     * @return Collection
     */
    public function userTask(User $user, $id = '')
    {
        if ($id) {
            return Tasks::find($id)->where('user_id', $user->id)->first();
        }

        $tasks = Tasks::where('user_id', $user->id)
            ->orderBy('task_name', 'asc')
            ->get();

        foreach ($tasks as $task) {
            $task->category_name = $task->category->name;
        }

        return $tasks;
    }
}
