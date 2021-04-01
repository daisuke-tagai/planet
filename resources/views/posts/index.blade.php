@extends('layouts.app')

@section('content')


<main class="pt-1">
  @include('layouts.nav')

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-9 px-md-4">
        <div class="card-header news-header ">
          <h3 class="ml-md-5">
            @if(isset($category_id))
              {{ $category_name->category_name }}ニュース
            @elseif(isset($tag_name))
              #{{ $tag_name }}
            @elseif(isset($search_query))
              {{ $search_result }}
            @else
              ニュース一覧
            @endif
          </h3>

            @if(isset($category_id))
              <a href="{{ route('posts.index') }}">ニュース一覧</a>
            @elseif(isset($tag_name))
              <a href="{{ route('posts.index') }}">ニュース一覧</a>
            @endif

        </div>
        
        
        <div class="card-body mt-3 mb-5 mx-md-3 p-1 p-md-3 rounded bg-white ">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
      
          @include('layouts.posts_board')
        
          @if(isset($category_id))
          {{ $posts->appends(['category_id' => $category_id])->links() }}
          
          @elseif(isset($tag_name))
          {{ $posts->appends(['tag_name' => $tag_name])->links() }}
          
          @elseif(isset($search_query))
          {{ $posts->appends(['search' => $search_query])->links() }}
          
          @else
          {{ $posts->links() }}
          @endif
        </div>

        @include('layouts.feature')
        
      </div>

      @include('layouts.sub')

    </div>
  </div>
</main>

@endsection