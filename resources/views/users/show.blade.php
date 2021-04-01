@extends('layouts.app')

@section('content')

<main class="py-1">
  @include('layouts.nav')

  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-9 px-md-4">
        <div class="card-header news-header ">
          <h3 class="ml-md-5">
            {{ $user->name }}の投稿
          </h3>
          <a class="p-1" href="{{ route('posts.index') }}">ニュース一覧</a>
        </div>
        <div class="card-body mt-3 mb-5 mx-md-3 p-1 p-md-3 rounded bg-white">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          @include('layouts.posts_board')
            
          {{ $posts->links() }}
        </div>

        <div class="card-header feature-header mt-5">
          <h3 class="ml-3">特集</h3>
        </div>
        <div class="card-body row">
          @foreach ($features as $feature)
          <div class="feature col-md-6 p-4">
            <a href="{{ route('feature.show', $feature->id) }}">
              <img style="max-width: 100%" src="{{ asset('/storage/image/'.$feature->image) }}">
              <h5 class="">{{ $feature->feature_name}}</h5>
            </a>
          </div>
          @endforeach
        </div>
      </div>

      @include('layouts.sub')

    </div>
  </div>
</main>
@endsection