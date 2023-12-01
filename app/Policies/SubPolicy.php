<?php

namespace App\Policies;

use App\Models\Sub;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubPolicy
{
    use HandlesAuthorization;

    public function before()
    {
        if (isSuperAdmin()) return true;
    }

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Sub $sub)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, Sub $sub)
    {
        //
    }


    public function delete(User $user, Sub $sub)
    {
        //
    }

    public function restore(User $user, Sub $sub)
    {
        //
    }


    public function forceDelete(User $user, Sub $sub)
    {
        //
    }
}
