<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | Education Site</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/adminlte.css') }}">
</head>
<body class="hold-transition login-page" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
<div class="login-box">
    <!-- Logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <div class="login-logo">
                <img src="{{ asset('admin_assets/assets/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image" style="opacity: .8; width: 50px; height: 50px;">
            </div>
            <h1><b>Admin</b> Panel</h1>
            <p class="text-muted">Education Site Management</p>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <h5><i class="icon bi bi-ban"></i> Alert!</h5>
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                    <div class="input-group-text">
                        <span class="bi bi-envelope"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-text">
                        <span class="bi bi-lock"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </div>
                </div>
            </form>

            {{-- <div class="social-auth-links text-center mt-2 mb-3">
                <p class="text-muted">- OR -</p>
                <p class="text-sm text-muted">Default credentials: admin@admin.com / password</p>
            </div> --}}
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_assets/js/adminlte.js') }}"></script>
</body>
</html>