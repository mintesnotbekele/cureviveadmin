<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Thread;

class ThreadPolicy
{
    const UPDATE = 'update';
    const DELETE = 'delete';

    public function update(User $user, Thread $thread): bool
    {
        return true;
    }

    public function delete(User $user, Thread $thread): bool
    {
        return true;
    }

}