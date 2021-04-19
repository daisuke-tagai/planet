<div class="col-lg-3 mt-1 px-4">

  <div class="section card sub mt-5 mt-md-0">
    <div class="card-header py-1">
      <h5>picup</h5>
    </div>
    <div class="card-body p-1">
      @foreach ($randoms as $random)
      <div class="p-1 card">
          <a class="row" href="{{ route('articles.show', $random->id) }}">
            <div class="col-5 col-lg-12 col-xl-5 pr-xl-0">
              <img src="{{ asset('/storage/image/'.$random->image) }}">
            </div>
            <div class="d-flex align-items-center col-7 col-lg-12 px-0 px-lg-3 col-xl-7 px-xl-1">
              <p>{{ $random->title }}</p>
            </div>
          </a>
      </div>
      @endforeach
    </div>
  </div>

  <div class="section recommend sub mt-5">
    <div class="recommend-header">
      <h5 class="ml-3 ml-lg-0">recommend</h5>
    </div>
    <div class="recommend-body my-1 px-2 row">
      @foreach ($recommends as $recommend)
      <div class="col-lg-6 p-2">
        <a href="{{ route('articles.show', $recommend->id) }}">
          <img style="max-width: 100%" src="{{ asset('/storage/image/'.$recommend->image) }}">
        </a>
      </div>
      @endforeach
    </div>
  </div>
  
  <div class="row justify-content-around">
    <div class="section card sub mt-5 col-md-5 col-lg-12">
      <div class="card-header py-1">
        <h5>タグ</h5>
      </div>
      <div class="card-body p-2">
        <div class="card">
          <div class="card-body tags">
            @foreach ($tags as $tag)
                <div class="m-1">
                  <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}">
                    #{{ $tag->tag_name }}
                  </a>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  
    <div class="section card sub mt-5 col-md-5 col-lg-12">
      <div class="card-header py-1">
        <h5>Planetについて</h5>
      </div>
      <div class="card-body p-2">
        <div class="p-1 border rounded d-flex align-items-center flex-lg-column flex-xl-row">
          <div>
            <img src="{{ url('/img/Planet_logo.png') }}" style="max-width: 80px" class="mx-auto ">
          </div>
            <p class="m-1 p-2">経済、政治、世界情勢、社会を学びながらニュースを見れる情報サービスです。</p>
        </div>
        <p class="mt-2 ml-2"><i class="fas fa-envelope mr-1"></i>planet-pulchrum@gmail.com</p>
      </div>
    </div>
  </div>
  
</div>