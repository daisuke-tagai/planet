@extends('layouts.app')

@section('content')

<main class="pt-1">
  @include('layouts.nav')

  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-9 p-md-4">
        <div class="card-header feature-header">
          <h3 class="ml-md-5">{{ $feature->feature_name }}</h3>
          <a class="p-1" href="{{ route('feature.index') }}">特集一覧</a>
        </div>
        <div class="rounded bg-white my-3 py-2 px-3 mx-md-5 text-center">
          @foreach ($articles as $article)
          <div class="row my-3">
            <div class="col-4">
              <img src="{{ asset('/storage/image/'.$article->image) }}">
            </div>
            <div class="col-7 pt-3 pt-md-5 border-bottom">
              <a href="{{ route('articles.show', $article->id) }}">
                <h5 class="m-0">{{ $article->title }}</h5>
              </a>
          </div>
          </div>
          @endforeach
        </div>
      </div>

      @include('layouts.sub')

    </div>
  </div>
</main>
@endsection