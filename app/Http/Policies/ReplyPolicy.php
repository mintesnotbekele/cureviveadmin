<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    const CREATE = 'create';
    const UPDATE = 'update';
    const DELETE = 'delete';

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Reply $reply): bool
    {
        return true ;
    }

    public function delete(User $user, Reply $reply): bool
    {
        return true ;
    }
}