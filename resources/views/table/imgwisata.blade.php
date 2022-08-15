@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4>Data Gambar Wisata - {{$wisata['nama']}}</h4>

    <div class="card mt-4 mb-3">
        <div class="card-body">
            <h5 class="mb-4">Tambah Gambar</h5>
            <form action="/wisata/{{$id_wisata}}/gambar" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <input type="file" class="form-control" id="gambar" name="foto" required>
                  @if (session()->has('error'))
                      @if (isset(session('error')['error']['foto']))
                          @foreach (session('error')['error']['foto'] as $e)
                              <p class="text-danger mb-0">{{$e}}</p>
                          @endforeach
                      @endif
                  @endif
              </div>
                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="overflow-auto">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach ($data as $d)
            @php
                $counter++;
            @endphp
                <tr>
                <th scope="row">{{$counter}}</th>
                <td><img src="{{$d['foto']}}" class="img-tbl"></td>
                <td class="d-flex">
                    <a href="/wisata/{{$id_wisata}}/gambar/{{$d['id']}}/delete" data-bs-toggle="tooltip" title="Hapus" class="btn btn-outline-danger d-flex justify-content-center align-items-center mx-1">
                        <span class="material-symbols-outlined">
                            delete
                            </span>
                    </a>
                </td>
                </tr>
            @endforeach
            </tbody>
          </table>
    </div>
</main>

@include('temp.footer')