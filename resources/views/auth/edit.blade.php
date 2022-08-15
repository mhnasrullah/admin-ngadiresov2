@include('temp.header')
<main class="w-100 py-5 py-lg-5 px-4">
    <h4>Pengaturan Akun</h4>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('notCorrect'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('notCorrect')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="card mt-4">
        <div class="card-body">
            <form action="/akun/updatemail" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required name="email" placeholder="email Berita" value="{{$data['email']}}">
                    @if (session()->has('error'))
                        @if (isset(session('error')['error']['email']))
                            @foreach (session('error')['error']['email'] as $e)
                                <p class="text-danger mb-0">{{$e}}</p>
                            @endforeach
                        @endif
                    @endif
                    <div style="font-size: 12px;" class="mt-3">Harap masukan password sebelum mengganti email</div>
                    <input type="password" class="form-control" name="password" placeholder="masukan password">
                    @if (session()->has('error'))
                        @if (isset(session('error')['error']['password']))
                            @foreach (session('error')['error']['password'] as $e)
                                <p class="text-danger mb-0">{{$e}}</p>
                            @endforeach
                        @endif
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Ubah email</button>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <form action="/akun/updatepass" method="post">
                @csrf
                <div class="mb-3">
                    <label for="newpass" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" required id="newpass" name="newpassword" placeholder="password baru..">
                    @if (session()->has('error'))
                        @if (isset(session('error')['error']['newpassword']))
                            @foreach (session('error')['error']['newpassword'] as $e)
                                <p class="text-danger mb-0">{{$e}}</p>
                            @endforeach
                        @endif
                    @endif
                </div>
                <div class="mb-3">
                    <label for="repass" class="form-label">Ulangi Password</label>
                    <input type="password" class="form-control" required id="repass" name="repassword" placeholder="ulangi password baru..">
                    @if (session()->has('error'))
                        @if (isset(session('error')['error']['repassword']))
                            @foreach (session('error')['error']['repassword'] as $e)
                                <p class="text-danger mb-0">{{$e}}</p>
                            @endforeach
                        @endif
                    @endif
                </div>
                <div class="mb-3">
                    <label for="lastpass" class="form-label">Password sebelumnya</label>
                    <input type="password" class="form-control" required id="lastpass" name="lastpassword" placeholder="password sebelumnya">
                    @if (session()->has('error'))
                        @if (isset(session('error')['error']['lastpassword']))
                            @foreach (session('error')['error']['lastpassword'] as $e)
                                <p class="text-danger mb-0">{{$e}}</p>
                            @endforeach
                        @endif
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Ubah Password</button>
            </form>
        </div>
    </div>

</main>
@include('temp.footer')