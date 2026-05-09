<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - HRIA</title>
    <style>
        body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #f7f1e8 0%, #efe0cc 100%); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: #fffaf2; padding: 40px; border-radius: 22px; box-shadow: 0 18px 50px rgba(72, 45, 17, 0.12); width: 100%; max-width: 400px; border: 1px solid #e4d6c4; }
        h2 { text-align: center; color: #23180e; margin-top: 0; }
        .field { margin-bottom: 20px; display: flex; flex-direction: column; gap: 8px; }
        label { font-weight: 700; font-size: 14px; color: #2d2418; }
        input { width: 100%; padding: 12px; border: 1px solid #e4d6c4; border-radius: 12px; font-size: 15px; outline: none; box-sizing: border-box; }
        input:focus { border-color: #b7791f; box-shadow: 0 0 0 4px rgba(183, 121, 31, 0.12); }
        button { width: 100%; padding: 14px; background: #7a4f22; color: white; border: none; border-radius: 99px; font-weight: bold; font-size: 16px; cursor: pointer; box-shadow: 0 10px 25px rgba(122, 79, 34, 0.25); }
        button:hover { background: #5f3b17; }
        .error { color: #b42318; font-size: 13px; font-weight: bold; text-align: center; margin-bottom: 20px; background: #fef3f2; padding: 10px; border-radius: 8px; border: 1px solid #fecdca; }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Admin Portal</h2>
        
        @if ($errors->any())
            <div class="error">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="field">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Secure Login</button>
        </form>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="/" style="color: #667085; text-decoration: none; font-size: 14px;">&larr; Back to Public Form</a>
        </div>
    </div>

</body>
</html>