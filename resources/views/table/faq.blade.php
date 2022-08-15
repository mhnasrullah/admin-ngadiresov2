@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4>Data Faq Desa</h4>

    <div class="card mt-4 mb-3">
        <div class="card-body">
            <h5 class="mb-4">Tambah Faq</h5>
            <form action="/faq/store" method="post">
                @csrf
                <div class="mb-3">
                    <label for="tanya" class="form-label">Pertanyaan</label>
                    <input type="text" class="form-control" id="tanya" name="tanya" required placeholder="Berapa jarak desa dengan kota malang?" value="{{session('error') == null ? '' : session('error')['oldtanya']}}">
                    @if (session()->has('error'))
                  @if (isset(session('error')['error']['tanya']))
                      @foreach (session('error')['error']['tanya'] as $e)
                          <p class="text-danger mb-0">{{$e}}</p>
                      @endforeach
                  @endif
              @endif
                </div>
                <div class="mb-3">
                    <label for="jawab" class="form-label">Jawaban</label>
                    <input type="text" class="form-control" id="jawab" name="jawab" required placeholder="Kurang lebih 23Km di sebelah timur Kota Malang" value="{{session('error') == null ? '' : session('error')['oldjawab']}}">
                    @if (session()->has('error'))
                  @if (isset(session('error')['error']['jawab']))
                      @foreach (session('error')['error']['jawab'] as $e)
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
                <td>{{$d['quest']}}</td>
                <td>{{$d['ans']}}</td>
                <td class="d-flex">
                    <a href="faq/{{$d['id']}}/delete" data-bs-toggle="tooltip" title="Hapus" class="btn btn-outline-danger d-flex justify-content-center align-items-center mx-1">
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