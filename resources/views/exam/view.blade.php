@php
    $title = 'View Detail Exam ' . $idExam;
@endphp
@extends('layouts.admin.master-admin')
@section('content')
    <form action="{{ route('exam.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <input type="submit">
    </form>
    <div style="overflow-x: scroll;">
        <table class="table table-hover">
            @csrf
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Paragraph') }}</th>
                <th>{{ __('Question') }}</th>
                <th>{{ __('Option 1') }}</th>
                <th>{{ __('Option 2') }}</th>
                <th>{{ __('Option 3') }}</th>
                <th>{{ __('Option 4') }}</th>
                <th>{{ __('Correct Answer') }}</th>
                <th>{{ __('Image') }}</th>
                <th>{{ __('Audio') }}</th>
            </tr>
            @foreach ($listQuestion as $item)
                @foreach ($item->question as $question)
                    <tr class="table-row">
                        <td>{{ $question->number_for_exam }}</td>
                        <td>{!! $question->paragraph !!}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->option_1 }}</td>
                        <td>{{ $question->option_2 }}</td>
                        <td>{{ $question->option_3 }}</td>
                        <td>{{ $question->option_4 }}</td>
                        <td>{{ $question->correct_answer }}</td>
                        <td>
                            <img src="{{ asset('storage/exam/' . $question->image) }}" alt="" title=""
                                style="max-height: 100px;max-width: 100px;">
                            {{-- {{ $question->image }}</td> --}}
                        <td>
                            @if ($question->audio != null)
                                <audio controls>
                                    <source src="{{ asset('storage/exam/' . $question->audio) }}" type="audio/mpeg">
                                </audio>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </div>
@endsection
