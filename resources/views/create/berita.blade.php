@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4>Tambah Berita</h4>
    
    @if (session()->has('error'))
        @foreach (session('error')['error'] as $e)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{$e[0]}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
    @endif
    
    <form action="/berita/store" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" required name="judul" placeholder="Judul Berita" value="{{session('error') == null ? '' : session('error')['oldjudul']}}">
        </div>
          <div class="mb-3">
              <label for="text" class="form-label">Text</label>
              <textarea type="text" class="form-control" id="summernote" required name="text" placeholder="Isi konten berita...">{{session('error') == null ? '' : session('error')['oldtext']}}</textarea>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required placeholder="Slug Berita" value="{{session('error') == null ? '' : session('error')['oldslug']}}">
              </div>
              <div class="mb-3">
                  <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="foto" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah Berita</button>
            <a href="/berita" class="btn btn-warning">Kembali</a>
        </form>
</main>
@include('temp.footer')