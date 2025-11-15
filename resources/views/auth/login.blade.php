<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Silakan Masuk | Panti Asuhan Jembatan Jalan Suci</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

    <div class="login-container">
        <div class="login-left">
            <div class="login-form">
                <a href="{{ route('pages.home') }}">
                    <img src="{{ asset('images/other/logo.jpeg') }}" width="100" alt="">
                </a>
                <h2>Syalom,<br>Selamat Datang</h2>
                <p>Silakan masuk untuk mendapatkan akses</p>

                <div class="mb-4">
                    <x-alert />
                </div>

                <form method="POST" action="{{ route('login.handle') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                            placeholder="Masukkan akun anda">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Masukkan sandi anda">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn-login btn btn-primary">Masuk</button>

                    <div class="text-center mt-4">
                        <small class="text-secondary">Copyright &copy; {{ date('Y') }} Panti Asuhan Jembatan Jalan
                            Suci.</small>
                    </div>
                </form>
            </div>
        </div>

        <div class="login-right">
            <img src="{{ asset('images/jjs-login.jpeg') }}" class="object-fit-cover w-100 h-100" alt="">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
