<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - HRIA</title>
    <style>
        body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #f7f1e8 0%, #efe0cc 100%); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: #fffaf2; padding: 40px; border-radius: 22px; box-shadow: 0 18px 50px rgba(72, 45, 17, 0.12); width: 100%; max-width: 450px; border: 1px solid #e4d6c4; }
        h2 { text-align: center; color: #23180e; margin-top: 0; margin-bottom: 24px; }
        .field { margin-bottom: 20px; display: flex; flex-direction: column; gap: 8px; }
        label { font-weight: 700; font-size: 14px; color: #2d2418; }
        input { width: 100%; padding: 12px; border: 1px solid #e4d6c4; border-radius: 12px; font-size: 15px; outline: none; box-sizing: border-box; }
        input:focus { border-color: #b7791f; box-shadow: 0 0 0 4px rgba(183, 121, 31, 0.12); }
        button { width: 100%; padding: 14px; background: #7a4f22; color: white; border: none; border-radius: 99px; font-weight: bold; font-size: 16px; cursor: pointer; box-shadow: 0 10px 25px rgba(122, 79, 34, 0.25); margin-top: 10px; }
        button:hover { background: #5f3b17; }
        .error-list { background: #fef3f2; color: #b42318; padding: 15px; border-radius: 12px; border: 1px solid #fecdca; margin-bottom: 20px; font-size: 13px; }
        .error-list ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Change Password</h2>
        
        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/admin/change-password">
            @csrf
            <div class="field">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" required autofocus>
            </div>
            
            <div class="field">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>

            <div class="field">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>

            <button type="submit">Update Password</button>
        </form>
        
        <div style="text-align: center; margin-top: 24px;">
            <a href="/admin/report" style="color: #667085; text-decoration: none; font-size: 14px;">&larr; Cancel and return to Dashboard</a>
        </div>
    </div>

</body>
</html>