<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Little Lantern - Login / Register</title>
  <style>
    body {
      background: url('8e92513a-8a37-48a8-ae7c-9b570f7c23d4.png') no-repeat center center fixed;
      background-size: cover;
      font-family: sans-serif;
      text-align: center;
      padding-top: 40px;
    }

    form {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      display: inline-block;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <h2>Login</h2>
  <form method="POST" action="login.php">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
  </form>

  <hr style="margin: 40px 0;">

  <h2>Register</h2>
  <form method="POST" action="register.php">
    <input type="text" name="name" placeholder="Full Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Register</button>
  </form>
</body>
</html>
