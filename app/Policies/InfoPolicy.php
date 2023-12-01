<?php

namespace App\Policies;

use App\Models\Info;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InfoPolicy
{
    use HandlesAuthorization;

    public function  before(){
        if(isSuperAdmin()) return true;
    }
    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Info $info)
    {
        //
    }


    public function create(User $user)
    {
        //
    }

    public function update(User $user, Info $info)
    {
        //
    }

    public function delete(User $user, Info $info)
    {
        //
    }


    public function restore(User $user, Info $info)
    {
        //
    }


    public function forceDelete(User $user, Info $info)
    {
        //
    }
}
