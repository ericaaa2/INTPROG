<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>QWERTY Quest! — Log In / Sign Up</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html, body { 
      height: 100%; 
      font-family: 'Montserrat', Arial, Helvetica, sans-serif; 
      background: url('bg.jpg') no-repeat center center fixed; 
      background-size: cover; 
      color: #222; 
    }
    body { display: flex; flex-direction: column; min-height: 100vh; }

    header {
      background: #1261a0;
      color: #fff;
      width: 100%;
      padding: 20px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header .title { font-size: 1.6em; font-weight: 700; }
    .header-buttons a {
      background: #fff;
      color: #1261a0;
      padding: 8px 12px;
      border-radius: 6px;
      text-decoration: none;
      margin-left: 8px;
      font-weight: 700;
      transition: 0.2s;
    }
    .header-buttons a.active { background: #0f4e88; color: #fff; }
    .header-buttons a:hover { background: #e6f0ff; }

    main {
      flex: 1;
      max-width: 500px;
      width: 90%;
      margin: 40px auto;
      padding: 20px;
      background: rgba(255,255,255,0.95);
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    h2, h3 { text-align: center; color: #1261a0; margin-bottom: 15px; }

    input { width: 100%; padding: 10px; margin: 6px 0; border-radius: 6px; border: 1px solid #ccc; font-size: 1rem; }
    button { width: 100%; padding: 10px; background: #1261a0; color: #fff; border: none; border-radius: 6px; cursor: pointer; font-weight: 700; margin-top: 10px; }
    button:hover { background: #0f4e88; }

    footer {
      width: 100%;
      background: #1261a0;
      color: #fff;
      text-align: center;
      padding: 16px;
      margin-top: auto;
      font-weight: 700;
    }

    form + form { margin-top: 25px; }
    .message { text-align: center; margin-bottom: 15px; color: red; font-weight: 700; }
  </style>
</head>
<body>
<header>
  <div class="title">QWERTY Quest!</div>
  <div class="header-buttons">
    <a class="btn" href="index.php">Home</a>
    <a class="btn active" href="login.php">Log In / Sign Up</a>
    <a class="btn" href="profile.php">Profile</a>
    <a class="btn" href="about.php">About Us</a>
  </div>
</header>

<main>
  <h2>Log In</h2>
  <?php
    if(isset($_GET['msg'])) {
        echo "<div class='message'>" . htmlspecialchars($_GET['msg']) . "</div>";
    }
  ?>
  <form method="post" action="login_action.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Log In</button>
  </form>

  <h3>Don't have an account? Sign Up</h3>
  <form method="post" action="signup_action.php">
    <input type="text" name="new_username" placeholder="Username" required>
    <input type="password" name="new_password" placeholder="Password" required>
    <button type="submit">Sign Up</button>
  </form>
</main>

<footer>
  <p>© 2025 QWERTY Quest! — Developed by Erica Mae Barriga</p>
</footer>
</body>
</html>
