<div class="container">
  <div class="row">
    <div class="categories d-flex col-md-6 pl-md-5 pl-3">
      @foreach ($categories as $category)
      <div class="category mx-1">
        <a href="{{ route('posts.index', ['category_id' => $category->id]) }}">
          {{ $category->category_name }}
        </a>
      </div>
      @endforeach
    </div>

    <div class="categories d-none d-md-flex col-md-3 p-0 justify-content-end">
      <div class="category mx-1">
        <a href="{{ route('feature.index') }}">特集一覧</a>
      </div>
      <div class="category mx-1">
        <a href="{{ route('posts.index') }}">記事一覧</a>
      </div>
    </div>

    <div id="custom-search-input" class="d-none d-md-block col-md-3">
      <div class="input-group px-2">
        <form action="{{ route('posts.search') }}" method="get">
          @csrf
          <div style="display:inline-flex">
            <input type="text" class="form-control input-md" name="search" placeholder="検索">
            <span class="input-group-btn">
              <button class="btn btn-secondary btn-md" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container d-md-none mt-2">
  <div class="input-group">
    <form action="{{ route('posts.search') }}" method="get" style="width: 100%">
      @csrf
      <div style="display:inline-flex; width: 100%;">
        <input type="text" class="form-control input-sm" name="search" placeholder="検索">
        <span class="input-group-btn">
          <button class="btn btn-secondary btn-md" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </span>
      </div>
    </form>
  </div>
</div>