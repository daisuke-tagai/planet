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
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data"
                  name="ansform">
                  @csrf
                  @method('patch')
                  <div class="form-group">
                    <label for="exampleInputEmail1">カテゴリー名</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                      value="{{ old('title', $category->category_name) }}" name="category_name">
                  </div>


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