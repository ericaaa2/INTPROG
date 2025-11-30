<?php
session_start();

// Redirect to login if user is not logged in
if(!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

// Get user info from session
$user_email = $_SESSION['user_email'];
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'User';
$profile_pic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'profile.jpg';

// Example typing history — replace with DB query if needed
$typing_history = [
    ['date' => '2025-11-20', 'wpm' => 45, 'correct' => 120, 'wrong' => 5],
    ['date' => '2025-11-21', 'wpm' => 52, 'correct' => 140, 'wrong' => 3],
    ['date' => '2025-11-22', 'wpm' => 50, 'correct' => 135, 'wrong' => 4],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo htmlspecialchars($user_name); ?> — Profile | QWERTY Quest</title>
<link rel="stylesheet" href="style.css">

<!-- Montserrat font -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Montserrat', Arial, Helvetica, sans-serif;
    background: url('bg.jpg') no-repeat center center fixed;
    background-size: cover;
    margin: 0;
    padding: 0;
    color: #222;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

header {
    background: #1261a0;
    color: #fff;
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
}
.header-buttons a:hover { background: #e6f0ff; }
.header-buttons a.active { background: #0f4e88; color: #fff; }

main {
    max-width: 1000px;
    margin: 30px auto;
    padding: 0 20px;
}

.profile-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
    background: rgba(255,255,255,0.95);
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

.profile-header img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #1261a0;
}

.profile-header .info { flex: 1; }
.profile-header h2 { margin: 0 0 10px; font-family: 'Montserrat', sans-serif; }
.profile-header button {
    padding: 8px 16px;
    background: #1261a0;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 700;
    font-family: 'Montserrat', sans-serif;
}
.profile-header button:hover { background: #0f4e88; }

.typing-history { margin-top: 20px; }
.typing-card {
    background: rgba(255,255,255,0.9);
    border-radius: 10px;
    padding: 15px 20px;
    margin-bottom: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: 'Montserrat', sans-serif;
}

h3 {
    color: #1261a0; 
    text-align: center; 
    margin-bottom: 15px; 
    background: rgba(255,255,255,0.9);
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 1.4rem;
    box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    font-family: 'Montserrat', sans-serif;
}

footer {
    width: 100%;
    background: #1261a0;
    color: #fff;
    text-align: center;
    padding: 16px;
    margin-top: 50px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
}
</style>
</head>
<body>
<header>
  <div class="title">QWERTY Quest!</div>
  <div class="header-buttons">
    <a href="index.php">Home</a>
    <a href="login.php">Log In / Sign Up</a>
    <a class="active" href="profile.php">Profile</a>
    <a href="about.php">About Us</a>
  </div>
</header>

<main>
  <div class="profile-header">
    <img src="<?php echo htmlspecialchars($profile_pic) . '?v=' . time(); ?>" alt="Profile Picture">
    <div class="info">
      <h2><?php echo htmlspecialchars($user_name); ?></h2>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($user_email); ?></p>
      <button onclick="window.location.href='edit_profile.php'">Edit Profile</button>
    </div>
  </div>

  <h3>Typing History</h3>
  <div class="typing-history">
    <?php foreach($typing_history as $history): ?>
    <div class="typing-card">
      <span><?php echo $history['date']; ?></span>
      <span>WPM: <?php echo $history['wpm']; ?></span>
      <span>Correct: <?php echo $history['correct']; ?></span>
      <span>Wrong: <?php echo $history['wrong']; ?></span>
    </div>
    <?php endforeach; ?>
  </div>
</main>

<footer>
  <p>© 2025 QWERTY Quest! — Developed by Erica Mae Barriga</p>
</footer>
</body>
</html>
