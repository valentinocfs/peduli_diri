
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Peduli Diri</title>
    <link rel="stylesheet" href="{{ asset('') }}dist/assets//css/bootstrap.css">

    <link rel="shortcut icon" href="{{ asset('') }}dist/assets//images/peduli-diri.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('') }}dist/assets//css/app.css">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-lg-4 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <h1>PEDULI DIRI</h1>
                                <p>Silahkan login terlebih dahulu.</p>
                            </div>
                            <form action="/formLogin" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group position-relative has-icon-left">
                                    <label for="">Nama</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="" name="name" value="{{ old('name') }}" required>
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="">Nomor Induk Kependudukan ( NIK )</label>
                                    </div>
                                    <div class="position-relative">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="" name="email" value="{{ old('email') }}" required>
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                @if (Session::has('fail'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertCreatePerjalanan">
                                    <strong>{{ Session::get('fail') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                <div class='form-check clearfix my-4'>
                                    <div class="float-end">
                                        <a href="/register">Belum punya akun?</a>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Masuk</button>
                                </div>
                            </form>
                            {{-- <div class="divider">
                                <div class="divider-text"></div>
                            </div> --}}
                            {{-- 
                            <div class="row">
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i>
                                        Facebook</button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i>
                                        Github</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
    <script src="{{ asset('') }}dist/assets//js/feather-icons/feather.min.js"></script>
    <script src="{{ asset('') }}dist/assets//js/app.js"></script>

    <script src="{{ asset('') }}dist/assets//js/main.js"></script>
</body>

</html>