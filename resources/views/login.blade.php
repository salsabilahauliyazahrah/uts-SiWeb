<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Kasih Collection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login-regis.css') }}">
    <script src="{{ asset('js/login.js') }}" defer></script>
</head>
<body>

<!-- LEFT: Visual -->
<div class="auth-visual">
    <div class="visual-brand">
        <span class="logo-script">UTS</span>
        <span class="logo-sans">Warehouse Admin</span>
    </div>    
</div>

<!-- RIGHT: Form -->
<div class="auth-panel">
    <div class="auth-card">

        <h1 class="auth-title">Selamat datang</h1>        
        <div class="auth-divider"></div>

        @if(session('error'))
            <div class="auth-alert">{{ session('error') }}</div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <div class="field-group">
                <label class="field-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="field-input"
                       placeholder="nama@email.com" required autocomplete="email">
            </div>

            <div class="field-group">
                <label class="field-label" for="password">Password</label>
                <div class="password-wrap">
                    <input type="password" id="password" name="password" class="field-input"
                           placeholder="••••••••" required>
                    <button type="button" class="toggle-eye" onclick="togglePassword('password', this)">👁</button>
                </div>
            </div>

            <button type="submit" class="btn-auth">Masuk</button>
        </form>

    </div>
</div>

</body>
</html>
