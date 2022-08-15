
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="/style/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">

    <title>Admin Website Desa Ngadireso</title>
  </head>
  <body>
    <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center mt-5">
        <div class="card register">
            <div class="card-body d-flex justify-content-center flex-column">
                <img src="/img/logo.png" class="mx-auto" width="100px" height="100px" alt="">
                <h5 class="text-center text-primary mb-4">Masuk Admin</h5>
                @if (session()->has('notCorrect'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('notCorrect')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/log" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="admin@..." required>
                        @if (session()->has('error'))
                        @if (isset(session('error')['error']['email']))
                            @foreach (session('error')['error']['email'] as $e)
                                <p class="text-danger mb-0">{{$e}}</p>
                            @endforeach
                        @endif
                    @endif
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                        <input class="form-control" type="password" id="exampleFormControlTextarea1" name="password" placeholder="password..." required>
                        @if (session()->has('error'))
                        @if (isset(session('error')['error']['password']))
                            @foreach (session('error')['error']['password'] as $e)
                                <p class="text-danger mb-0">{{$e}}</p>
                            @endforeach
                        @endif
                    @endif
                      </div>
                    <button type="submit" class="btn btn-success">Masuk</button>
                </form>
            </div>
        </div>

@include('temp.footer')