<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="icon" type="image/png" href="img/icon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #a8aaa3, #ffffff, #a8aaa3);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: #fff;
      padding: 30px;
      width: 100%;
      max-width: 400px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .login-box img {
      width: 100px;
      margin-bottom: 20px;
      border-radius: 50px;
    }

    .login-box h2 {
      margin-bottom: 25px;
      font-size: 24px;
      color: #0B487EFF;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      padding: 10px 40px;
      border: 1px solid #0B487EFF;
      border-radius: 5px;
      font-size: 14px;
      outline: none;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      color: #0B487EFF;
    }

    .input-group .fa-user,
    .input-group .fa-lock {
      left: 10px;
    }

    .input-group .toggle-password {
      right: 10px;
      cursor: pointer;
      display: none;
    }

    /* Style សម្រាប់ប៊ូតុង Login */
    .btn-login {
      width: 100%;
      padding: 10px;
      background: #083A66FF;
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 5px;
      font-size: 16px;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    /* Hover effect */
    .btn-login:hover {
      background: #062C4DFF;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    /* Click effect (Active state) */
    .btn-login:active {
      transform: translateY(0);
      box-shadow: none;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <img src="imgs/boy.png" alt="Logo" />
    <form action="{{ url('/login-submit') }}" method="POST">
      @csrf
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="name" placeholder="Username" required />
      </div>

      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="password" placeholder="Password" required oninput="toggleIcon()" />
        <i class="fas fa-eye toggle-password" id="togglePassword" onclick="togglePassword()"></i>
      </div>

      <input type="submit" value="Login" class="btn-login" />
    </form>
  </div>

  <script>
    const passwordField = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePassword');

    function togglePassword() {
      const isPassword = passwordField.type === 'password';
      passwordField.type = isPassword ? 'text' : 'password';
      toggleIcon.classList.toggle('fa-eye');
      toggleIcon.classList.toggle('fa-eye-slash');
    }

    function toggleIcon() {
      if (passwordField.value.length > 0) {
        toggleIcon.style.display = 'block';
      } else {
        toggleIcon.style.display = 'none';
        passwordField.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
      }
    }
  </script>
</body>
</html>