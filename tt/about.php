<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>QWERTY Quest! — About Us</title>
  <link rel="stylesheet" href="style.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

    /* Reset and global styles */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html, body {
      height: 100%;
      font-family: Arial, Helvetica, sans-serif;
      background: url('bg.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #222;
    }
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Header */
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
      font-size: 1.9em; 
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
      transition: 0.2s;
    }
    .header-buttons a:hover { background: #e6f0ff; }
    .btn.active { background: #0f4e88; color: #fff; }

    /* Main content */
    main { flex: 1; max-width: 1200px; width: 90%; margin: 20px auto; padding: 20px; }

    /* Small header card */
    .small-card {
      padding: 12px 20px;
      margin: 20px auto 10px auto;
      background: rgba(18, 97, 160, 0.9); /* semi-transparent */
      color: #fff;
      border-radius: 6px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      text-align: center;
      max-width: 400px;
      font-family: 'Montserrat', sans-serif; /* same as Home */
    }

    /* About card for paragraph */
    .about-card {
      padding: 20px;
      margin: 20px auto;
      max-width: 700px;
      background: rgba(255, 255, 255, 0.9); /* semi-transparent white */
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.08);
      line-height: 1.6;
      font-size: 1.2rem;
      text-align: justify;
      font-family: Arial, Helvetica, sans-serif;
    }

    /* Footer */
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
    <div class="title">QWERTY Quest!</div>
    <div class="header-buttons">
      <a class="btn" href="index.php">Home</a>
      <a class="btn" href="login.php">Log In / Sign Up</a>
      <a class="btn" href="profile.php">Profile</a>
      <a class="btn active" href="about.php">About Us</a>
    </div>
  </header>

  <main>
    <!-- Small header card -->
    <div class="small-card">
      <h2>About QWERTY Quest</h2>
    </div>

    <!-- About text in a card -->
    <div class="about-card">
      <p>
        QWERTY Quest! is a typing exercise platform designed to help users practice, improve, and track their typing speed. 
        The system features 10 paragraphs of tongue-twisters, WPM tracking, and correct/incorrect character counting.
      </p>
      <p>
        It is created by Erica Mae Barriga © 2025 as a student project for improving typing skills.
      </p>
    </div>
  </main>

  <footer>
    <p>© 2025 QWERTY Quest! — Developed by Erica Mae Barriga</p>
  </footer>
</body>
</html>
