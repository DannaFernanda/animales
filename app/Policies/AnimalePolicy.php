<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Animale;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnimalePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->name === 'esteban';
    }

    public function edit(User $user)
    {
        return $user->name === 'esteban';
    }

    public function delete(User $user)
    {
        return $user->name === 'esteban';
    }
}
