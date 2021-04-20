@extends('layouts.app')

@section('content')

<main class="pt-1">
  @include('layouts.nav')

  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-lg-9 px-md-4">
        <div class="card-header header">
          <a href="{{ route('feature.show', $article->feature_id) }}">
            <h3 class="ml-md-5">{{ $article->feature->feature_name }}</h3>
          </a>
          <a class="p-1" href="{{ route('feature.index') }}">特集一覧</a>
        </div>

        <div class="rounded bg-white mx-md-4 my-4 mx-1 p-1">
          <div class="d-flex border-bottom m-3">
            <h4 class="p-1 my-1">{{ $article->title }}</h4>
          </div>

          <div class="px-1 py-2">
            @if (!empty($article->image))
            <img style="max-width: 100%" src="{{ asset('/storage/image/'.$article->image) }}">
            @endif
            <p class="card-text pt-4">{!! nl2br($article->content_with_link) !!}</p>
            
            <div class="my-5">
              <div class="d-flex justify-content-center">
                @if (isset($previous))
                  <a href="{{ route('articles.show', $previous->id) }}">前へ</a>
                @endif
  
                <a class="mx-5 my-0" href="{{ route('feature.show', $article->feature_id) }}">
                  {{ $article->feature->feature_name }}
                </a>
  
                @if (isset($next))
                <a href="{{ route('articles.show', $next->id) }}">次へ</a>
                @endif
              </div>

              @auth('admin')
              <div class="mt-3 d-flex">
                <a href="{{ route('articles.edit', $article->id) }}" class="btn text-white btn-secondary my-1 mr-2">編集</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <input type="submit" value="削除" class="btn text-white btn-secondary rounded mr-2 my-1"
                    onclick='return confirm("削除しますか？");'>
                </form>
              </div>
              @endauth
            </div>
          </div>
        </div>
      </div>

      @include('layouts.sub')

    </div>
  </div>
</main>
@endsection