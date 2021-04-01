@extends('layouts.app_admin')

@section('content')

<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card border-0">

          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif
            <div class="card">
              <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <form action="{{ route('feature.store') }}" method="POST" enctype="multipart/form-data" name="ansform">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">特集名</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="特集名" name="feature_name">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlFile1">画像</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                  </div>

                  

                  {{-- <input type="hidden" name="user_id" value="{{ Admin::id() }}"> --}}

                  <button type="submit" class="btn btn-primary" name="subbtn">追加</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>



@endsection