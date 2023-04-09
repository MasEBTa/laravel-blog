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
        <h1 class="h2">Create New Posts</h1>
    </div>
    <div class="col-lg-9">
        <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
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
                <input type="text" class="form-control @error('slug') is-invalid @enderror disabled" id="slug" name="slug" value="{{ old('slug') }}" readonly>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                    <option value="">Pilih Kategori</option>
                    @foreach ($category as $kategori)
                        @if (old('category_id') == $kategori->id)
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
                <div style="max-height: 300px; overflow: hidden; display: none;" class="previewblock">
                    <img src="" class="img-preview img-fluid">
                </div>
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
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <div class="trix-editor-cover"><trix-editor input="body"></trix-editor></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    {{-- <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script> --}}
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('keyup', function() {
            let preslug = title.value;
            preslug = preslug.replace(/[^a-z\d\s]+/gi, "").replace(/ /g,"-");
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