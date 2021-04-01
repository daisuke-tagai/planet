@extends('layouts.app')

@section('content')
<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
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
                <form action="{{ route('comments.store') }}" method="POST">
                  @csrf
                  
                  <div class="form-group">
                    <label for="commemt">コメント</label>
                    <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
                    <p class="small">※URLを書くと自動でリンクをはれます。</p>
                  </div>
                  
                  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                  <input type="hidden" name="post_id" value="{{ $post_id }}">
                  
                  <button type="submit" class="btn btn-primary">投稿</button>
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