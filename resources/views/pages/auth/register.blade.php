<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Peduli Diri</title>
    <link rel="stylesheet" href="{{ asset('') }}dist/assets/css/bootstrap.css">

    <link rel="shortcut icon" href="{{ asset('') }}dist/assets/images/peduli-diri.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('') }}dist/assets/css/app.css">
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
                                <p>Silahkan melakukan register.</p>
                            </div>
                            <form action="/formRegister" method="POST">
                                 @csrf

                                <div class="">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" id="" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                                    name="name">
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Nomor Induk Kependudukan ( NIK )</label>
                                                <input type="text" id="" class="form-control @error('nik') is-invalid @enderror"
                                                    name="nik" value="{{ old("nik") }}" required>
                                                @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertCreatePerjalanan">
                                    <strong>{{ Session::get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                <a href="/">Sudah punya akun? Login</a>
                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Daftar</button>
                                </div>
                            </form>
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
