<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\HomeController;
use App\Models\ListUser;
use App\Repository\InterfaceRoleRepository;
use App\Repository\InterfaceUserRepository as RepositoryInterfaceUserRepository;
use Illuminate\Http\Request;

class UserController extends HomeController
{
    protected $userRepo;
    protected $roleRepo;

    public function __construct(RepositoryInterfaceUserRepository $userRepositoryInterface, InterfaceRoleRepository $roleRepository)
    {
        $this->userRepo = $userRepositoryInterface;
        $this->roleRepo = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUser = $this->userRepo->getAllUser();
        $listRole = $this->roleRepo->getAllRole();
        return view('user.index')->with([
            'listRole' => $listRole,
            'listUser' => $listUser,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $data = $request->all();
        $request->validate(
            [
                'txtFullName' => [
                    'required',
                    'regex:/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{4,}$)/'
                ],
                'txtPhoneNumber' => [
                    'required',
                    'regex:/^[03|08|09|07]{2,2}+[0-9]{8,8}$/'
                ],
                'txtAddress' => [
                    'required',
                    'regex:/^[\d\/]{1,6}+\s+[A-z\s]{1,50}+(,\s+[A-z\s\d]{1,50})*+.$/',
                    'max:255'
                ],
                'cbRole' => [
                    'required',
                ]
            ],
            [
                'txtFullname.regex' => 'Wrong Full Name Format! Example: Lê Nguyễn Tuân',
                'txtPhoneNumber.regex' => 'Wrong Phone Number Format! Example: 0869236512',
                'txtAddress.regex' => 'Wrong Address Format! Example: 12 Nguyen Van Bao, Phuong 1, Quan Go Vap, Thanh Pho Ho Chi Minh.',
            ]
        );
        $this->userRepo->addUser($data);
        return back()->with("status", "Add New User Successfully");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $request->validate(
            [
                'txtFullname' => [
                    'regex:/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{4,}$)/'
                ],
                'txtDateOfBirth' => [
                    'before:today',
                    'date'
                ],
                'phone_number' => [
                    'required',
                    'regex:/^[03|08|09|07]{2,2}+[0-9]{8,8}$/'
                ],
                'txtAddress' => [
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
        $status = $this->userRepo->updateUser($id, $data);
        return back()->with("status", $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        ListUser::deleteUser($request->id);
        return response()->json([
            'status' => 'success',
            'message' => 'Delete User Successfully !!'
        ]);
    }

    public function view($id)
    {
        $profileUser = $this->userRepo->userByID($id);
        $listRole = $this->roleRepo->getAllRole();
        return view('user.view')->with([
            'lstRole' => $listRole,
            'profileUser' => $profileUser,
        ]);
    }
}
