<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updatePassword(Request $request)
    {
        // Check Input
        $request->validate([
            'old_password' => 'required',
            'new_password' => [
                'required',           // require to change password
                'confirmed',          // match confirm password
                Password::min(8)->mixedCase()->numbers()
            ]
        ]);

        // Match Old Password

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't Match");
        }

        // Change New Password
        User::where('id', auth()->id())->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password Change Successfully !!");
    }

    public function updateAvatar(Request $request)
    {
        // Check Input
        $validation = Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);
        if ($validation->passes()) {
            // location
            $path = 'avatar';
            // get file
            $file = $request->file('avatar');
            // cut and file type
            $type_file = substr($_FILES['avatar']['type'], 6);
            // rename avatar
            $avatar = $path . "/" .  Auth::user()->id . "." . $type_file;
            // upload file
            $upload = $file->move(public_path($path), $avatar);
            if ($upload) {
                User::where('id', auth()->id())->update([
                    'image' => $avatar,
                ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Profile photo added',
                'file_name' => $avatar,
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message'   => $validation->errors()->all(),
                'file_name' => $request->file('avatar')->getClientOriginalName(),
                'class_name'  => 'alert-danger'
            ]);
        }
    }

    public function updateInfomation(Request $request)
    {
        $request->validate(
            [
                'txtFullname' => [
                    'required',
                    'regex:/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{4,}$)/'
                ],
                'txtDateOfBirth' => [
                    'required',
                    'before:today',
                    'date'
                ],
                'phone_number' => [
                    'unique:users',
                    'required',
                    'regex:/^[03|08|09|07]{2,2}+[0-9]{8,8}$/'
                ],
                'gender' => 'required',
                'txtAddress' => [
                    'required',
                    'regex:/^[\d\/]{1,6}+\s+[A-z\s]{1,50}+(,\s+[A-z\s\d]{1,50})*+.$/',
                    'max:255'
                ]
            ],
            [
                'txtFullname.regex' => 'Wrong Full Name Format! Example: Lê Nguyễn Tuân',
                'phone_number.regex' => 'Wrong Phone Number Format! Example: 0869236512',
                'txtAddress.regex' => 'Wrong Address Format! Example: 12 Nguyen Van Bao, Phuong 1, Quan Go Vap, Thanh Pho Ho Chi Minh.',
            ]
        );
        User::where('id', auth()->id())->update([
            'name' => $request->txtFullname,
            'sex' => $request->gender,
            'date_of_birth' => $request->txtDateOfBirth,
            'phone_number' => $request->phone_number,
            'address' => $request->txtAddress,
        ]);
        return back()->with("status", "Change Your Information Successfully !!");
    }

    public function changePassword()
    {
        return view('layouts.change-password');
    }

    public function changeInfomation()
    {
        return view('layouts.edit-profile');
    }
    public function getHistory()
    {
        return view('layouts.view-history');
    }
}
