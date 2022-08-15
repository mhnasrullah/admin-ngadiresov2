@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4 class="mb-4">Dashboard</h4>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="mt-2">Gambar Jumbotron</h5>
        </div>
        <img src="{{$data['jumbotron']}}" class="card-img-top img-dashboard">
        <div class="card-body">
            <form action="/editable/jumbotron" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control" name="foto" required>
                @if (session()->has('error'))
                      @if (isset(session('error')['error']['foto']))
                          @foreach (session('error')['error']['foto'] as $e)
                              <p class="text-danger mb-0">{{$e}}</p>
                          @endforeach
                      @endif
                  @endif
                <button type="submit" class="btn btn-primary w-100 mt-2">Ubah</button>
            </form>
        </div>
    </div>
</main>

@include('temp.footer')