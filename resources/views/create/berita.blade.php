@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4>Tambah Berita</h4>
    
    <div class="card mt-4">
        <div class="card-body">

        
    
    <form action="/berita/store" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" required name="judul" placeholder="Judul Berita" value="{{session('error') == null ? '' : session('error')['oldjudul']}}">
            @if (session()->has('error'))
                @if (isset(session('error')['error']['judul']))
                    @foreach (session('error')['error']['judul'] as $e)
                        <p class="text-danger mb-0">{{$e}}</p>
                    @endforeach
                @endif
            @endif
        </div>
          <div class="mb-3">
              <label for="text" class="form-label">Text</label>
              <textarea type="text" class="form-control" id="summernote" required name="text" placeholder="Isi konten berita...">{{session('error') == null ? '' : session('error')['oldtext']}}</textarea>
              @if (session()->has('error'))
                    @if (isset(session('error')['error']['text']))
                        @foreach (session('error')['error']['text'] as $e)
                            <p class="text-danger mb-0">{{$e}}</p>
                        @endforeach
                    @endif
                @endif
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required placeholder="Slug Berita" value="{{session('error') == null ? '' : session('error')['oldslug']}}">
                @if (session()->has('error'))
                    @if (isset(session('error')['error']['slug']))
                        @foreach (session('error')['error']['slug'] as $e)
                            <p class="text-danger mb-0">{{$e}}</p>
                        @endforeach
                    @endif
                @endif
            </div>
              <div class="mb-3">
                  <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="foto" required>
                @if (session()->has('error'))
                    @if (isset(session('error')['error']['foto']))
                        @foreach (session('error')['error']['foto'] as $e)
                            <p class="text-danger mb-0">{{$e}}</p>
                        @endforeach
                    @endif
                @endif
            </div>
            <button type="submit" class="btn btn-success">Tambah Berita</button>
            <a href="/berita" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</div>
</main>
@include('temp.footer')