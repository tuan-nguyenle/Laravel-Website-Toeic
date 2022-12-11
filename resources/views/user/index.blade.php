@php
    $title = 'User Management';
@endphp
@extends('layouts.admin.master-admin')

@section('css')
    <style>
        .table-row {
            cursor: pointer;
        }
    </style>

@stop
@section('content')
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#modalAddUser">
        Add User
    </button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            @csrf
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Full Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Address') }}</th>
                <th>{{ __('Phone Number') }}</th>
                <th>{{ __('Role Name') }}</th>
                <th>{{ __('Image') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
            @foreach ($listUser as $lstUser)
                <tr class="table-row" data-href="{{ url("/admin/user/view/{$lstUser->id}") }}">
                    <td>{{ $lstUser->id }}</td>
                    <td>{{ $lstUser->name }}</td>
                    <td>{{ $lstUser->email }}</td>
                    <td>{{ $lstUser->address }}</td>
                    <td>{{ $lstUser->phone_number }}</td>
                    <td>{{ $lstUser->role->description }}</td>
                    <td><img src="{{ asset($lstUser->image) }}" alt="avatar user {{ $lstUser->name }}" width="30px">
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="deleteUser({{ $lstUser->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $listUser->links('paginate') !!}
    </div>
    <!-- The Modal -->
    <div class="modal" id="modalAddUser">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('user.add') }}" method="post">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New User</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="txtFullName">FullName</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="txtFullName" id="txtFullName" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="txtEmail">Email</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="txtEmail" id="txtEmail" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="txtPhoneNumber">Phone Number</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="txtPhoneNumber" id="txtPhoneNumber" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="txtAddress">Address</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="txtAddress" id="txtAddress" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-2">
                                <label for="txtPassword">Password</label>
                            </div>
                            <div class="col-9">
                                <input type="password" name="txtPassword" id="txtPassword" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mt-2" for="cbRole">Role</label>
                            </div>
                            <div class="col-sm-9">
                                <select name="cbRole" id="cbRole" class="form-control">
                                    @foreach ($listRole as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->description }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });

        function deleteUser(id) {
            var check = confirm('Do you sure delete this user');
            if (!check) return
            $.ajax({
                type: "POST",
                url: '{{ route('user.delete') }}',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.status == 'success') {
                        alert(data.message);
                        location.reload();
                    }
                }
            });
        }
    </script>
@stop
