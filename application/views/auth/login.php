<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #99cdd8, #daebe3, #fde8d3);
      background-size: 300% 300%;
      animation: gradientMove 10s ease infinite;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .login-container {
      background: #ffffffea;
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      display: flex;
      overflow: hidden;
      width: 820px;
      max-width: 100%;
      animation: floatCard 2s ease-in-out infinite alternate;
      position: relative;
      z-index: 1;
    }

    @keyframes floatCard {
      from { transform: translateY(-10px); }
      to   { transform: translateY(10px); }
    }

    .login-left {
      flex: 1;
      background: linear-gradient(180deg, #fde8d3, #f3c3b2, #cfd6c4);
      padding: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      flex-direction: column;
    }

    .login-left h1 {
      color: #657166;
      font-size: 26px;
      font-weight: 600;
      line-height: 1.5;
      margin: 0;
      max-width: 300px;
    }

    .login-right {
      flex: 1;
      padding: 40px 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .login-right h2 {
      margin-bottom: 25px;
      color: #657166;
      font-weight: 600;
      font-size: 24px;
      text-align: center;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #cfd6c4;
      border-radius: 8px;
      background: #f9fafb;
      font-size: 14px;
      color: #333;
    }

    .input-group input:focus {
      outline: none;
      border-color: #99cdd8;
      background: #ffffff;
      box-shadow: 0 0 0 2px rgba(153, 205, 216, 0.3);
    }

    .btn {
      width: 100%;
      padding: 12px;
      background: linear-gradient(90deg, #f3c3b2, #99cdd8);
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 14px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn:hover {
      background: linear-gradient(90deg, #99cdd8, #f3c3b2);
    }

    .bottom-links {
      font-size: 12px;
      text-align: center;
      margin-top: 12px;
      color: #657166;
    }

    .bottom-links a {
      color: #657166;
      text-decoration: none;
    }

    .bottom-links a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .login-container {
        flex-direction: column;
        width: 90%;
        animation: none;
        transform: none;
      }

      .login-left, .login-right {
        padding: 30px 20px;
      }
    }

    /* Bubble Effect */
    .bubbles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .bubbles li {
      position: absolute;
      display: block;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
      bottom: -100px;
      animation: float 15s linear infinite;
      filter: blur(2px);
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
    }

    @keyframes float {
      0%   { transform: translateY(0) scale(1); opacity: 0.2; }
      50%  { opacity: 0.5; }
      100% { transform: translateY(-1200px) scale(1.2); opacity: 0; }
    }

    .bubbles li:nth-child(1) { left: 10%; width: 60px; height: 60px; animation-delay: 0s; }
    .bubbles li:nth-child(2) { left: 20%; width: 30px; height: 30px; animation-delay: 2s; animation-duration: 18s; }
    .bubbles li:nth-child(3) { left: 35%; width: 80px; height: 80px; animation-delay: 4s; }
    .bubbles li:nth-child(4) { left: 50%; width: 20px; height: 20px; animation-delay: 1s; animation-duration: 12s; }
    .bubbles li:nth-child(5) { left: 65%; width: 50px; height: 50px; animation-delay: 3s; animation-duration: 20s; }
    .bubbles li:nth-child(6) { left: 80%; width: 25px; height: 25px; animation-delay: 5s; animation-duration: 16s; }
    .bubbles li:nth-child(7) { left: 90%; width: 70px; height: 70px; animation-delay: 0.5s; animation-duration: 25s; }
    .bubbles li:nth-child(8) { left: 75%; width: 40px; height: 40px; animation-delay: 2.5s; animation-duration: 22s; }
  </style>
</head>
<body>

  <ul class="bubbles">
    <li></li><li></li><li></li><li></li>
    <li></li><li></li><li></li><li></li>
  </ul>

  <div class="login-container">
    <div class="login-left">
      <h1>Hai Mahasiswa!<br>Yuk, masuk dan lengkapi data dirimu!</h1>
    </div>

    <div class="login-right">
      <h2>Login</h2>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
          <?= $this->session->flashdata('error') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('auth/login_proses') ?>" method="post">
        <div class="input-group">
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn">LOGIN</button>
      </form>

      <div class="bottom-links">
        <p><a href="#">Forgot Password?</a></p>
      </div>
      <div class="bottom-links">
        <p>Belum punya akun? <a href="<?= base_url('auth/register') ?>">Buat akun</a></p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
