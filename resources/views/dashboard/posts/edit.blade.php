@extends('dashboard.layouts.main')

@if ($errors->has('body'))
    <style>
        .trix-editor-cover {
            border: 1px solid red;
            border-radius: 10px;
            padding-top: 5px;
        }
    </style>
@endif

@section('containerDashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Posts</h1>
    </div>
    <div class="col-lg-9">
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                @if ($errors->has('title'))
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                @else
                    @error('slug')
                        <div class="text-danger">Ditemukan judul yang sama. silahkan ganti judul anda</div>
                    @enderror
                @endif
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror disabled" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" readonly>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                    <option value="">Pilih Kategori</option>
                    @foreach ($category as $kategori)
                        @if (old('category_id', $post->category_id) == $kategori->id)
                          <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                        @else
                          <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                @if ($post->image)
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    <div style="max-height: 300px; overflow: hidden;" class="previewblock">
                        <img src="{{ asset('storage/'. $post->image) }}" class="img-preview img-fluid">
                    </div>
                @else
                    <div style="max-height: 300px; overflow: hidden; display: none;" class="previewblock">
                        <img src="" class="img-preview img-fluid">
                    </div>
                @endif
                <input type="file" class="form-control  @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if($errors->any())
                    <div class="text-danger">silahkan input lagi gambar anda</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <div class="trix-editor-cover"><trix-editor input="body"></trix-editor></div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('keyup', function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            const blockPreview = document.querySelector('.previewblock');

            imgPreview.style.display = 'block';
            blockPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection