<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background-color: #00e1c8;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background-color: #00e1c8;
            border-radius: 20px;
            padding: 40px;
            width: 400px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .input-group {
    display: flex;
    align-items: center;
    background-color: #002d72;
    border-radius: 15px;
    margin: 15px 0;
    padding: 10px;
    gap: 10px; /* Tambahan */
}
        .input-group input {
    border: none;
    background: none;
    color: white;
    flex: 1;
    padding-left: 10px;
    outline: none;
    font-size: 14px; /* Tambahan ini biar lebih seimbang */
}
.btn-login {
    width: 100%;
    background: white;
    color: #002d72;
    padding: 15px;
    border-radius: 15px;
    font-weight: bold;
    font-size: 14px; /* Tambahan */
    border: none;
    cursor: pointer;
}
        .btn-login:hover {
            background: #f2f2f2;
        }
        .footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }
        .footer img {
            height: 40px;
        }
        .forgot {
            text-align: right;
            font-size: 0.9em;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-box">
            <div class="input-group">
                <span>👤</span>
                <input type="text" name="email" placeholder="Email" required autofocus>
            </div>

            <div class="input-group">
                <span>🔒</span>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button class="btn-login" type="submit">MASUK</button>

            <div class="forgot">
                <a href="{{ route('password.request') }}">Lupa Password?</a>
            </div>

            <hr style="margin: 20px 0;">

            <div class="footer">
                <img src="{{ asset('img/appstore.png') }}" alt="App Store">
                <img src="{{ asset('img/googleplay.png') }}" alt="Google Play">
            </div>
        </div>
    </form>
</body>
</html>
