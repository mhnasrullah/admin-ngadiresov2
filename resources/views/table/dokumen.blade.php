@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4>Data Dokumen Penyuratan</h4>

    <div class="card mt-4 mb-3">
        <div class="card-body">
            <h5 class="mb-4">Tambah Dokumen</h5>
            <form action="/dokumen/store" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required placeholder="Formulir pembuatan KTP" value="{{session('error') == null ? '' : session('error')['oldnama']}}">
                    @if (session()->has('error'))
                  @if (isset(session('error')['error']['nama']))
                      @foreach (session('error')['error']['nama'] as $e)
                          <p class="text-danger mb-0">{{$e}}</p>
                      @endforeach
                  @endif
              @endif
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">link</label>
                    <input type="text" class="form-control" id="link" name="link" required placeholder="drive.com/linkform" value="{{session('error') == null ? '' : session('error')['oldlink']}}">
                    @if (session()->has('error'))
                  @if (isset(session('error')['error']['link']))
                      @foreach (session('error')['error']['link'] as $e)
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
                <th scope="col">Pertanyaan</th>
                <th scope="col">Jawaban</th>
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
                <td>{{$d['nama']}}</td>
                <td><a href="{{$d['link']}}" class="text-primary text-decoration-underline">{{$d['link']}}</a></td>
                <td class="d-flex">
                    <a href="/dokumen/{{$d['id']}}/delete" data-bs-toggle="tooltip" title="Hapus" class="btn btn-outline-danger d-flex justify-content-center align-items-center mx-1">
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