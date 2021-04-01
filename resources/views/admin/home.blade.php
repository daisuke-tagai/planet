@extends('layouts.app_admin')

@section('content')
<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="container">
            <div class="p-2 mt-2 h3 ">管理画面</div>
            <div class="row pb-3 justify-content-center">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                    </div>
                    @endif

                    <h4 class="border-bottom mb-3">投稿・追加</h4>
                    
                    <div class="card-title admin-nav">
                      <a href="{{ route('articles.create')}}">記事投稿</a>
                    </div>
                    <div class="card-title admin-nav">
                      <a href="{{ route('feature.index')}}">記事一覧</a>
                    </div>
                    <div class="card-title admin-nav">
                      <a href="{{ route('feature.create')}}">特集追加</a>
                    </div>
                    <div class="card-title admin-nav">
                      <a href="{{ route('categories.create')}}">カテゴリー追加</a>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                    </div>
                    @endif
              
                    <div class="card-title">
                      <h4 class="mb-2">カテゴリー名変更</h4>
                      @foreach ($categories as $category)
                      <div class="card">
                        <div class="card-body p-1 m-0">
                          <h5 class="card-title m-0">
                            <a href="{{ route('categories.edit', $category->id) }}">
                              {{ $category->category_name }}
                            </a>
                          </h5>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                    </div>
                    @endif
              
                    <div class="card-title">
                      <h4 class="mb-2">特集名変更</h4>
                      @foreach ($features as $feature)
                      <div class="card">
                        <div class="card-body p-1 m-0">
                          <h5 class="card-title m-0">
                            <a href="{{ route('feature.edit', $feature->id) }}">
                              {{ $feature->feature_name }}
                            </a>
                          </h5>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

        
@endsection