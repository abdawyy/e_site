<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Sign In | E-Site</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;400&display=swap" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f4f6fb;
      font-family: 'Montserrat', sans-serif;
    }

    .login-container {
      background: #fff;
      padding: 2.5rem 2rem;
      border-radius: 12px;
      box-shadow: 0 2px 16px rgba(79,140,255,0.08);
      max-width: 400px;
      width: 100%;
      text-align: center;
    }

    .login-container h1 {
      color: #4f8cff;
      margin-bottom: 1.5rem;
      font-size: 2rem;
    }

    .login-container form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .login-container input {
      padding: 0.8rem;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 1rem;
    }

    .login-container button {
      background: #4f8cff;
      color: #fff;
      border: none;
      padding: 0.8rem;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      margin-top: 0.5rem;
    }

    .login-error {
      color: #ff6f91;
      margin-top: 1rem;
      font-size: 0.95rem;
      background-color: #fff0f3;
      padding: 10px;
      border-radius: 6px;
    }

    a {
      color: #4f8cff;
      text-decoration: none;
      font-weight: 500;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Admin Sign In</h1>

    @if (session('error'))
      <div class="login-error">{{ session('error') }}</div>
    @endif

    <form id="loginForm" method="POST" action="{{ route('admin.login') }}">
      @csrf
      <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Sign In</button>
    </form>
  </div>
</body>
</html>
