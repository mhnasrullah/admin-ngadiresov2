@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4>Data Wisata</h4>
    <a href="/wisata/create" class="btn btn-primary d-flex align-items-center btn-add my-4"><span class="me-2 material-symbols-outlined">
        add
        </span>Tambah</a>

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
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Slug</th>
                <th scope="col">Waktu</th>
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
                <td>{{$d['alamat']}}</td>
                <td>{{$d['slug']}}</td>
                <td>{{$d['waktu']}}</td>
                <td class="d-flex">
                    <a data-bs-toggle="tooltip" title="Edit" href="/wisata/edit/{{$d['id']}}" class="btn btn-outline-success d-flex justify-content-center align-items-center mx-1">
                        <span class="material-symbols-outlined">
                            edit
                            </span>
                    </a>
                    <a href="/wisata/delete/{{$d['id']}}" data-bs-toggle="tooltip" title="Hapus" class="btn btn-outline-danger d-flex justify-content-center align-items-center mx-1">
                        <span class="material-symbols-outlined">
                            delete
                            </span>
                    </a>
                    <a href="/wisata/{{$d['id']}}/gambar" data-bs-toggle="tooltip" title="Gambar" class="btn btn-outline-success d-flex justify-content-center align-items-center mx-1">
                        <span class="material-symbols-outlined">
                            photo
                            </span>
                    </a>
                    <a href="/wisata/{{$d['id']}}/faq" data-bs-toggle="tooltip" title="Faq" class="btn btn-outline-warning d-flex justify-content-center align-items-center mx-1">
                        <span class="material-symbols-outlined">
                            help
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