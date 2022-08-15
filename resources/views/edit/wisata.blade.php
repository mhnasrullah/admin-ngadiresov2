@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4>Edit Wisata</h4>
    
    <div class="card mt-4">
        <div class="card-body">

        
    <form action="/wisata/update/{{$data['id']}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" required name="nama" placeholder="Nama wisata" value="{{session('error') == null ? $data['nama'] : session('error')['oldnama']}}">
            @if (session()->has('error'))
              @if (isset(session('error')['error']['nama']))
                  @foreach (session('error')['error']['nama'] as $e)
                      <p class="text-danger mb-0">{{$e}}</p>
                  @endforeach
              @endif
          @endif
        </div>
          <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <textarea type="deskripsi" class="form-control" id="summernote" required name="deskripsi" placeholder="Deskripsi wisata">{{session('error') == null ? $data['deskripsi'] : session('error')['olddeskripsi']}}</textarea>
              @if (session()->has('error'))
              @if (isset(session('error')['error']['deskripsi']))
                  @foreach (session('error')['error']['deskripsi'] as $e)
                      <p class="text-danger mb-0">{{$e}}</p>
                  @endforeach
              @endif
          @endif
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required placeholder="slug wisata" value="{{session('error') == null ? $data['slug'] : session('error')['oldslug']}}">
                @if (session()->has('error'))
              @if (isset(session('error')['error']['slug']))
                  @foreach (session('error')['error']['slug'] as $e)
                      <p class="text-danger mb-0">{{$e}}</p>
                  @endforeach
              @endif
          @endif
            </div>
            <div class="mb-3">
                <label for="tiket" class="form-label">Tiket</label>
                <input type="text" class="form-control" id="tiket" name="tiket" required placeholder="tiket wisata" value="{{session('error') == null ? $data['tiket'] : session('error')['oldtiket']}}">
                @if (session()->has('error'))
              @if (isset(session('error')['error']['tiket']))
                  @foreach (session('error')['error']['tiket'] as $e)
                      <p class="text-danger mb-0">{{$e}}</p>
                  @endforeach
              @endif
          @endif
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="alamat wisata" value="{{session('error') == null ? $data['alamat'] : session('error')['oldalamat']}}">
                @if (session()->has('error'))
                    @if (isset(session('error')['error']['alamat']))
                        @foreach (session('error')['error']['alamat'] as $e)
                            <p class="text-danger mb-0">{{$e}}</p>
                        @endforeach
                    @endif
                @endif
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="text" class="form-control" id="waktu" name="waktu" required placeholder="waktu wisata" value="{{session('error') == null ? $data['waktu'] : session('error')['oldwaktu']}}">
                @if (session()->has('error'))
                    @if (isset(session('error')['error']['waktu']))
                        @foreach (session('error')['error']['waktu'] as $e)
                            <p class="text-danger mb-0">{{$e}}</p>
                        @endforeach
                    @endif
                @endif
            </div>
            <div class="mb-3">
                <label for="map" class="form-label">Map</label>
                <input type="text" class="form-control" id="map" name="map" required placeholder="map wisata" value="{{session('error') == null ? $data['map'] : session('error')['oldmap']}}">
                @if (session()->has('error'))
                    @if (isset(session('error')['error']['map']))
                        @foreach (session('error')['error']['map'] as $e)
                            <p class="text-danger mb-0">{{$e}}</p>
                        @endforeach
                    @endif
                @endif
            </div>
            <button type="submit" class="btn btn-success">Tambah Wisata</button>
            <a href="/berita" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</div>
    </main>
@include('temp.footer')