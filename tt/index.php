<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>QWERTY Quest! — Home</title>

  <!-- FONT MATCHED WITH ABOUT PAGE -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="style.css">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html, body { 
        height: 100%; 
        font-family: 'Montserrat', sans-serif; 
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

    /* Updated Title Font Style */
    header .title { 
      font-size: 2em; 
      font-weight: 700; 
      letter-spacing: 1px; 
    }

    .header-buttons a {
      font-family: 'Montserrat', sans-serif;
      background: #fff;
      color: #1261a0;
      padding: 8px 12px;
      border-radius: 6px;
      text-decoration: none;
      margin-left: 8px;
      font-weight: 600;
      transition: 0.2s;
    }
    .header-buttons a:hover { background: #e6f0ff; }

    main { flex: 1; max-width: 1200px; width: 90%; margin: 20px auto; padding: 20px; }

    h2, p { 
      text-align: center; 
      color: #fff; 
      text-shadow: 1px 1px 4px rgba(0,0,0,0.5); 
      font-family: 'Montserrat', sans-serif;
    }

    .card {
      position: relative;
      padding: 20px;
      border-radius: 12px;
      overflow: hidden;
      margin-top: 20px;
      color: #fff;
      text-align: center;
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
      background-size: cover;
      background-position: center;
    }

    .card::after {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.6);
      z-index: 1;
    }

    .card-content {
      position: relative;
      z-index: 2;
      font-family: 'Montserrat', sans-serif;
    }

    .button-row {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin: 20px 0;
      flex-wrap: wrap;
    }

    .big-btn {
      font-family: 'Montserrat', sans-serif;
      display: inline-block;
      padding: 10px 18px;
      background: #1261a0;
      color: #fff;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 700;
      transition: 0.2s;
    }
    .big-btn.alt { background: #fff; color: #1261a0; border: 1px solid #ddd; }
    .big-btn:hover { background: #0f4e88; }
    .big-btn.alt:hover { background: #f0f4fa; }

    footer { width: 100%; background: #1261a0; color: #fff; text-align: center; padding: 16px; margin-top: auto; }
  </style>
</head>
<body>
  <header>
    <div class="title">QWERTY Quest!</div>
    <div class="header-buttons">
      <a class="btn" href="index.php">Home</a>
      <a class="btn" href="login.php">Log In / Sign Up</a>
      <a class="btn" href="profile.php">Profile</a>
      <a class="btn" href="about.php">About Us</a>
    </div>
  </header>

  <main>
    <h2>Welcome to QWERTY Quest!</h2>
    <p>Practice, improve, and track your typing speed. Created by Erica Mae Barriga © 2025 Typing Exercise Project</p>

    <div class="card" style="background-image: url('1.jpg');">
      <div class="card-content">
        <h3>Instructions</h3>
        <p>You'll be given 10 tongue-twister paragraphs. Type each paragraph exactly. We'll track WPM, correct characters, and wrong characters.</p>
      </div>
    </div>

    <div class="card" style="background-image: url('2.gif');">
      <div class="card-content">
        <h3>Fun Practice</h3>
        <p>Enjoy dynamic typing exercises with animated guides to improve your speed and accuracy.</p>
      </div>
    </div>

    <div class="card" style="background-image: url('3.gif');">
      <div class="card-content">
        <h3>Track Progress</h3>
        <p>Monitor your typing performance over time and see improvements with every session.</p>
      </div>
    </div>

    <div class="button-row">
      <?php if(isset($_SESSION['user'])): ?>
        <a class="big-btn" href="typing.php">Start</a>
      <?php else: ?>
        <a class="big-btn" href="login.php">Log In</a>
      <?php endif; ?>
      <a class="big-btn alt" href="instructions.php">How to Play</a>
    </div>

  </main>

  <footer>
    <p>© 2025 QWERTY Quest! — Developed by Erica Mae Barriga</p>
  </footer>
</body>
</html>
