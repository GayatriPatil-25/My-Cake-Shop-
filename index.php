<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>CakeHeaven | Home</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
<style>
:root {
  --cream: #fffaf0;
  --pink: #fce4ec;
  --gold: #d4a373;
  --brown: #6d4c41;
  --white: #ffffff;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
  font-size: 16px;
}

body {
  font-family: 'Montserrat', sans-serif;
  background-color: var(--cream);
  color: var(--brown);
  line-height: 1.6;
  overflow-x: hidden;
}

/* Navbar */
nav {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  background-color: var(--white);
  box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: clamp(10px, 2vw, 15px) clamp(15px, 5vw, 30px);
  z-index: 1000;
  flex-wrap: wrap;
}

nav .logo {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.4rem, 4vw, 1.7rem);
  color: black;
  flex-grow: 0;
  transition: color 0.3s;
}

nav .logo:hover { color: #e96443; }

nav ul {
  display: flex;
  gap: clamp(15px, 4vw, 25px);
  list-style: none;
  justify-content: flex-end;
  align-items: center;
  flex-wrap: wrap;
  transition: max-height 0.3s ease, opacity 0.3s ease;
}

nav ul li a {
  text-decoration: none;
  color: var(--brown);
  font-weight: 600;
  transition: color 0.3s;
  white-space: nowrap;
  display: block;
  padding: 8px 0;
  font-size: clamp(0.85rem, 2vw, 1rem);
}

nav ul li a:hover {
  color: #e96443;
  text-decoration: underline;
  text-decoration-color: black;
  text-decoration-thickness: 2px;
}

.btn-links {
  display: inline-block;
  padding: clamp(8px, 2vw, 12px) clamp(16px, 4vw, 24px);
  background: linear-gradient(135deg, #e97659, #feb47b);
  color: #fff;
  text-decoration: none;
  border-radius: 25px;
  font-size: clamp(0.85rem, 2vw, 1rem);
  font-weight: 600;
  cursor: pointer;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  transition: all 0.3s ease;
}

.btn-links:hover {
  background: linear-gradient(135deg, #e96443, #dbaa4f);
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(0,0,0,0.2);
  color: black;
  text-decoration: none;
}

/* Hamburger Menu */
.hamburger {
  display: none;
  flex-direction: column;
  cursor: pointer;
  gap: 5px;
  z-index: 1100;
}

.hamburger span {
  width: 25px;
  height: 3px;
  background: var(--brown);
  border-radius: 2px;
  transition: all 0.3s ease;
}

.hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(5px,5px); }
.hamburger.active span:nth-child(2) { opacity: 0; }
.hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(5px,-5px); }

@media (max-width:768px){
  nav ul {
    position: absolute;
    top: 55px;
    right: 0;
    background: var(--white);
    flex-direction: column;
    width: 70%;
    max-width: 250px;
    padding: 20px;
    gap: 15px;
    max-height: 0;
    opacity: 0;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }
  nav ul.active {
    max-height: 500px;
    opacity: 1;
  }
  .hamburger { display: flex; }
}

/* Hero Section */
.hero {
  position: relative;
  min-height: 100vh;
  background: url('cakehero.png') center/cover no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: clamp(10px, 2vw, 20px);
  overflow: hidden;
}

.overlay {
  position: absolute;
  inset: 0;
  background-color: rgba(0,0,0,0.55);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: clamp(5%,8%,10%);
  text-align: center;
  flex-direction: column;
}

.hero-content {
  max-width:700px;
  color: #fff;
  padding:20px;
  z-index:1;
  opacity:0;
  transform: translateY(30px);
  transition: all 0.8s ease-out;
}

.hero-content h1 {
  font-size: clamp(2rem, 8vw, 4rem);
  margin-bottom: 15px;
  font-family:'Playfair Display',serif;
}

.hero-content p {
  font-size: clamp(1rem, 3vw, 1.3rem);
  margin-bottom: 25px;
  color:#f5f5f5;
}

.promo-buttons {
  display:flex;
  gap:clamp(10px,4vw,15px);
  flex-wrap:wrap;
  justify-content:center;
}

/* Scroll Animations */
.fade-in {
  opacity:0;
  transform: translateY(30px);
  transition: all 0.8s ease-out;
}

.fade-in.show {
  opacity:1;
  transform: translateY(0);
}

/* Why Choose Us Section */
.why-choose-us {
  background-color: var(--white);
  padding: clamp(40px,7vw,80px) 20px;
  color: var(--brown);
  text-align: center;
  opacity:0;
  transform: translateY(30px);
  transition: all 0.8s ease-out;
}

.choose-container {
  max-width: 1000px;
  margin: 0 auto;
}

.why-choose-us h2 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(2rem, 4vw, 2.5rem);
  color: black;
  margin-bottom: 20px;
}

