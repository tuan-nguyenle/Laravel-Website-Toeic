@php
    $title = 'Exams Management';
@endphp
@extends('layouts.admin.master-admin')
@section('content')
    <a href="{{ route('exam.view-add') }}">Add New Exam</a>
    <table class="table table-hover">
        @csrf
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Level') }}</th>
            <th>{{ __('Create At') }}</th>
            <th>{{ __('Status') }}</th>
        </tr>
        @foreach ($listExam as $exam)
            <tr class="table-row" data-href="{{ url("/admin/exam/view/{$exam->id}") }}">
                <td>{{ $exam->id }}</td>
                <td>{{ $exam->description }}</td>
                <td>{{ $exam->level }}</td>
                <td>{{ $exam->created_at }}</td>
                <td>
                    {{ $exam->status == 1 ? 'Active' : 'Inactive' }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
@section('js')
    <script>
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
@endsection
