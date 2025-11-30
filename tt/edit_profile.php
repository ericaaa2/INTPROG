<?php
session_start();

// Redirect if not logged in
if(!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

// Get current info
$user_email = $_SESSION['user_email'];
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'User';
$profile_pic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'profile.jpg'; // default pic

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $new_name = trim($_POST['name']);
    $new_email = trim($_POST['email']);

    // Simple validation
    $error = '';
    if(empty($new_name) || empty($new_email)) {
        $error = "Name and Email cannot be empty.";
    } else {

        // Ensure uploads folder exists
        $upload_dir = 'uploads/';
        if(!is_dir($upload_dir)){
            mkdir($upload_dir, 0755, true);
        }

        // Handle profile picture upload
        if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === 0) {
            $allowed = ['jpg','jpeg','png','gif'];
            $ext = strtolower(pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION));
            if(in_array($ext, $allowed)) {
                $new_pic_name = $upload_dir . uniqid() . '.' . $ext;
                if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $new_pic_name)){
                    $profile_pic = $new_pic_name;
                } else {
                    $error = "Failed to upload image.";
                }
            } else {
                $error = "Invalid image type. Only jpg, png, gif allowed.";
            }
        }

        if(!$error) {
            // Update session data
            $_SESSION['user_name'] = $new_name;
            $_SESSION['user_email'] = $new_email;
            $_SESSION['profile_pic'] = $profile_pic;

            header("Location: profile.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Profile — QWERTY Quest</title>
<link rel="stylesheet" href="style.css">

<!-- Montserrat font like Home/About -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

<style>
body {
    font-family: Arial, Helvetica, sans-serif;
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
    font-weight:700;
    font-family: 'Montserrat', sans-serif;
}
.header-buttons a:hover { background: #e6f0ff; }

main {
    max-width: 600px;
    margin: 30px auto;
    padding: 0 20px;
    flex: 1;
}

.edit-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    text-align: center;
    font-family: 'Montserrat', sans-serif;
}

.edit-card img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #1261a0;
    margin-bottom: 15px;
}

.edit-card input[type="text"], 
.edit-card input[type="email"], 
.edit-card input[type="file"] {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.edit-card button {
    padding: 10px 18px;
    background: #1261a0;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-weight:700;
    cursor:pointer;
    margin-top: 10px;
    font-family: 'Montserrat', sans-serif;
}
.edit-card button:hover { background: #0f4e88; }

.error { color: red; margin-bottom: 10px; }

footer {
    width:100%;
    background:#1261a0;
    color:#fff;
    text-align:center;
    padding:16px;
    margin-top:50px;
    font-family: 'Montserrat', sans-serif;
    font-weight:700;
}
</style>
</head>
<body>
<header>
  <div class="title">QWERTY Quest!</div>
  <div class="header-buttons">
    <a href="index.php">Home</a>
    <a href="profile.php">Profile</a>
    <a href="about.php">About Us</a>
    <a href="logout.php">Log Out</a>
  </div>
</header>

<main>
  <div class="edit-card">
    <h2>Edit Profile</h2>
    <?php if(isset($error) && $error) echo "<p class='error'>$error</p>"; ?>
    <form method="POST" enctype="multipart/form-data">
        <img src="<?php echo htmlspecialchars($profile_pic); ?>" alt="Profile Picture" onerror="this.src='profile.jpg'">
        <br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($user_name); ?>" placeholder="Your Name" required>
        <br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user_email); ?>" placeholder="Your Email" required>
        <br>
        <input type="file" name="profile_pic" accept="image/*">
        <br>
        <button type="submit">Save Changes</button>
    </form>
  </div>
</main>

<footer>
  <p>© 2025 QWERTY Quest! — Developed by Erica Mae Barriga</p>
</footer>
</body>
</html>
