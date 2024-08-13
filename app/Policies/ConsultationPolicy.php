<?php

namespace App\Policies;

use App\Models\Consultation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Consultation $consultation)
    {
        return $user->id === $consultation->user_id;
    }

    public function update(User $user, Consultation $consultation)
    {
        return $user->id === $consultation->user_id;
    }

    public function delete(User $user, Consultation $consultation)
    {
        return $user->id === $consultation->user_id;
    }
};