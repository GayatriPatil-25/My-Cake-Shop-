<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>CakeHeaven | Login & Signup</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
<style>
:root {
  --cream: #fffaf0;
  --pink: #fce4ec;
  --gold: #d4a373;
  --brown: #6d4c41;
  --white: #ffffff;
  --primary: #ff6f61;
  --primary-dark: #e96443;
}

* { margin:0; padding:0; box-sizing:border-box; }
html { scroll-behavior:smooth; font-size:16px; }
body {
  font-family:'Montserrat',sans-serif;
  background: linear-gradient(135deg, #fff5f0, #fdecec);
  background-size: 200% 200%;
  animation: bgMove 10s ease-in-out infinite alternate;
  color:var(--brown);
  line-height:1.6;
  overflow-x:hidden;
}

/* Animate the gradient background */
@keyframes bgMove {
  0% { background-position: left top; }
  100% { background-position: right bottom; }
}

/* Navbar (your original) */
nav {
  position: fixed; top:0; left:0; right:0; background-color:var(--white);
  box-shadow:0 2px 6px rgba(0,0,0,0.05);
  display:flex; justify-content:space-between; align-items:center;
  padding:clamp(10px,2vw,15px) clamp(15px,5vw,30px);
  z-index:1000; flex-wrap:wrap;
}
nav .logo { font-family:'Playfair Display',serif; font-size:clamp(1.4rem,4vw,1.7rem); color:black; transition:color 0.3s; }
nav .logo:hover { color:var(--primary-dark); }
nav ul { display:flex; gap:clamp(15px,4vw,25px); list-style:none; justify-content:flex-end; align-items:center; flex-wrap:wrap; transition:max-height 0.3s ease, opacity 0.3s ease; }
nav ul li a { text-decoration:none; color:var(--brown); font-weight:600; transition:color 0.3s; white-space:nowrap; display:block; padding:8px 0; font-size:clamp(0.85rem,2vw,1rem);}
nav ul li a:hover { color:var(--primary-dark); text-decoration:underline; text-decoration-color:black; text-decoration-thickness:2px; text-underline-offset:3px; }
.btn-links {
  display:inline-block; padding:clamp(8px,2vw,12px) clamp(16px,4vw,24px);
  background: linear-gradient(135deg, #e97659, #feb47b); color:#fff; text-decoration:none; border-radius:25px;
  font-size:clamp(0.85rem,2vw,1rem); font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(0,0,0,0.15);
  transition:all 0.3s ease;
}
.btn-links:hover { background:linear-gradient(135deg, var(--primary-dark), #dbaa4f); transform:translateY(-3px); box-shadow:0 6px 16px rgba(0,0,0,0.2); color:black; text-decoration:none; }

.hamburger { display:none; flex-direction:column; cursor:pointer; gap:5px; z-index:1100; }
.hamburger span { width:25px; height:3px; background:var(--brown); border-radius:2px; transition:all 0.3s ease; }
.hamburger.active span:nth-child(1) { transform:rotate(45deg) translate(5px,5px); }
.hamburger.active span:nth-child(2) { opacity:0; }
.hamburger.active span:nth-child(3) { transform:rotate(-45deg) translate(5px,-5px); }
@media(max-width:768px){
  nav ul { position:absolute; top:55px; right:0; background:var(--white); flex-direction:column; width:70%; max-width:250px; padding:20px; gap:15px; max-height:0; opacity:0; overflow:hidden; box-shadow:0 5px 15px rgba(0,0,0,0.1);}
  nav ul.active { max-height:500px; opacity:1; }
  .hamburger { display:flex; }
}

/* Auth Section */
.auth-section {
  margin-top:120px;
  display:flex; align-items:center; justify-content:center;
  min-height:calc(100vh - 200px);
  padding:20px;
}
.auth-box {
  background:var(--white);
  width:420px; max-width:90%;
  border-radius:20px;
  box-shadow:0 10px 30px rgba(0,0,0,0.1);
  overflow:hidden;
  opacity:0;
  transform:translateY(40px);
  animation: fadeSlideIn 1.2s ease forwards;
}
@keyframes fadeSlideIn {
  from { opacity:0; transform:translateY(60px); }
  to { opacity:1; transform:translateY(0); }
}

.tabs {
  display:flex; justify-content:space-around; background:var(--primary); color:white; font-weight:600;
}
.tabs div {
  flex:1; text-align:center; padding:15px; cursor:pointer; transition:background 0.3s;
}
.tabs .active { background:var(--primary-dark); }

.forms { display:flex; width:200%; transition:0.5s; }
.form-content { width:50%; padding:30px 25px; }
.form-content h2 { text-align:center; font-family:'Playfair Display',serif; margin-bottom:15px; color:var(--primary-dark); }

form { text-align:left; }
input[type="text"],
input[type="email"],
input[type="password"] {
  width:100%; padding:12px 15px; margin:10px 0 15px; border:1px solid #ddd; border-radius:8px; font-size:1rem; outline:none; transition:0.3s;
}
input:focus { border-color:var(--primary-dark); box-shadow:0 0 6px rgba(233,100,67,0.2); }

.show-pass { display:flex; align-items:center; gap:8px; font-size:0.9rem; margin-bottom:10px; color:var(--brown);}
.forgot-pass { display:block; text-align:right; font-size:0.9rem; color:var(--primary-dark); text-decoration:none; margin-bottom:20px;}
.forgot-pass:hover { text-decoration:underline; }

button {
  width:100%; padding:12px; background:linear-gradient(135deg, var(--primary), #feb47b);
  color:#fff; border:none; border-radius:25px; font-size:1rem; font-weight:600; cursor:pointer; transition:all 0.3s ease;
}
button:hover { background:linear-gradient(135deg, var(--primary-dark), #dbaa4f); color:#000; }

p { text-align:center; margin-top:10px; font-size:0.9rem; }
p a { color:var(--primary-dark); text-decoration:none; font-weight:600; }
p a:hover { text-decoration:underline; }

/* Footer */
footer {
  background:var(--white);
  text-align:center;
  padding:25px;
  font-size:0.9rem;
  color:var(--brown);
  box-shadow:0 -2px 6px rgba(0,0,0,0.05);
}
footer a { color:var(--primary-dark); text-decoration:none; font-weight:600; }
footer a:hover { text-decoration:underline; }
</style>
</head>
<body>

<!-- Navbar -->
<nav>
  <div class="logo">** CakeHeaven **</div>
  <div class="hamburger" onclick="toggleMenu()"><span></span><span></span><span></span></div>
  <ul id="menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="About.php">About</a></li>
    <li><a href="My Cakes.php">Menu</a></li>
    <li><a href="order.php">Orders</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="auth.php" class="btn-links">Login/SignUp</a></li>
  </ul>
</nav>

<!-- Auth Section -->
<section class="auth-section">
  <div class="auth-box">
    <div class="tabs">
      <div id="loginTab" class="active" onclick="switchTab('login')">Login</div>
      <div id="signupTab" onclick="switchTab('signup')">Signup</div>
    </div>

    <div class="forms" id="formContainer">
      <!-- Login -->
      <div class="form-content">
        <h2>Welcome Back!</h2>
        <form action="login_process.php" method="POST">
          <label>Email</label>
          <input type="email" name="email" placeholder="Enter your email" required>
          <label>Password</label>
          <input type="password" name="password" id="loginPass" placeholder="Enter password" required>
          <label class="show-pass"><input type="checkbox" onclick="togglePassword('loginPass')"> Show Password</label>
          <a href="forgot_password.php" class="forgot-pass">Forgot Password?</a>
          <button type="submit">Login</button>
          <p>Don’t have an account? <a href="#" onclick="switchTab('signup')">Sign up here</a></p>
        </form>
      </div>

      <!-- Signup -->
      <div class="form-content">
        <h2>Create Your Account</h2>
        <form action="signup_process.php" method="POST">
          <label>Full Name</label>
          <input type="text" name="name" placeholder="Enter your name" required>
          <label>Email</label>
          <input type="email" name="email" placeholder="Enter your email" required>
          <label>Password</label>
          <input type="password" name="password" id="signupPass" placeholder="Create password" required>
          <label class="show-pass"><input type="checkbox" onclick="togglePassword('signupPass')"> Show Password</label>
          <button type="submit">Sign Up</button>
          <p>Already have an account? <a href="#" onclick="switchTab('login')">Login here</a></p>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  © 2025 <a href="index.php">CakeHeaven</a> — Sweet Dreams Delivered 🍰
</footer>

<script>
// Hamburger menu
function toggleMenu(){
  const menu = document.getElementById("menu");
  const hamburger = document.querySelector(".hamburger");
  menu.classList.toggle("active");
  hamburger.classList.toggle("active");
}

// Switch Tabs
function switchTab(tab){
  const loginTab = document.getElementById('loginTab');
  const signupTab = document.getElementById('signupTab');
  const formContainer = document.getElementById('formContainer');

  if(tab==='login'){
    loginTab.classList.add('active');
    signupTab.classList.remove('active');
    formContainer.style.transform='translateX(0%)';
  } else {
    signupTab.classList.add('active');
    loginTab.classList.remove('active');
    formContainer.style.transform='translateX(-50%)';
  }
}

// Toggle password
function togglePassword(id){
  const input=document.getElementById(id);
  input.type=input.type==='password'?'text':'password';
}
</script>

</body>
</html>
