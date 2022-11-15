<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements InterfaceUserRepository
{
    public function getAllUser()
    {
        return User::with('role')->paginate(5);
    }
    public function userByID($id)
    {
        return User::with('role')->where('id', $id)->first();
    }
    public function updateUser($id, $attributes = [])
    {
        $user = $this->userByID($id);
        if (!$user) {
            return false;
        }
        return $user->update([
            'name' => $attributes['txtFullName'],
            'email' => $attributes['txtEmail'],
            'phone_number' => $attributes['phone_number'],
            'address' => $attributes['txtAddress'],
            'date_of_birth' => $attributes['txtDateOfBirth'],
            'role_id' => $attributes['cbRole']
        ]);
    }
    public function addUser($attributes = [])
    {
        return User::create([
            'name' => $attributes['txtFullName'],
            'email' => $attributes['txtEmail'],
            'phone_number' => $attributes['txtPhoneNumber'],
            'address' => $attributes['txtAddress'],
            'role_id' => $attributes['cbRole'],
            'password' => Hash::make($attributes['txtPassword']),
        ]);
    }
}
