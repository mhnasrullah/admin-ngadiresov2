@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4 class="mb-4">Dashboard</h4>
    
    
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            @if (isset(session('error')['error']['foto']))
            @foreach (session('error')['error']['foto'] as $e)
                    {{$e}}
                @endforeach
                @endif
                @if (isset(session('error')['error']['text']))
                @foreach (session('error')['error']['text'] as $e)
                {{$e}}
                @endforeach
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <hr class="mt-5">
    <h4 class="mb-4 text-primary">Edit Halaman Utama</h4>
    <div class="grid">
        <div class="card jmbt">
            <div class="card-header">
                <h5 class="mt-2">Gambar Jumbotron</h5>
            </div>
            <img src="{{$data['jumbotron']}}" class="card-img-top img-dashboard">
            <div class="card-body">
                <form action="/editable/jumbotron" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="foto" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        <div class="card tendes">
            <div class="card-header">
                <h5 class="mt-2">Tentang Desa</h5>
            </div>
            <div class="card-body">
                <form action="/editable/tentangDesa" method="post">
                    @csrf
                    <textarea name="text" id="sntentangdesa" required>{{$data['tentangDesa']}}</textarea>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        <div class="card imgtendes">
            <div class="card-header">
                <h5 class="mt-2">Gambar Tentang Desa</h5>
            </div>
            <img src="{{$data['imgTentangDesa']}}" class="card-img-top img-dashboard">
            <div class="card-body">
                <form action="/editable/imgTentangDesa" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="foto" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        <div class="card imgkades">
            <div class="card-header">
                <h5 class="mt-2">Foto Kades</h5>
            </div>
            <img src="{{$data['imgKades']}}" class="card-img-top img-dashboard">
            <div class="card-body">
                <form action="/editable/imgKades" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="foto" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        <div class="infokades">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">Sambutan Kades</h5>
                </div>
                <div class="card-body">
                    <form action="/editable/sambKades" method="post">
                        @csrf
                        <textarea name="text" id="snsambutankades" required>{{$data['sambutanKades']}}</textarea>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="mt-2">Nama Kades</h5>
                </div>
                <div class="card-body">
                    <form action="/editable/namaKades" method="post">
                        @csrf
                        <input name="text" class="form-control" id="snsambutankades" value="{{$data['namaKades']}}" required>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-wrap flex-lg-nowrap gap-3">
        <div class="card mt-3 w-100">
            <div class="card-header">
                <h5 class="mt-2">Jumlah Pria</h5>
            </div>
            <div class="card-body">
                <form action="/editable/jmlPria" method="post">
                    @csrf
                    <input name="text" type="number" class="form-control" value="{{$data['jmlPria']}}" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        <div class="card mt-3 w-100">
            <div class="card-header">
                <h5 class="mt-2">Jumlah Wanita</h5>
            </div>
            <div class="card-body">
                <form action="/editable/jmlWanita" method="post">
                    @csrf
                    <input type="number" name="text" class="form-control" value="{{$data['jmlWanita']}}" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        
    </div>
    <div class="card mt-3 w-100">
        <div class="card-header">
            <h5 class="mt-2">Jumlah Penduduk</h5>
        </div>
        <div class="card-body">
            <input name="number" class="form-control" value="{{$data['jmlPenduduk']}}" disabled>
        </div>
    </div>

    <hr class="mt-5">
    <h4 class="mb-4 text-primary">Edit Halaman Sejarah</h4>
    <div>
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mt-2">Background Sejarah</h5>
            </div>
            <img src="{{$data['jmbtSejarah']}}" class="card-img-top img-dashboard">
            <div class="card-body">
                <form action="/editable/jmbtSejarah" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="foto" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        <div class="card mt-3 w-100">
            <div class="card-header">
                <h5 class="mt-2">Text Background Sejarah</h5>
            </div>
            <div class="card-body">
                <form action="/editable/textSejarah" method="post">
                    @csrf
                    <input type="text" name="text" class="form-control" value="{{$data['textSejarah']}}" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h5 class="mt-2">Sejarah Desa</h5>
        </div>
        <div class="card-body">
            <form action="/editable/textSeDesa" method="post">
                @csrf
                <textarea name="text" id="snsedesa" required>{{$data['sejarahDesa']}}</textarea>
                <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <h5 class="mt-2">Sejarah Tirta</h5>
        </div>
        <div class="card-body">
            <form action="/editable/textSeTirta" method="post">
                @csrf
                <textarea name="text" id="snsetirta" required>{{$data['sejarahTirta']}}</textarea>
                <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
            </form>
        </div>
    </div>


    <hr class="mt-5">
    <h4 class="mb-4 text-primary">Edit Halaman Kabar</h4>
    <div>
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mt-2">Background Kabar</h5>
            </div>
            <img src="{{$data['jmbtKabar']}}" class="card-img-top img-dashboard">
            <div class="card-body">
                <form action="/editable/jmbtKabar" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="foto" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        <div class="card mt-3 w-100">
            <div class="card-header">
                <h5 class="mt-2">Text Background Kabar</h5>
            </div>
            <div class="card-body">
                <form action="/editable/textKabar" method="post">
                    @csrf
                    <input type="text" name="text" class="form-control" value="{{$data['textKabar']}}" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
    </div>


    <hr class="mt-5">
    <h4 class="mb-4 text-primary">Edit Halaman Faq</h4>
    <div>
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mt-2">Background Faq</h5>
            </div>
            <img src="{{$data['jmbtFaq']}}" class="card-img-top img-dashboard">
            <div class="card-body">
                <form action="/editable/jmbtFaq" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="foto" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        <div class="card mt-3 w-100">
            <div class="card-header">
                <h5 class="mt-2">Text Background Faq</h5>
            </div>
            <div class="card-body">
                <form action="/editable/textFaq" method="post">
                    @csrf
                    <input type="text" name="text" class="form-control" value="{{$data['textFaq']}}" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
    </div>


    <hr class="mt-5">
    <h4 class="mb-4 text-primary">Edit Halaman Wisata</h4>
    <div>
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mt-2">Background Wisata</h5>
            </div>
            <img src="{{$data['jmbtWisata']}}" class="card-img-top img-dashboard">
            <div class="card-body">
                <form action="/editable/jmbtWisata" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="foto" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        <div class="card mt-3 w-100">
            <div class="card-header">
                <h5 class="mt-2">Text Background Wisata</h5>
            </div>
            <div class="card-body">
                <form action="/editable/textWisata" method="post">
                    @csrf
                    <input type="text" name="text" class="form-control" value="{{$data['textWisata']}}" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    
    <hr class="mt-5">
    <h4 class="mb-4 text-primary">Edit Halaman Surat</h4>
    
    <div>
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mt-2">Background Surat</h5>
            </div>
            <img src="{{$data['jmbtSurat']}}" class="card-img-top img-dashboard">
            <div class="card-body">
                <form action="/editable/jmbtSurat" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="foto" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
        <div class="card mt-3 w-100">
            <div class="card-header">
                <h5 class="mt-2">Text Background Surat</h5>
            </div>
            <div class="card-body">
                <form action="/editable/textSurat" method="post">
                    @csrf
                    <input type="text" name="text" class="form-control" value="{{$data['textSurat']}}" required>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
                </form>
            </div>
        </div>
    </div>

</main>

@include('temp.footer')