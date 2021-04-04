@extends('layouts.app')

@section('content')

<main class="pt-1">
    @include('layouts.nav')
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-9 px-3">
                <div class="feature-section p-3">
                    <div class="card-header header"">
                        <h3 class="ml-md-5">特集</h3>
                        <a href="{{ route('feature.index') }}">特集一覧</a>
                    </div>
                    <div class="card border-0">
                        <div class="card-body features p-0 p-md-3">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($features as $feature)
                                    <div class="feature swiper-slide px-2 pt-4 pt-md-0">
                                        <a href="{{ route('feature.show', $feature->id) }}">
                                            <img  src="{{ asset('/storage/image/'.$feature->image) }}">
                                            <h5>{{ $feature->feature_name}}</h5>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>

                                <div class="swiper-scrollbar"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="news-section my-4 p-3 px-md-2">
                    <div class="card-header header"">
                        <h3 class="ml-md-5">新着ニュース</h3>
                        <a href="{{ route('posts.index') }}">ニュース一覧</a>
                    </div>
                    <div class="card-body my-3 mx-md-3 p-1 p-md-3 rounded bg-white">
                       @include('layouts.posts_board')
                    </div>
                    <div class="category-bar">
                        <div class="category-item mx-auto">
                            <a href="{{ route('posts.index') }}">もっと見る</a>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.sub')
        </div>
    </div>
</main>


@endsection
