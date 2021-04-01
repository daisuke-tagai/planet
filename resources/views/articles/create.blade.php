@extends('layouts.app_admin')

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

                <h3 class="border-bottom mb-4">記事投稿</h3>

                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" name="ansform">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">タイトル</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="タイトル" name="title">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlFile1">画像</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">特集</label>
                    <select class="form-control" name="feature_id" id="exampleFormControlSelect1">
                      <option selected="">選択する</option>
                      
                      @foreach ($features as $feature)
                        <option value="{{ $feature->id }}">{{ $feature->feature_name }}</option>
                      @endforeach
                      
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="commemt">本文</label>
                    {{-- <textarea class="form-control" name="content" id="comment" rows="5"></textarea> --}}
                    <div id="editor" style="height: 500px;"></div>
                    <input type="hidden" id="editor-input" name="content">
                  </div>


                  {{-- <input type="hidden" name="user_id" value="{{ Admin::id() }}"> --}}

                  <button type="submit" class="btn btn-primary" name="subbtn">投稿</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

  
  <script>
    var quill = new Quill('#editor', {
    modules: {
    toolbar: [
    [{'header': [1, 2, 3, 4, 5, 6, false]}],
    ['bold', 'italic', 'underline', 'strike'],
    [{'color': []}, {'background': []}],
    ['link', 'blockquote', 'image', 'video'],
    [{ list: 'ordered' }, { list: 'bullet' }]
    ]
    },
    placeholder: 'Write your question here...',
    theme: 'snow'
    });

    var editor = document.getElementById('editor');
    var editorInput = document.getElementById('editor-input');

    quill.on('text-change', function(delta, oldDelta, source) {
      var editorHtml = editor.querySelector('.ql-editor').innerHTML;
      editorInput.value = editorHtml;
    })
  </script>
@endsection