@extends('dasbor.tampilan.utama')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Buat Post Baru</h1>
        </div>
        <div class="col-lg-8">
            <form action="/dasbor/posts/create" method="POST">
                @csrf
                {{-- @method('PUT') --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" disabled readonly>
                </div>
                <div class="mb-3">
                    <label for="kateg_id" class="form-label">Kategori</label>
                    <select class="form-select" name="kateg_id">
                        @foreach ($kategories as $kateg)
                            <option value="{{ $kateg->kateg_id }}">{{ $kateg->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Isi Post</label>
                    <input id="body" type="hidden" name="body">
                    <trix-editor input="body"></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary">Buat Post</button>
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

        document.addEventListener('trix-file-accept'), function(e) {
            e.preventDevault();
        }
    </script>
@endsection
