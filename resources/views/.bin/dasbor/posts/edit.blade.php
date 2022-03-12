@extends('dasbor.tampilan.utama')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Post</h1>
        </div>
        <div class="col-lg-8">
            <form enctype="multipart/form-data" action="/dasbor/posts/{{ $post->post_id }}" method="POST"
                class="mb-5">
                @csrf
                @method('PUT') {{-- method untuk update, bisa juga pake patch --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        autofocus value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            *{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                        value="{{ old('slug', $post->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            *{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kateg_id" class="form-label">Kategori</label>
                    <select class="form-select @error('kateg_id') is-invalid @enderror" name="kateg_id">
                        <option value="">Pilih kategori..</option>
                        @foreach ($kategories as $kateg)
                            @if (old('kateg_id', $post->kateg_id) == $kateg->kateg_id)
                                <option selected value="{{ $kateg->kateg_id }}">{{ $kateg->nama }}</option>
                            @else
                                <option value="{{ $kateg->kateg_id }}">{{ $kateg->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('kateg_id')
                        <div class="invalid-feedback">
                            *{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Post</label>
                    <input type="hidden" name="gambarOld" value="{{ $post->gambar }}">
                    @if ($post->gambar)
                        <img src="{{ asset('storage/' . $post->gambar) }}" class="img-lihat img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-lihat img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar"
                        onchange="lihatGambar()">
                    @error('gambar')
                        <div class="invalid-feedback">
                            *{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Isi Post</label>
                    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                    <trix-editor input="body"></trix-editor>
                    @error('body')
                        <p class="text-danger"><small>*{{ $message }}</small></p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Post</button>
            </form>
        </div>
    </main>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dasbor/posts/cekSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept'),
            function(e) {
                e.preventDevault();
            }

        // tampil preview image
        function lihatGambar() {
            const gambar = document.querySelector('#gambar');
            const gambarPreview = document.querySelector('.img-lihat')

            gambarPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function(oFREvent) {
                gambarPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
