
@foreach ($posts as $post)
  <div class="card">
    <div class="card-body p-1">
      <h6 class="m-0 p-1">
        <a href="{{ route('posts.show', $post->id) }}">
          {{ $post->title }}
        </a>
      </h6>
      <div class="d-flex float-right">
        <p class="small">[
          <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">
            {{ $post->category->category_name }}
          </a>]
        </p>
        <p class="small">(
          {{ $post->created_at->format('m/d') }}
          </a>)
        </p>
      </div>
    </div>
  </div>
@endforeach