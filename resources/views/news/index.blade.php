@php
    $title = 'News Management';
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
    <a href="{{ route('news.view') }}" class="btn btn-primary">Add New</a>
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
                <th>{{ __('Title') }}</th>
                <th>{{ __('href-param') }}</th>
                <th>{{ __('Thumbnail') }}</th>
                <th>{{ __('Author') }}</th>
                <th>{{ __('Create At') }}</th>
                <th>{{ __('Status') }}</th>
            </tr>
            @foreach ($listNews as $lstNews)
                <tr class="table-row" data-href="{{ url("/admin/news/view/{$lstNews->id}") }}">
                    <td>{{ $lstNews->id }}</td>
                    <td>{{ $lstNews->title }}</td>
                    <td>{{ $lstNews->href_param }}</td>
                    <td><img src="{{ asset($lstNews->thumbnail) }}" alt="Thumbnail {{ $lstNews->title }}" width="30px">
                    </td>
                    <td>{{ $lstNews->user->name }}</td>
                    <td>{{ $lstNews->create_at }}</td>
                    <td>
                        {{ $lstNews->is_active == 1 ? 'Active' : 'Inactive' }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
@stop
