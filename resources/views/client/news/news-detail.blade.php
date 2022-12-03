@php
    $title = $news->title;
@endphp
@extends('client.layout.master-layout')

@section('css')
    {{-- <script src="{{ asset('asset/js/popper.js') }}"></script> --}}
@stop

@section('content')
    <div class="container" style="background-color: #f3f7fa;padding-top: 10px;padding-bottom: 2px;min-height: 300px;">
        <nav style="--bs-breadcrumb-divider: '>'; background-color: #eeeeee;" aria-label="breadcrumb" class="mt-2 mb-2">
            {{ Breadcrumbs::render('NewsDetail', $news) }}
        </nav>
        <div class="row mb-1">
            <h4><strong>{{ $news->title }}</strong></h4>
            <div class="content">
                {!! $news->content !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
@stop
