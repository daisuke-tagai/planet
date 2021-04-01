@extends('layouts.app')

@section('content')

<main class="pt-1">
  @include('layouts.nav')

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-9 px-4">
      @include('layouts.feature')
      </div>
      
      @include('layouts.sub')

    </div>
  </div>
</main>


@endsection