<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class listUser extends Model
{
    use HasFactory;
    public static function getAllUser()
    {
        $lstUser = DB::table('users')->join('tbl_role', 'users.role_id', '=', 'tbl_role.id')->select('users.*', 'tbl_role.description')->orderBy('role_id', 'desc')->Paginate(8);
        return $lstUser;
    }

    public static function getOneUser($id)
    {
        $user = DB::table('users')->where('id', $id);
        return $user;
    }

    public static function deleteUser($id)
    {
        DB::table('users')->where('id', $id)->delete();
    }
}
