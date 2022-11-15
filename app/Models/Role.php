<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
    ];
    public static function getAllRole()
    {
        $lstRole = DB::table('roles')->get();
        return $lstRole;
    }

    public static function getNameRole($description)
    {
        $value = DB::table('roles')->where('description', $description)->get();
        return $value;
    }

    public static function insertRole($description)
    {
        DB::table('roles')->insert([
            'description' => $description
        ]);
    }


    public static function deleteRole($id)
    {
        DB::table('roles')->where('id', $id)->delete();
    }

    public static function updateRole($id, $data)
    {
        DB::table('roles')->where('id', $id)->update($data);
    }

    public function user()
    {
        return $this->hasMany('\App\Models\User');
    }
}
