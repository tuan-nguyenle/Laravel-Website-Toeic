<?php

namespace App\Repository;

interface InterfaceUserRepository
{
    public function getAllUser();
    public function userByID($id);
    public function updateUser($id, $attributes = []);
    public function addUser($attribute = []);
}
