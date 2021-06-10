@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#">AMS - SMAN 1 CIKEMBAR</a> <br>
        <h6>Sopyan Maulana</h6>

    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Log In</p>
            @if (session('error'))
                <p class="text-danger text-center">
                    {{ session('error') }}
                </p>
            @endif
            {{-- @yield('content') --}}
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror " placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password') }}" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{-- <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p> --}}
            <div class="callout callout-info mt-3 small">
                <h6>Admin</h6>
                <span>username : admin@admin.com</span><br>
                <span>password : password</span><br><br>
                <h6>Guru</h6>
                <span>username : user1@example.com</span><br>
                <span>password : password</span>
                <h6>Siswa</h6>
                <span>username : user2@example.com</span><br>
                <span>password : password</span>
            </div>
        </div>
        <!-- /.login-card-body -->
        
    </div>
    <div class="d-flex justify-content-center">
        <!-- <a href="https://github.com/hibatulwafi" target="blank" class="mx-2 btn btn-default" title="github.com/isengoding">
            <i class="fab fa-github"></i>
            <span>Github</span>
        </a> -->
           @php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
$date = strftime( "%A, %d %B %Y %H:%M", time());
echo "Saat ini: ".$date;
        @endphp
    </div>
</div>
<!-- /.login-box -->
@endsection
