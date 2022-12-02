@php
    $title = 'Slide Banner Management';
@endphp
@extends('layouts.admin.master-admin')

@section('css')

@stop
@section('content')
    <div class="d-fex justify-between">
        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#modalAddBanner">
            Add Banner
        </button>
    </div>

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
    <div class="table">
        <table class="table table-hover" id="data">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Content') }}</th>
                <th>{{ __('Image') }}</th>
                <th>{{ __('is_active') }}</th>
                <th>{{ __('update') }}</th>
            </tr>
            @foreach ($listBanner as $listBanner)
                <tr class="table-row">
                    <td>{{ $listBanner->id }}</td>
                    <td contenteditable>{{ $listBanner->title }}</td>
                    <td contenteditable>{{ $listBanner->content }}</td>
                    <td><img src="{{ asset('asset/slide-banner/' . $listBanner->image) }}"
                            alt="Banner {{ $listBanner->id }}" width="80px">
                    </td>
                    <td>
                        <select name="cbStatus" id="cbStatus" class="form-control">
                            <option value="1" {{ $listBanner->status == 1 ? 'selected' : '' }}>Active
                            </option>
                            <option value="0" {{ $listBanner->status == 0 ? 'selected' : '' }}>Deactivate
                            </option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-warning text-dark" onclick="updateBanner(this)">Update</button>
                        {{-- onclick="deleteUser({{ $lstUser->id }})" --}}
                    </td>
                </tr>
            @endforeach
        </table>
        {{-- {!! $listBanner->links('paginate') !!} --}}
    </div>
    @include('slide_banner.component.modal-add');
@endsection
@section('js')
    <script>
        function updateBanner(e) {
            var id = $(e).closest("tr").find("td:eq(0)").text();
            var content = $(e).closest("tr").find("td:eq(2)").text();
            var title = $(e).closest("tr").find("td:eq(1)").text();
            var status = $(e).closest("tr").find("td:eq(4) select").val();
            $.ajax({
                url: "{{ route('slide_banner.update') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    content: content,
                    title: title,
                    status: status
                },
                success: (response) => {
                    alert(response);
                },
                error: function(response) {
                    alert(response.status);
                }
            });
        }
    </script>
@stop
