@php
    $title = 'Edit User';
@endphp
@extends('layouts.admin.master-admin')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-2">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset($profileUser->image) }}" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    @if (session('status') == '1')
                        <div class="alert alert-success" role="alert">
                            {{ 'Update User Success' }}
                        </div>
                    @endif
                    @if (session('status') == '0')
                        <div class="alert alert-danger" role="alert">
                            {{ 'Update User Failed' }}
                        </div>
                    @endif
                    <form action="{{ url("/admin/user/update/{$profileUser->id}") }}" method="POST">
                        @csrf
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="txtFullName">Full
                                            Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txtFullName" name="txtFullName"
                                            value="{{ $profileUser->name }}">
                                    </div>
                                    @error('txtFullname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="txtEmail">Email</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txtEmail" name="txtEmail"
                                            value="{{ $profileUser->email }}">
                                    </div>
                                    @error('txtEmail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="txtPhoneNumber">Phone Number</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ $profileUser->phone_number }}">
                                    </div>
                                    @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="txtAddress">Address</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txtAddress" name="txtAddress"
                                            value="{{ $profileUser->address }}">
                                    </div>
                                    @error('txtAddress')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="txtDateOfBirth">Date Of Birth</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="txtDateOfBirth" name="txtDateOfBirth"
                                            value="{{ $profileUser->date_of_birth }}">
                                    </div>
                                    @error('txtDateOfBirth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mt-2" for="cbRole">Role</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select name="cbRole" id="cbRole" class="form-control">
                                            @foreach ($lstRole as $item)
                                                @error('txtFullname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror <option value="{{ $item->id }}"
                                                    {{ $item->id == $profileUser->role_id ? 'selected' : '' }}>
                                                    {{ $item->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                </div>
                                <button type="submit" class="btn btn-primary col-4 mb-5">Save</button>
                                <div class="col-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
