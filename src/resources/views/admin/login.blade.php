<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin Login — Montagna Servizi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
    <style>
        .ms-login-wrap {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--ms-green-dark);
        }
        .ms-login-box {
            background: var(--ms-white);
            border-radius: var(--ms-radius);
            box-shadow: 0 16px 48px rgba(0,0,0,.25);
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
        }
        .ms-login-logo {
            font-family: var(--ms-font-heading);
            font-weight: 700;
            font-size: 1.125rem;
            color: var(--ms-green-dark);
            margin-bottom: .25rem;
        }
        .ms-login-sub { font-size: .875rem; color: var(--ms-muted); margin-bottom: 2rem; }
        .ms-field-error { font-size: .8125rem; color: #dc2626; margin-top: .375rem; }
    </style>
</head>
<body class="ms-admin-body">
<div class="ms-login-wrap">
    <div class="ms-login-box">
        <p class="ms-login-logo">Montagna Servizi</p>
        <p class="ms-login-sub">Accedi al pannello di amministrazione</p>

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="ms-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}" required autofocus autocomplete="email">
                @error('email')
                    <p class="ms-field-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="ms-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password">
            </div>
            <div style="margin-bottom:1.25rem;">
                <label style="display:flex;align-items:center;gap:.5rem;font-size:.875rem;cursor:pointer;">
                    <input type="checkbox" name="remember"> Ricordami
                </label>
            </div>
            <button type="submit" class="ms-btn ms-btn--primary" style="width:100%;justify-content:center;">
                Accedi
            </button>
        </form>
    </div>
</div>
</body>
</html>
