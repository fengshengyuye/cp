<?php

namespace App\Policies;

use App\Models\Cat;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CatPolicy
{
    use HandlesAuthorization;

    public function before(){
        if(isSuperAdmin()) return true;
    }
    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Cat $cat)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, Cat $cat)
    {
        //
    }


    public function delete(User $user, Cat $cat)
    {
        //
    }


    public function restore(User $user, Cat $cat)
    {
        //
    }


    public function forceDelete(User $user, Cat $cat)
    {
        //
    }
}
