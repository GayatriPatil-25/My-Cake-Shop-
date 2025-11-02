<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get in Touch | CakeHeaven</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --cream: #fffaf0;
      --pink: #fce4ec;
      --gold: #d4a373;
      --brown: #6d4c41;
      --white: #ffffff;
      --accent: #e96443;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Montserrat', sans-serif;
      background: var(--cream);
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

    /* Hero */
    .hero {
      background: url('get in touch.jpg') center/cover no-repeat;
      min-height: 55vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      position: relative;
      padding: 20px;
    }
    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.45);
      z-index: 1;
    }
    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 700px;
    }
    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.6rem, 5vw, 3rem);
      margin-bottom: 15px;
    }
    .hero p {
      font-size: clamp(0.9rem, 2.5vw, 1.2rem);
    }

    /* Cards */
    .cards-container {
      max-width: 1200px;
      margin: 60px auto;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }
    .card {
      background: var(--white);
      padding: 25px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 6px 15px rgba(0,0,0,0.08);
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease;
    }
    .card.show {
      opacity: 1;
      transform: translateY(0);
    }
    .card h3 {
      font-size: 1.2rem;
      margin-bottom: 10px;
      color: black;
      font-family: 'Playfair Display', serif;
    }
    .card p { font-size: 0.95rem; margin-bottom: 10px; }
    .card a {
      color: var(--accent);
      font-weight: bold;
      text-decoration: none;
    }
    .card a:hover { text-decoration: underline; }

    /* Create Together */
    .create-section {
      display: flex;
      flex-wrap: wrap;
      max-width: 1200px;
      margin: 60px auto;
      background: var(--pink);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    }
    .create-text {
      flex: 1 1 400px;
      padding: 30px;
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease;
    }
    .create-text.show { opacity: 1; transform: translateY(0); }
    .create-text h2 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.4rem, 3vw, 2rem);
      margin-bottom: 15px;
      color: var(--brown);
    }
    .create-text p {
      font-size: clamp(0.9rem, 2vw, 1.05rem);
      margin-bottom: 12px;
    }
    .create-text a {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background: var(--accent);
      color: white;
      font-weight: bold;
      text-decoration: none;
      border-radius: 6px;
      transition: background 0.3s;
    }
    .create-text a:hover { background: #b88654; }

    .create-map {
      flex: 1 1 400px;
      min-height: 300px;
      padding: 20px;
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease;
    }
    .create-map.show { opacity: 1; transform: translateY(0); }
    .create-map iframe {
      width: 100%;
      height: 100%;
      border: 0;
      display: block;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    }

    /* Mobile adjustments */
    @media (max-width: 768px) {
      .hero { min-height: 45vh; }
      .create-section { flex-direction: column; }
      .create-map { min-height: 250px; }
    }
    @media (max-width: 480px) {
      .hero { min-height: 40vh; }
      .cards-container { margin: 40px auto; }
    }

    
    
  </style>
</head>
<body>
 <nav>
  <div class="logo">** CakeHeaven **</div>
  <div class="hamburger" onclick="toggleMenu()">
    <span></span><span></span><span></span>
  </div>
  <ul id="menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="About.php">About</a></li>
    <li><a href="My Cakes.php">Menu</a></li>
    <li><a href="order.php">Orders</a></li>
    <li><a href="contact.php">Contact</a></li>

    <li><a href="auth.php" class="btn-links">Login/SignUp</a></li>
  </ul>
</nav>
  <!-- Hero -->
  <section class="hero">
    <div class="hero-content">
      <h1>Get in Touch</h1>
      <p>We'd love to hear from you. Whether you have questions about our cakes, want to discuss a custom order, or simply want to say hello, we're here to help make your celebration extraordinary.</p>
    </div>
  </section>

  <!-- Cards -->
  <section class="cards-container">
    <div class="card">
      <h3>📞 Call Us</h3>
      <p>We’re here from 9 AM - 8 PM every day.</p>
      <a href="tel:+919876543210">+91 98765 43210</a>
    </div>
    <div class="card">
      <h3>📧 Email Us</h3>
      <p>Send us your sweet ideas and inquiries.</p>
      <a href="mailto:hello@cakeheaven.com">hello@cakeheaven.com</a>
    </div>
    <div class="card">
      <h3>🕒 Business Hours</h3>
      <p>Mon - Sat: 9 AM - 8 PM</p>
      <p>Sunday: 10 AM - 6 PM</p>
    </div>
    <div class="card">
      <h3>📍 Visit Our Studio</h3>
      <p>123 Sweet Street, CakeTown</p>
      <a href="https://goo.gl/maps/xyz" target="_blank">View on Map</a>
    </div>
  </section>

  
  <!-- Create Together -->
  <section class="create-section">
    <div class="create-text">
      <h2>Let’s Create Together</h2>
      <p>Every cake has a story. Share your vision with us, and let’s design something sweet and unforgettable for your special day.</p>
      <p>Visit our studio or give us a call to start planning your dream cake today.</p>
      <a href="custom order.html">Start Your Order</a>
    </div>
    <div class="create-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.555238693761!2d72.87765591490364!3d19.075983887084902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6307df6a4a9%3A0x8df6f8f95c3c3b13!2sMumbai%20Central!5e0!3m2!1sen!2sin!4v1683382145781!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </section>

  <script>
    // Toggle Menu
    function toggleMenu() {
      document.getElementById("menu").classList.toggle("active");
    }

    // Scroll Animation
    const animatedElements = document.querySelectorAll('.card, .create-text, .create-map');
    const observer = new IntersectionObserver(entries => {
      entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
          setTimeout(() => entry.target.classList.add('show'), index * 150);
        }
      });
    }, { threshold: 0.2 });

    animatedElements.forEach(el => observer.observe(el));

    
  </script>
</body>
</html>
