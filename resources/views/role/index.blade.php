@php
$title = 'Role Management';
@endphp
@extends('layouts.admin.master-admin')

@section('content')
    <div class="row">
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-4 mt-3 mb-3">
            <form action="{{ route('role.add') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="txtRoleName">Add New Role</label>
                    <input type="text" name="txtRoleName" class="form-control mt-3" placeholder="Enter New Role">
                </div>
                <div class="form-group">
                    <button class="btn btn-success m-r-10" style="float: right">Add Role</button>
                </div>
            </form>
        </div>
        <div class="col-8">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Name Role') }}</th>
                        <th>{{ __('Date Create') }}</th>
                        <th>{{ __('Delete') }}</th>
                    </tr>
                    @foreach ($lstRole as $lstRole)
                        <tr>
                            <td>{{ $lstRole->id }}</td>
                            <td contenteditable class="role_value" data-role_value="description"
                                data-id="{{ $lstRole->id }}">
                                {{ $lstRole->description }}
                            </td>
                            <td>{{ $lstRole->create_at }}</td>
                            <td>
                                <button class="btn btn-danger" onclick="deleteRole({{ $lstRole->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('blur', '.role_value', function() {
            var id = $(this).data("id");
            var col = $(this).data("role_value");
            var value = $(this).text();
            if (value.trim() != '') {
                $.ajax({
                    type: "POST",
                    url: '{{ route('role.update') }}',
                    data: {
                        id: id,
                        col: col,
                        value: value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            alert(data.message);
                        }
                    }
                });
            }
        })

        function deleteRole(id) {
            var check = confirm('Do you sure delete this item');
            if (!check) return

            $.ajax({
                type: "POST",
                url: '{{ route('role.delete') }}',
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
