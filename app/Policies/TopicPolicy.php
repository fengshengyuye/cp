<?php

namespace App\Policies;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Topic $topic)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, Topic $topic)
    {
        return isSuperAdmin()||$topic->user_id==$user->id;
    }


    public function delete(User $user, Topic $topic)
    {
        return isSuperAdmin()||$topic->user_id==$user->id;
    }


    public function restore(User $user, Topic $topic)
    {
        //
    }


    public function forceDelete(User $user, Topic $topic)
    {
        //
    }
}