.choose-intro {
  font-size: clamp(1rem,2.5vw,1.1rem);
  margin-bottom: 40px;
  color: #5d4037;
}

.choose-list {
  list-style: none;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 25px;
  text-align: left;
}

.choose-title {
  font-weight: 600;
  color: #e96443;
  display: block;
  margin-bottom: 5px;
}

.choose-list li {
  font-size: 1rem;
  line-height: 1.6;
  position: relative;
  padding-left: 30px;
}

.choose-list li::before {
  content: "✔";
  position: absolute;
  left: 0;
  top: 5px;
  color: var(--gold);
  font-size: 1.1em;
}

/* Start Order Section */
.start-order {
  background-color: var(--cream);
  padding: clamp(40px,7vw,80px) 20px;
  opacity:0;
  transform: translateY(30px);
  transition: all 0.8s ease-out;
}

.start-order-container {
  display:flex;
  flex-wrap:wrap;
  gap:clamp(20px,4vw,40px);
  justify-content:center;
}

.order-image, .order-text { flex:1 1 350px; text-align:center; }

.order-image img {
  width:100%;
  max-width:400px;
  border-radius:15px;
  box-shadow:0 6px 20px rgba(0,0,0,0.1);
}

.order-text h2 { font-size: clamp(1.8rem,4vw,2.5rem); color:black; margin-bottom:20px; }
.order-text p { font-size:clamp(1rem,2.5vw,1.1rem); margin-bottom:30px; color:#5d4037; }

.button.secondary {
  background-color:transparent;
  color:var(--gold);
  border:2px solid var(--gold);
  padding:clamp(8px,2vw,12px) clamp(16px,4vw,24px);
  border-radius:30px;
  text-decoration:none;
  font-weight:600;
  min-width:140px;
  transition:all 0.3s;
}

.button.secondary:hover { background-color:rgb(59,53,53); color:white; }

/* Footer */
footer { background:linear-gradient(135deg, #e96443, #dbaa4f);; color: var(--cream); padding:60px 20px 30px; margin-top:50px; opacity:0; transform:translateY(30px); transition:all 0.8s ease-out;}
.footer-container { max-width:1200px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:40px; text-align:center; }
footer h3 { font-size:clamp(1.1rem,3vw,1.3rem); margin-bottom:15px; color:black;}
footer p, .footer-links a { font-size:clamp(0.85rem,2.5vw,0.95rem); }
.footer-links ul { list-style:none; padding:0; } .footer-links li { margin-bottom:10px;}
.footer-links a { color: rgb(75,43,11); text-decoration:none; transition:color 0.3s; }
.footer-links a:hover{color:var(--brown); font-weight:bold;}
.footer-contact a { color: var(--brown); text-decoration:none; font-weight:bold;}
@media (max-width:768px){
  .choose-list { grid-template-columns: 1fr; }
  .overlay { padding-left:5%; justify-content:center; text-align:center; }
  .promo-buttons { justify-content:center; }
  .order-text { text-align:center; }
}
</style>
</head>
<body>

<!-- Navbar -->
<nav>
  <div class="logo">** CakeHeaven **</div>
  <div class="hamburger" onclick="toggleMenu()">
    <span></span><span></span><span></span>
  </div>
  <ul id="menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="My Cakes.php">Menu</a></li>
    <li><a href="order.php">Orders</a></li>
    <li><a href="contacts.php">Contact</a></li>
    
    <li><a href="auth.php" class="btn-links">Login/SignUp</a></li>
  </ul>
</nav>

<!-- Hero Section -->
<section class="hero" id="hero">
  <div class="overlay">
    <div class="hero-content fade-in">
      <h1>Sweet Dreams Delivered</h1>
      <p>Experience the extraordinary. Our exclusive collection features handcrafted masterpieces that transform celebrations into unforgettable moments.</p>
      <div class="promo-buttons">
        <a href="My Cakes.php" class="btn-links">Explore Menu</a>
        <a href="cake reviews.html" class="btn-links">Custom Reviews</a>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us fade-in">
  <div class="choose-container">
    <h2>Why Choose Us</h2>
    <p class="choose-intro">At CakeHeaven, we blend passion with precision to make every celebration unforgettable.</p>
    <ul class="choose-list">
      <li><span class="choose-title">🎂 Handcrafted with Love:</span> Each cake is made from scratch using the freshest ingredients, tailored to your vision.</li>
      <li><span class="choose-title">🖌️ Custom Designs:</span> From elegant weddings to fun birthdays, we bring your ideas to life with artistic flair.</li>
      <li><span class="choose-title">🚚 On-Time Delivery:</span> Timely and secure delivery so your cake arrives fresh and ready for your special moment.</li>
      <li><span class="choose-title">🌟 5000+ Happy Customers:</span> With over 15 years of experience, we’ve served thousands of smiling customers.</li>
    </ul>
  </div>
</section>

<!-- Start Order Section -->
<section class="start-order fade-in">
  <div class="start-order-container">
    <div class="order-image">
      <img src="create1.jpg" alt="Cake Creation" />
    </div>
    <div class="order-text">
      <h2>Ready to Create<br />Something Special?</h2>
      <p>Let's discuss your vision and create a masterpiece that will be remembered long after the last bite.</p>
      <div class="order-buttons">
        <a href="custom order.html" class="btn-links">Start Your Order</a>
        <a href="gallery.html" class="button secondary">View Gallery</a>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="fade-in">
  <div class="footer-container">
    <div class="footer-about">
      <h3>Artisan Cakes</h3>
      <p>Crafting exceptional custom cakes with the finest ingredients and artistic attention to detail. Every creation tells a unique story.</p>
    </div>
    <div class="footer-links">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="#hero">Home</a></li>
        <li><a href="My Colection.html">Our Cakes</a></li>
        <li><a href="custom order.html">Custom Orders</a></li>
        <li><a href="contacts.html">Contact</a></li>
      </ul>
    </div>
    <div class="footer-contact">
      <h3>Contact Info</h3>
      <p>123 Baker Street<br>Sweet Valley, CA 90210</p>
      <p>Phone: <a href="tel:5551232253">(555) 123-CAKE</a></p>
      <p>Email: <a href="mailto:hello@artisancakes.com">hello@artisancakes.com</a></p>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2024 Artisan Cakes. All rights reserved.</p>
  </div>
</footer>

<!-- Scripts -->
<script>
function toggleMenu(){
  const menu = document.getElementById("menu");
  const hamburger = document.querySelector(".hamburger");
  menu.classList.toggle("active");
  hamburger.classList.toggle("active");
}

// Scroll Fade-in
const faders = document.querySelectorAll('.fade-in');
const appearOptions = { threshold: 0.1, rootMargin:"0px 0px -50px 0px" };
const appearOnScroll = new IntersectionObserver(function(entries, observer){
  entries.forEach(entry=>{
    if(!entry.isIntersecting) return;
    entry.target.classList.add('show');
    observer.unobserve(entry.target);
  });
}, appearOptions);
faders.forEach(fader=>appearOnScroll.observe(fader));
</script>

</body>
</html>
