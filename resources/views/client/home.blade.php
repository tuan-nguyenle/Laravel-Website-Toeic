@php
    $title = config('app.name');
@endphp
@extends('client.layout.master-layout')

@section('css')
    {{-- <script src="{{ asset('asset/js/popper.js') }}"></script> --}}
@stop

@section('content')
    <!-- Carousel wrapper -->
    <div id="carouselExampleCaptions" class="container-fluid carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach ($listBanner as $lstBanner)
                @if ($loop->first)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="{{ ++$index }}" aria-current="true" aria-label="Slide {{ $index }}"></button>
                @else
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ ++$index }}"
                        aria-label="Slide {{ $index }}"></button>
                @endif
            @endforeach
        </div>

        <!-- Inner -->
        <div class="carousel-inner rounded-5 shadow-4-strong">
            <!-- Single item -->
            @foreach ($listBanner as $lstBanner)
                @if ($loop->first)
                    <div class="carousel-item active">
                        <img src="{{ asset('asset/slide-banner/' . $lstBanner->image) }}" class="d-block w-100" />
                        <div class="carousel-caption d-none d-md-block" style="background-color: grey">
                            <strong>{{ $lstBanner->title }}</strong>
                            <br>
                            <i>{{ $lstBanner->content }}</i>
                        </div>
                    </div>
                @else
                    <div class="carousel-item">
                        <img src="{{ asset('asset/slide-banner/' . $lstBanner->image) }}" class="d-block w-100" />
                        <div class="carousel-caption d-none d-md-block" style="background-color: grey">
                            <strong>{{ $lstBanner->title }}</strong>
                            <br>
                            <i>{{ $lstBanner->content }}</i>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel wrapper -->

@endsection

@section('js')

@stop
