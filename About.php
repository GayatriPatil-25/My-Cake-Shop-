<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>CakeHeaven | About</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
<style>
:root {
  --cream: #fffaf0;
  --pink: #fce4ec;
  --gold: #d4a373;
  --brown: #6d4c41;
  --white: #ffffff;
}

/* Basic Reset */
* { margin:0; padding:0; box-sizing:border-box; }
html { scroll-behavior:smooth; font-size:16px; }
body { font-family:'Montserrat', sans-serif; background-color: var(--cream); color: var(--brown); line-height:1.6; overflow-x:hidden; }

/* Navbar */
nav {
  position: fixed; top:0; left:0; right:0;
  background-color: var(--white);
  box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  display: flex; justify-content: space-between; align-items: center;
  padding: clamp(10px, 2vw, 15px) clamp(15px, 5vw, 30px);
  z-index: 1000; flex-wrap: wrap;
}
nav .logo { font-family: 'Playfair Display', serif; font-size: clamp(1.4rem, 4vw, 1.7rem); color:black; flex-grow:0; transition: color 0.3s; }
nav .logo:hover { color:#e96443; }
nav ul { display:flex; gap:clamp(15px,4vw,25px); list-style:none; justify-content:flex-end; align-items:center; flex-wrap:wrap; transition:max-height 0.3s, opacity 0.3s; }
nav ul li a { text-decoration:none; color: var(--brown); font-weight:600; transition: color 0.3s; white-space:nowrap; display:block; padding:8px 0; font-size:clamp(0.85rem,2vw,1rem); }
nav ul li a:hover { color:#e96443; text-decoration:underline; text-decoration-color:black; text-decoration-thickness:2px; }
.btn-links {
  display:inline-block; padding:clamp(8px,2vw,12px) clamp(16px,4vw,24px);
  background:linear-gradient(135deg, #e97659,#feb47b);
  color:#fff; text-decoration:none; border-radius:25px;
  font-size:clamp(0.85rem,2vw,1rem); font-weight:600;
  cursor:pointer; box-shadow:0 4px 12px rgba(0,0,0,0.15); transition:all 0.3s ease;
}
.btn-links:hover { background:linear-gradient(135deg,#e96443,#dbaa4f); transform:translateY(-3px); box-shadow:0 6px 16px rgba(0,0,0,0.2); color:black; text-decoration:none; }

/* Hamburger Menu */
.hamburger { display:none; flex-direction:column; cursor:pointer; gap:5px; z-index:1100; }
.hamburger span { width:25px; height:3px; background: var(--brown); border-radius:2px; transition: all 0.3s ease; }
.hamburger.active span:nth-child(1) { transform:rotate(45deg) translate(5px,5px); }
.hamburger.active span:nth-child(2) { opacity:0; }
.hamburger.active span:nth-child(3) { transform:rotate(-45deg) translate(5px,-5px); }
@media(max-width:768px){
  nav ul { position:absolute; top:55px; right:0; background:var(--white); flex-direction:column; width:70%; max-width:250px; padding:20px; gap:15px; max-height:0; opacity:0; overflow:hidden; box-shadow:0 5px 15px rgba(0,0,0,0.1);}
  nav ul.active { max-height:500px; opacity:1; }
  .hamburger { display:flex; }
}

/* Sections */
section { padding: clamp(40px,6vw,80px) 20px; opacity:0; transform:translateY(30px); transition:all 0.8s ease-out; }
section h2 { font-family:'Playfair Display',serif; font-size:clamp(2rem,4vw,2.5rem); color:#e96443; text-align:center; margin-bottom:20px; }
section p { font-size:clamp(1rem,2.5vw,1.1rem); text-align:center; color:#5d4037; margin-bottom:40px; max-width:800px; margin-left:auto;margin-right:auto; }

.container { display:flex; flex-wrap:wrap; gap:40px; justify-content:center; align-items:center; max-width:1200px; margin:0 auto; }

.about-text { flex:1 1 350px; min-width:300px; }
.about-image { flex:1 1 350px; min-width:300px; }
.about-image img { width:100%; border-radius:15px; box-shadow:0 6px 15px rgba(0,0,0,0.1); }

/* Team Section */
.team-members { display:flex; flex-wrap:wrap; justify-content:center; gap:30px; }
.team-member { flex:1 1 250px; text-align:center; }
.team-member img { width:200px; height:200px; border-radius:50%; object-fit:cover; margin-bottom:15px; box-shadow:0 5px 15px rgba(0,0,0,0.05); }
.team-member h3 { font-size:1.2rem; margin-bottom:5px; color:#e96443; }
.team-member p { color:#5d4037; }

/* Values Section */
.values-container { display:flex; flex-wrap:wrap; justify-content:center; gap:30px; max-width:1000px; margin:0 auto; }
.value-box { background-color: var(--white); padding:25px; border-radius:15px; width:250px; box-shadow:0 6px 15px rgba(0,0,0,0.05); text-align:center; transition: transform 0.3s; }
.value-box:hover { transform:translateY(-5px); }
.value-box i { font-size:2.5rem; color:#ff9ecb; margin-bottom:15px; }
.value-box h4 { color:#e96443; margin-bottom:10px; }
.value-box p { color:#5d4037; font-size:0.95rem; }

/* Footer */
footer {
  background:linear-gradient(135deg, #e96443, #dbaa4f); color:var(--cream); padding: clamp(40px,7vw,60px) 20px; margin-top:50px; text-align:center; opacity:0; transform: translateY(30px); transition: all 0.8s ease-out;
}
.footer-container {
  display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:clamp(20px,5vw,40px); text-align:center;
}
footer h3 { font-size:clamp(1.1rem,3vw,1.3rem); margin-bottom:15px; color:black; }
footer p, .footer-links a { font-size:clamp(0.85rem,2.5vw,0.95rem); }
.footer-links ul { list-style:none; padding:0; }
.footer-links li { margin-bottom:10px; }
.footer-links a { color: rgb(75,43,11); text-decoration:none; transition:color 0.3s; }
.footer-links a:hover { color: var(--brown); font-weight:bold; }
.footer-contact a { color: var(--brown); font-weight:bold; text-decoration:none; }
.footer-contact a:hover { text-decoration:underline; }
.footer-bottom { margin-top:40px; padding-top:20px; font-size:0.9rem; color:black; border-top:1px solid #e4dcd4; }

/* Responsive */
@media(max-width:768px){
  .container, .values-container, .team-members { flex-direction:column; align-items:center; }
}
</style>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
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

<!-- About Section -->
<section class="fade-in">
  <div class="container">
    <div class="about-text">
      <h2>About Us</h2>
      <p>At <strong>CakeHeaven</strong>, we believe that cakes are more than just desserts—they are memories baked to perfection. Founded with love and dedication, our mission is to make every celebration extraordinary.</p>
      <p>We use the finest ingredients and creative designs to ensure each cake is a masterpiece. From classic favorites to custom creations, we bring your sweetest dreams to life.</p>
    </div>
    <div class="about-image">
      <img src="about.jpg" alt="Assorted Cakes">
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="fade-in">
  <h2>Our Team</h2>
  <div class="team-members">
    <div class="team-member">
      <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=400&q=80" alt="Anna">
      <h3>Anna Baker</h3>
      <p>Head Pastry Chef</p>
    </div>
    <div class="team-member">
      <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=400&q=80" alt="Mark">
      <h3>Mark Sweet</h3>
      <p>Cake Designer</p>
    </div>
    <div class="team-member">
      <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=400&q=80" alt="Lisa">
      <h3>Lisa Cream</h3>
      <p>Chocolate Specialist</p>
    </div>
  </div>
</section>

<!-- Values Section -->
<section class="fade-in">
  <h2>Our Values</h2>
  <div class="values-container">
    <div class="value-box">
      <i class="fas fa-leaf"></i>
      <h4>Quality Ingredients</h4>
      <p>We use only the finest ingredients to ensure freshness and taste.</p>
    </div>
    <div class="value-box">
      <i class="fas fa-paint-brush"></i>
      <h4>Creativity</h4>
      <p>Every cake is uniquely designed to match your celebration.</p>
    </div>
    <div class="value-box">
      <i class="fas fa-smile-beam"></i>
      <h4>Customer Happiness</h4>
      <p>Your satisfaction is our biggest reward. We bake with love.</p>
    </div>
    <div class="value-box">
      <i class="fas fa-heart"></i>
      <h4>Passion</h4>
      <p>Baking is our art. Every cake is crafted with dedication.</p>
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
        <li><a href="index.php">Home</a></li>
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

<script>
function toggleMenu(){
  const menu = document.getElementById("menu");
  const hamburger = document.querySelector(".hamburger");
  menu.classList.toggle("active");
  hamburger.classList.toggle("active");
}

// Scroll fade-in animation
const faders = document.querySelectorAll('.fade-in');
const appearOptions = { threshold:0.1, rootMargin:"0px 0px -50px 0px" };
const appearOnScroll = new IntersectionObserver(function(entries, observer){
  entries.forEach(entry=>{
    if(!entry.isIntersecting) return;
    entry.target.style.opacity = 1;
    entry.target.style.transform = 'translateY(0)';
    observer.unobserve(entry.target);
  });
}, appearOptions);
faders.forEach(fader=>appearOnScroll.observe(fader));
</script>

</body>
</html>
