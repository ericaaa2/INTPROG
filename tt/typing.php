<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Typing Test — QWERTY Quest</title>
<link rel="stylesheet" href="style.css">
<style>
/* Full-page background */
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background: url('bg.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    flex-direction: column;
    color: #222;
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
    flex-shrink: 0;
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
}
.header-buttons a:hover { background: #e6f0ff; }

/* Main typing box */
main {
    flex: 1;
    max-width: 1200px;
    width: 90%;
    margin: 40px auto;
    padding: 20px;
    background: rgba(255,255,255,0.9); /* Slight transparency */
    border-radius: 10px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Paragraph to type */
#text-to-type {
    white-space: pre-wrap;
    margin: 12px 0;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #ddd;
    background: #fafafa;
    max-width: 900px;
    width: 100%;
    text-align: justify;
    font-size: 1.8rem;
    font-family: 'Times New Roman', Times, serif;
    user-select: none;
}

/* Typing input */
#typing-input {
    width: 80%;
    padding: 12px;
    font-size: 1.3rem;
    border-radius: 6px;
    border: 1px solid #ccc;
    margin-top: 15px;
    font-family: 'Times New Roman', Times, serif;
}

/* Stats display */
#stats { margin-top: 15px; font-size: 1.1rem; }

/* Buttons row */
.row {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 12px;
}
.big-btn {
    padding: 10px 18px;
    background: #1261a0;
    color: #fff;
    border-radius: 8px;
    border: none;
    font-weight: 700;
    cursor: pointer;
    margin: 5px;
    transition: 0.2s;
}
.big-btn.alt {
    background: #fff;
    color: #1261a0;
    border: 1px solid #ddd;
}
.big-btn:hover { background: #0f4e88; }
.big-btn.alt:hover { background: #f0f4fa; }

/* Footer */
footer {
    width: 100%;
    background: #1261a0;
    color: #fff;
    text-align: center;
    padding: 16px;
    flex-shrink: 0;
}
</style>
</head>
<body>
<header>
  <div class="title">QWERTY Quest</div>
  <div class="header-buttons">
    <a class="btn" href="index.php">Home</a>
    <a class="btn" href="about.php">About Us</a>
    <a class="btn" href="profile.php">Profile</a>
    <a class="btn" href="logout.php">Log out</a>
  </div>
</header>

<main>
  <h2>Typing Exercise</h2>
  <div id="paragraph-number">Paragraph 1 of 10</div>
  <div id="text-to-type"></div>
  <textarea id="typing-input" rows="5" placeholder="Start typing..." autofocus></textarea>
  <div id="stats">
      <p>WPM: <span id="speed">0</span></p>
      <p>Correct characters: <span id="correct">0</span></p>
      <p>Wrong characters: <span id="wrong">0</span></p>
  </div>
  <div class="row">
      <button id="startBtn" class="big-btn">Start</button>
      <button id="nextBtn" class="big-btn alt">Next</button>
      <button id="exitBtn" class="big-btn alt">Exit</button>
  </div>
</main>

<footer>
  <p>© 2025 QWERTY Quest! — Developed by Erica Mae Barriga</p>
</footer>

<script>
const paragraphs = [
`Peter Piper picked a peck of pickled peppers. A peck of pickled peppers Peter Piper picked. If Peter Piper picked a peck of pickled peppers, where’s the peck of pickled peppers Peter Piper picked?`,
`How much wood would a woodchuck chuck if a woodchuck could chuck wood? He would chuck as much wood as a woodchuck would, if a woodchuck could chuck wood.`,
`She sells seashells by the seashore. The seashells she sells are surely seashells. So if she sells seashells by the seashore, then I’m sure she sells seashore shells.`,
`Unique New York, unique New York. You know you need unique New York. The truly unique New York you know you need is uniquely New York indeed.`,
`Betty Botter bought some butter, but she said, “This butter’s bitter!” So she bought a bit of better butter to make the bitter butter better. Now the bitter butter’s better because Betty Botter bought better butter.`,
`Fuzzy Wuzzy was a bear. Fuzzy Wuzzy had no hair. Fuzzy Wuzzy wasn’t fuzzy, was he? Even if Fuzzy Wuzzy had been fuzzy, could Fuzzy Wuzzy actually stay fuzzy forever?`,
`Irish wristwatch, Swiss wristwatch. The Swiss wristwatch sat beside the Irish wristwatch, and the Irish wristwatch wished the Swiss wristwatch would switch wristwatches.`,
`A big black bug bit a big black bear and made the big black bear bleed blood. Meanwhile, a blue-blur bird briskly brushed by the biting bug before the bear blinked.`,
`A proper copper coffee pot is hard to find because people prefer a perfect copper coffee pot. But a proper perfect copper coffee pot can’t possibly purely pour proper coffee.`,
`If two witches were watching two watches, which witch would watch which watch? And if the watches the witches watched were switching, which witch would watch which switched watch?`
];

let index = 0, startTime = null, correct = 0, wrong = 0;

const textDiv = document.getElementById('text-to-type');
const input = document.getElementById('typing-input');
const paraNum = document.getElementById('paragraph-number');
const nextBtn = document.getElementById('nextBtn');

function load(i){
  index = i;
  const p = paragraphs[i];
  textDiv.innerHTML = p;
  paraNum.textContent = `Paragraph ${i+1} of ${paragraphs.length}`;
  input.value=''; startTime=null; correct=0; wrong=0;
  document.getElementById('correct').textContent='0';
  document.getElementById('wrong').textContent='0';
  document.getElementById('speed').textContent='0';
}

input.addEventListener('input', () => {
  if(!startTime) startTime = Date.now();
  const typed = input.value;
  const p = paragraphs[index];
  correct = 0; wrong = 0;
  let coloredText = '';
  for(let i=0; i<p.length; i++){
    if(i < typed.length){
      if(typed[i] === p[i]){
        coloredText += `<span style="color:green;">${p[i]}</span>`;
        correct++;
      } else {
        coloredText += `<span style="color:red;">${p[i]}</span>`;
        wrong++;
      }
    } else {
      coloredText += `<span>${p[i]}</span>`;
    }
  }
  textDiv.innerHTML = coloredText;
  document.getElementById('correct').textContent = correct;
  document.getElementById('wrong').textContent = wrong;
  const mins = (Date.now() - startTime)/60000;
  const words = typed.trim().length ? typed.trim().split(/\s+/).length : 0;
  const wpm = mins > 0 ? Math.round(words/mins) : 0;
  document.getElementById('speed').textContent = wpm;
});

nextBtn.addEventListener('click', () => {
    const typed = input.value.trim();
    const required = paragraphs[index].trim();

    if(typed !== required){
        alert("❌ Finish typing the paragraph EXACTLY before proceeding.");
        return;
    }

    if(index < paragraphs.length - 1){
        load(index + 1);
        input.focus();
    } else {
        alert("🎉 You've completed all 10 paragraphs!");
    }
});

textDiv.addEventListener('copy', e => e.preventDefault());
textDiv.addEventListener('contextmenu', e => e.preventDefault());
input.addEventListener('paste', e => e.preventDefault());

document.getElementById('startBtn').addEventListener('click', ()=>{ load(0); input.focus(); });
document.getElementById('exitBtn').addEventListener('click', ()=>{ if(confirm('Exit the test?')) window.location.href='index.php'; });

load(0);
</script>

</body>
</html>
