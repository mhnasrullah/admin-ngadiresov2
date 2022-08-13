@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4>Tambah Wisata</h4>
    
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
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" required name="nama" placeholder="Nama wisata" value="{{session('error') == null ? '' : session('error')['oldnama']}}">
        </div>
          <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <textarea type="deskripsi" class="form-control" id="summernote" required name="deskripsi" placeholder="Deskripsi wisata">{{session('error') == null ? '' : session('error')['olddeskripsi']}}</textarea>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required placeholder="Slug wisata" value="{{session('error') == null ? '' : session('error')['oldslug']}}">
            </div>
            <div class="mb-3">
                <label for="tiket" class="form-label">Tiket</label>
                <input type="text" class="form-control" id="tiket" name="tiket" required placeholder="tiket wisata" value="{{session('error') == null ? '' : session('error')['oldtiket']}}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="alamat wisata" value="{{session('error') == null ? '' : session('error')['oldalamat']}}">
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="text" class="form-control" id="waktu" name="waktu" required placeholder="waktu wisata" value="{{session('error') == null ? '' : session('error')['oldwaktu']}}">
            </div>
            <div class="mb-3">
                <label for="map" class="form-label">Map</label>
                <input type="text" class="form-control" id="map" name="map" required placeholder="map wisata" value="{{session('error') == null ? '' : session('error')['oldmap']}}">
            </div>
            <button type="submit" class="btn btn-success">Tambah Wisata</button>
            <a href="/berita" class="btn btn-warning">Kembali</a>
        </form>
</main>
@include('temp.footer')