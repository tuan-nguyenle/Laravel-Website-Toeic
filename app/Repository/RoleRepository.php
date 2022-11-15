<?php

namespace App\Repository;

use App\Models\Role;

class RoleRepository implements InterfaceRoleRepository
{
    public function getAllRole()
    {
        return Role::all();
    }
}
