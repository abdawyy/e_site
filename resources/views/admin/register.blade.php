<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Register</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f5f5f5;
      font-family: Arial, sans-serif;
    }

    .login-container {
      background: #fff;
      padding: 30px 40px;
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      box-sizing: border-box;
      text-align: center;
    }

    .login-container input,
    .login-container button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      box-sizing: border-box;
    }
    .login-container button {
      background: #4f8cff;
      color: white;
      border: 0px
    }

    .login-error,
    .success-message {
      margin-bottom: 15px;
      color: #d8000c;
      background-color: #ffd2d2;
      padding: 10px;
      border-radius: 4px;
    }

    .success-message {
      color: #4F8A10;
      background-color: #DFF2BF;
    }

    a {
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
      .login-container h1 {
      color: #4f8cff;
      margin-bottom: 1.5rem;
      font-size: 2rem;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h1>Admin Register</h1>

    @if ($errors->any())
      <div class="login-error">
        <ul style="list-style: none; padding: 0;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (session('success'))
      <div class="success-message">{{ session('success') }}</div>
    @endif

    <form id="loginForm" method="POST" action="{{ route('admin.register') }}">
      @csrf
      <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
      <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
      <button type="submit" class="btn btn-success">Register</button>
    </form>

    <p>Already have an account? <a href="{{ route('admin.login') }}">Login here</a></p>
  </div>

</body>
</html>
