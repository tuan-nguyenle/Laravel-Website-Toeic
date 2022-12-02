@php
    $title = 'News';
@endphp
@extends('client.layout.master-layout')

@section('css')
    {{-- <script src="{{ asset('asset/js/popper.js') }}"></script> --}}
@stop

@section('content')
    <div class="container" style="background-color: #f3f7fa;padding-top: 10px;padding-bottom: 2px;min-height: 300px;">
        <nav style="--bs-breadcrumb-divider: '>'; background-color: #eeeeee;" aria-label="breadcrumb" class="mt-2 mb-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        <span><i class="fa-solid fa-house-chimney"></i></span>
                        {{ 'Home' }}
                    </a>
                </li>
                @foreach (explode('/', Request::path()) as $path)
                    @if ($loop->first)
                        <li class="breadcrumb-item">
                            <a href="{{ route($path) }}">
                                {{ $path }}
                            </a>
                        </li>
                    @elseif ($loop->last)
                        <li class="breadcrumb-item active">
                            {{ $path }}
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
        <div class="row mb-1">
            @foreach ($listNews as $item)
                <div class="row thumbnail-news w-100" style="min-height: 300px;max-height: 300px;">
                    <figure class="col-4">
                        <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-100"
                            style="max-height: 300px;">
                    </figure>
                    <div class="col-8">
                        <a
                            href="{{ route('news.slug', ['slug' => $item->href_param]) }}"><strong>{{ $item->title }}</strong></a>
                        <p>{{ substr($item->content, 0, 1000) }}</p>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-3">
                {!! $listNews->links('paginate') !!}
            </div>
        </div>
    </div>
@endsection

@section('js')

@stop
