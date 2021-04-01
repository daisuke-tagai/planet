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
                <form action="{{ route('feature.update', $feature->id) }}" method="POST" enctype="multipart/form-data" name="ansform">
                  @csrf
                  @method('patch')
                  <div class="form-group">
                    <label for="exampleInputEmail1">特集名</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('title', $feature->feature_name) }}"
                      name="feature_name">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlFile1">画像</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                  </div>



                  {{-- <input type="hidden" name="user_id" value="{{ Admin::id() }}"> --}}

                  <button type="submit" class="btn btn-primary" name="subbtn">更新</button>
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