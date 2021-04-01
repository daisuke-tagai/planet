@extends('layouts.app')

@section('content')

<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
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
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">タイトル</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('title', $post->title) }}" name="title">
                  </div>

                  
                  <div class="form-group">
                    <label for="exampleFormControlFile1">画像</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">カテゴリー</label>
                    <select class="form-control" name="category_id" id="exampleFormControlSelect1" >
                      @foreach ($categories as $category)
                          @if ($post->category_id == $category->id )
                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                          @else
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                          @endif
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="commemt">本文 <small class="text-muted">#◯◯でタグ付けができます。</small></label>
                    <textarea class="form-control" name="content" id="comment" rows="5">{{ $post->content }}</textarea>
                    <p class="small">※URLを書くと自動でリンクをはれます。</p>
                  </div>

                  <input type="hidden" name="user_id" value="{{ Auth::id() }}">


                  <button type="submit" class="btn btn-primary">編集</button>
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