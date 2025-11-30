<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Instructions — QWERTY Quest</title>
  <link rel="stylesheet" href="style.css">

  <!-- Montserrat font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: url('bg.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      flex-direction: column;
      color: #222;
    }
    body {
      min-height: 100vh;
    }

    header {
      background: #1261a0;
      color: #fff;
      width: 100%;
      padding: 20px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header .title {
      font-size: 1.6em;
      font-weight: 700;
      font-family: 'Montserrat', sans-serif;
    }
    .header-buttons a {
      background: #fff;
      color: #1261a0;
      padding: 8px 12px;
      border-radius: 6px;
      text-decoration: none;
      margin-left: 8px;
      font-weight: 700;
      font-family: 'Montserrat', sans-serif;
      transition: 0.2s;
    }
    .header-buttons a:hover {
      background: #e6f0ff;
    }

    main {
      flex: 1;
      width: 90%;
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
      background: rgba(255,255,255,0.95);
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.1);
      font-family: 'Montserrat', sans-serif;
    }
    main h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    main p, main ul {
      font-size: 1.2rem;
      line-height: 1.5;
      margin-bottom: 16px;
    }
    ul {
      padding-left: 20px;
    }

    .row {
      display: flex;
      gap: 12px;
      justify-content: center;
      margin-top: 20px;
      flex-wrap: wrap;
    }
    .big-btn {
      display: inline-block;
      padding: 10px 18px;
      background: #1261a0;
      color: #fff;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 700;
      font-family: 'Montserrat', sans-serif;
      transition: 0.2s;
    }
    .big-btn:hover {
      background: #0f4e88;
    }
    .big-btn.alt {
      background: #fff;
      color: #1261a0;
      border: 1px solid #ddd;
    }
    .big-btn.alt:hover {
      background: #f0f4fa;
    }

    footer {
      width: 100%;
      background: #1261a0;
      color: #fff;
      text-align: center;
      padding: 16px;
      margin-top: auto;
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
    }
  </style>
</head>
<body>
<header>
  <div class="title">QWERTY Quest</div>
  <div class="header-buttons">
    <a class="btn" href="index.php">Home</a>
    <a class="btn" href="login.php">Log In / Sign Up</a>
  </div>
</header>

<main>
  <h2>Ready? Here’s how it works</h2>
  <p>You're about to type <strong>10 tongue twister paragraphs</strong>. Type each paragraph exactly as shown. The test records:</p>
  <ul>
    <li><strong>WPM</strong> — words per minute</li>
    <li><strong>Correct characters</strong></li>
    <li><strong>Wrong characters</strong></li>
  </ul>

  <p>Controls:</p>
  <ul>
    <li><strong>Start</strong> — begin the test</li>
    <li><strong>Next</strong> — go to next paragraph (auto-advances when paragraph matches)</li>
    <li><strong>Exit</strong> — end test and return to main menu</li>
  </ul>

  <div class="row">
    <a class="big-btn" href="<?php echo isset($_SESSION['user']) ? 'typing.php' : 'login.php'; ?>">Start</a>
    <a class="big-btn alt" href="index.php">Back</a>
  </div>
</main>

<footer>
  <p>© 2025 QWERTY Quest! — Developed by Erica Mae Barriga</p>
</footer>
</body>
</html>
