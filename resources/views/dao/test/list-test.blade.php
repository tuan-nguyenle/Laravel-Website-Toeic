@php
    $title = 'List Exam';
@endphp
@extends('client.layout.master-layout')

@section('css')
    <style>
        .__list-group-item>li {
            padding: 0.5em;
        }

        .__list-group-item>li::before {
            content: "	\2022";
            width: 4px;
            height: 4px;
            color: #04a6f7;
            top: 16px;
            left: 0;
            display: inline;
            margin-right: 15px;
        }
    </style>
@stop

@section('content')
    <div class="container" style="background-color: #f3f7fa;padding-top: 10px;padding-bottom: 2px;min-height: 300px;">
        <div class="row mb-1">
            <h4 style="text-align: center;">List Exam Online</h4>
            <ul class="__list-group-item" style="list-style: none;">
                @foreach ($listExam as $examItem)
                    <li class="list-item">
                        <a href="{{ route('test.take-exam', ['testId' => $examItem->id]) }}">
                            <span>
                                {{ $examItem->id }}
                            </span>
                            <span>
                                {{ $examItem->description }}
                            </span>
                            <span>
                                {{ $examItem->level }}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('js')
@stop
