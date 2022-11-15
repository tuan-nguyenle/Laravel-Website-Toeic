@extends('layouts.edit-profile')

@section('change-information')
    <form method="POST" action="{{ route('update-password') }}">
        @csrf
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="form-group">
                <label for="oldPasswordInput">Current Password</label>
                <input type="password" class="form-control  @error('old_password') is-invalid @enderror"
                    id="oldPasswordInput" required="" name="old_password">
                @error('old_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="newPasswordInput">New Password</label>
                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                    id="newPasswordInput" required="" name="new_password">
                <div class="form-text small text-muted">
                    The password must be 8-20 characters, and must <em>not</em> contain
                    spaces.
                </div>
                @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="confirmNewPasswordInput">Confirm Your Password</label>
                <input type="password" class="form-control" id="confirmNewPasswordInput" required=""
                    name="new_password_confirmation">
                <span class="form-text small text-muted">
                    To confirm, type the new password again.
                </span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mb-3 float-right">Save</button>
            </div>
        </div>
    </form>
@endsection
