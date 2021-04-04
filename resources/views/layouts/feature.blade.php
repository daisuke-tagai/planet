<div class="card-header header mt-3">
  <h3 class="ml-md-5">特集</h3>
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