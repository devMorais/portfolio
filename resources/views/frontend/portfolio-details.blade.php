@extends('frontend.layouts.layout')
@section('content')
    <header class="site-header parallax-bg">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-sm-8">
                    <h2 class="title">Detalhes do Portfolio</h2>
                </div>
                <div class="col-sm-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- portfolio var --}}

    <!-- Portfolio-Area-Start -->
    <section class="portfolio-details section-padding" id="portfolio-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="head-title">{{ $portfolio->title }}</h2>
                    <figure class="image-block">
                        <img class="img-fix" src="{{ asset($portfolio->image) }}" alt="">
                    </figure>
                    <div class="portflio-info">
                        <div class="single-info">
                            <h4 class="title">Cliente</h4>
                            <p>{{ $portfolio->client }}</p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Data</h4>
                            <p>{{ \Carbon\Carbon::parse($portfolio->created_at)->translatedFormat('d M, Y') }}</p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Website</h4>
                            <p><a href="{{ $portfolio->website }}">{{ $portfolio->website }}</a></p>
                        </div>
                        <div class="single-info">
                            <h4 class="title">Categoria</h4>
                            <p>{{ $portfolio->category->name }}</p>
                        </div>
                    </div>
                    <div class="description">
                        {!! $portfolio->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-Area-End -->
@endsection
