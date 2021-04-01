@extends('layouts.app')

@section('content')

<main class="pt-1">
  @include('layouts.nav')

  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-9 px-md-4">

        <div class="card-header news-header ">
          <h3 class="ml-md-5">
            {{ $post->category->category_name}}
            ニュース
          </h3>
          <a class="p-1" href="{{ route('posts.index') }}">ニュース一覧</a>
        </div>
        
        <div class="card border-0 mx-md-4 mx-1 mt-3 mb-5 p-1">
          <div class="card-header bg-white">
            <h5 class="card-title mx-md-3 my-2 p-1">{{ $post->title }}</h5>
          </div>

          <div class="card-body p-2">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif
              <div class="card-body p-1">
                {{-- <p class="card-text">{{ $post->content }}</p> --}}
                <p class="card-text">{!! nl2br($post->content_with_link) !!}</p>

                @if (!empty($post->image))
                <img style="max-width: 100%" src="{{ asset('/storage/image/'.$post->image) }}">
                @endif

                <div class="d-flex mt-4 py-2">
                  <h6 class="m-0">[
                    <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">
                      {{ $post->category->category_name }}
                    </a>]
                  </h6>
                  <h6 class="m-0">
                    @foreach ($post->tags as $tag)
                    <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}" class="ml-2">
                      {{ $tag->tag_name }}
                    </a>
                    @endforeach
                  </h6>
                  <h6 class="my-0 ml-auto">by : 
                    <a href="{{ route('users.show', $post->user_id) }}">
                      {{ $post->user->name }}
                    </a>
                  </h6>
                </div>
                
                @can('update', $post)
                  <div class="d-flex mb-2">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn text-white btn-secondary mr-2 my-1">編集</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <input type="submit" value="削除" class="btn text-white btn-secondary rounded mr-2 my-1"
                        onclick='return confirm("削除しますか？");'>
                    </form>
                  </div>
                @endcan

              </div>
            
            <div class="p-2 pt-3 border-top">
              <div class="d-flex">
                <h5 class="card-title m-0 p-2">コメント</h5>
                <div class="ml-auto ">
                  <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="btn text-white btn-secondary">書き込み</a>
                </div>
              </div>
              @foreach ($post->comments as $comment)
              <div class="card mt-2">
                <div class="card-body p-2">
                  <div class="card-title d-flex justify-content-between">
                    <a href="{{ route('users.show', $comment->user_id) }}">
                      {{ $comment->user->name }}
                    </a>
                    @auth('admin')
                    <div>
                      <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="削除" class="btn text-white btn-secondary rounded"
                          onclick='return confirm("削除しますか？");'>
                      </form>
                    </div>
                    @endauth
                  </div>
                  <p class="card-text">{!! nl2br($comment->comment_with_link) !!}</p>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        @include('layouts.feature')
        
      </div>

      @include('layouts.sub')

    </div>
  </div>
</main>


@endsection