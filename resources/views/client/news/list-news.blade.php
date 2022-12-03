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
            {{ Breadcrumbs::render('ListNews') }}
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
    <script>
        function getBreadcrumbs() {
            const here = location.href.split('/').slice(4);
            const parts = [{
                "text": 'Home',
                "link": 'english-for-future'
            }];
            // console.log(parts)

            for (let i = 0; i < here.length; i++) {
                const part = here[i];
                const text = decodeURIComponent(part).split('.')[0];
                // console.log(text)
                const link = here.slice(0, i + 1).join('/');
                parts.push({
                    "text": text,
                    "link": link
                });
            }
            return parts.map((part) => {
                return "<li class='breadcrumb-item'><a href=\"" + part.link + "\">" + part.text +
                    "</a></li>"
            })
        }
        document.getElementById("breadcrumb").innerHTML = getBreadcrumbs();
    </script>
@stop
