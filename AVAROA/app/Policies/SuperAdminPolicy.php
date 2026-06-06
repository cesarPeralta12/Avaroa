<?php

namespace App\Policies;

use App\Models\User;

class SuperAdminPolicy
{
    /**
     * Check if the user is a super admin.
     */
    public function isSuperAdmin(User $user)
    {
        return $user->is_super_admin == 1;
    }
}
