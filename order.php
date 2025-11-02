<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Custom Cake Inquiry | CakeHeaven</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --cream: #fffaf0;
      --pink: #fce4ec;
      --gold: #d4a373;
      --brown: #6d4c41;
      --white: #ffffff;
      --shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Montserrat', sans-serif;
      background: var(--cream);
      color: var(--brown);
      line-height: 1.6;
      scroll-behavior: smooth;
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
      padding: 15px 30px;
      z-index: 1000;
      flex-wrap: wrap;
    }

    nav .logo {
      font-family: 'Playfair Display', serif;
      font-size: 1.7em;
      color: black;
      flex-grow: 1;
    }
    nav .logo:hover { color: #e96443; }
    nav ul {
      display: flex;
      gap: 25px;
      list-style: none;
      flex-grow: 2;
      justify-content: flex-end;
      flex-wrap: wrap;
    }
    nav ul li a {
      text-decoration: none;
      color: var(--brown);
      font-weight: 600;
      transition: color 0.3s;
      white-space: nowrap;
      display: block;
      padding: 8px 0;
    }
    nav ul li a:hover {
      color: #e96443;
      text-decoration: underline;
      text-decoration-color: black;
      text-decoration-thickness: 2px;
    }
    .btn-links {
      display: inline-block;
      padding: 12px 24px;
      background: linear-gradient(135deg, #e97659, #feb47b);
      color: #fff;
      text-decoration: none;
      border-radius: 25px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      box-shadow: var(--shadow);
      transition: all 0.3s ease;
    }
    .btn-links:hover {
      background: linear-gradient(135deg, #e96443, #dbaa4f);
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
      color: black;
      text-decoration: none;
    }

    /* Hamburger Menu */
    .hamburger {
      display: none;
      flex-direction: column;
      cursor: pointer;
      gap: 5px;
    }
    .hamburger span {
      width: 25px;
      height: 3px;
      background: var(--brown);
      border-radius: 2px;
      transition: 0.3s;
    }
    .hamburger.active span:nth-child(1){ transform: rotate(45deg) translate(5px,5px); }
    .hamburger.active span:nth-child(2){ opacity:0; }
    .hamburger.active span:nth-child(3){ transform: rotate(-45deg) translate(5px,-5px); }

    @media (max-width: 768px) {
      nav ul {
        position: absolute;
        top: 60px;
        right: 0;
        background: var(--white);
        flex-direction: column;
        width: 220px;
        padding: 20px;
        gap: 15px;
        display: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }
      nav ul.active { display: flex; }
      .hamburger { display: flex; }
    }

    /* Hero */
    .hero {
      background:url('home.png') center/cover no-repeat;
      height: 80vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      position: relative;
      padding: 20px;
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease-out;
    }
    .hero.show { opacity:1; transform:translateY(0); }
    .hero::after {
      content: "";
      position: absolute; top:0; left:0; right:0; bottom:0;
      background: rgba(0,0,0,0.45);
      z-index: 1;
    }
    .hero-content { position: relative; z-index: 2; max-width: 700px; }
    .hero h1 { font-family: 'Playfair Display', serif; font-size: clamp(2rem, 5vw, 3.5rem); margin-bottom: 15px; }
    .hero p { font-size: clamp(1rem, 2.5vw, 1.2rem); margin-bottom: 25px; }
    .hero a {
      background: #e96443;
      color: white;
      padding: 12px 24px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s;
      display: inline-block;
    }
    .hero a:hover { background: #b5835a; }

    /* Order Section */
    .order-container {
      max-width: 1200px;
      margin: 80px auto 50px;
      padding: 20px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 30px;
    }
    .order-info {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease-out;
    }
    .order-info.show { opacity:1; transform:translateY(0); }
    .order-info h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      margin-bottom: 20px;
      color: black;
    }
    .order-info p { margin-bottom: 20px; }
    .order-info li { margin-bottom: 10px; }
    .order-info li::before { content: "🎂 "; }

    /* Form */
    form {
      background: var(--white);
      padding: 25px;
      border-radius: 12px;
      box-shadow: var(--shadow);
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease-out;
    }
    form.show { opacity:1; transform:translateY(0); }
    form h3 {
      font-size: 1.5rem;
      margin-bottom: 20px;
      color: black;
      font-family: 'Playfair Display', serif;
    }
    .form-group { margin-bottom: 16px; }
    label { font-weight: 600; display: block; margin-bottom: 6px; }
    input, select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      font-family: inherit;
    }
    textarea { min-height: 100px; resize: vertical; }
    button {
      background: #e96443;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 30px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover { background: #b5835a; }

    /* Success Popup */
    .popup {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.6);
      display: flex;
      justify-content: center;
      align-items: center;
      visibility: hidden;
      opacity: 0;
      transition: 0.3s;
      z-index: 2000;
    }
    .popup.active { visibility: visible; opacity: 1; }
    .popup-content {
      background: var(--white);
      padding: 30px;
      border-radius: 12px;
      text-align: center;
      max-width: 400px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.2);
      animation: zoomIn 0.3s ease;
    }
    .popup-content h2 { color: #27ae60; margin-bottom: 10px; }
    .popup-content p { margin-bottom: 20px; }
    .popup-content button {
      background: #27ae60;
      color: white;
      padding: 10px 20px;
      border-radius: 25px;
      border: none;
      cursor: pointer;
      transition: 0.3s;
    }
    .popup-content button:hover { background: #1e8449; }

    @keyframes zoomIn { from { transform: scale(0.8); opacity: 0; } to { transform: scale(1); opacity: 1; } }

    /* Footer */
    footer {
      background: linear-gradient(135deg, #e96443, #dbaa4f);;
      color: var(--cream);
      padding: 60px 20px 30px;
      margin-top: 50px;
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease-out;
    }
    footer.show { opacity:1; transform:translateY(0); }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
      text-align: center;
    }
    footer h3 { font-size: 1.3rem; margin-bottom: 15px; font-weight: 600; color: black; }
    footer p { font-size: 0.95rem; line-height: 1.6; margin-bottom: 10px; }
    .footer-links ul { list-style: none; padding: 0; }
    .footer-links li { margin-bottom: 10px; }
    .footer-links a { color: rgb(75, 43, 11); text-decoration: none; font-size: 0.95rem; transition: color 0.3s; }
    .footer-links a:hover { color: var(--brown); font-weight: bolder; }
    .footer-contact a { color: var(--brown); text-decoration: none; font-weight: bold; }
    .footer-contact a:hover { text-decoration: underline; }
    .footer-bottom { text-align: center; border-top: 1px solid #e4dcd4; margin-top: 40px; padding-top: 20px; font-size: 0.9rem; color: black; }

    @media (max-width: 992px) { .order-container { grid-template-columns: 1fr; } }
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
<section class="hero">
  <div class="hero-content">
    <h1>Create Your Dream Cake</h1>
    <p>From weddings to birthdays, we design cakes as unique as your celebrations.</p>
    <a href="#inquiry-form">Start Your Order</a>
  </div>
</section>

<section class="order-container" id="inquiry-form">
  <div class="order-info">
    <h2>Why Choose a Custom Cake?</h2>
    <p>Every celebration deserves a centerpiece as unique as the occasion itself. Share your vision, and our cake artists will craft a masterpiece that delights both eyes and taste buds.</p>
    <ul>
      <li>Perfect for Weddings & Engagements</li>
      <li>Fun & Creative Birthday Cakes</li>
      <li>Elegant Anniversary Designs</li>
      <li>Corporate & Special Events</li>
      <li>Baby Showers & More</l             i>
    </ul>
  </div>

  <form id="cakeForm" action="submit_order.php" method="POST" enctype="multipart/form-data">
  <h3>Custom Order Inquiry</h3>

  <div class="form-group">
    <label for="name">Full Name *</label>
    <input type="text" id="name" name="name" required>
  </div>

  <div class="form-group">
    <label for="email">Email Address *</label>
    <input type="email" id="email" name="email" required>
  </div>

  <div class="form-group">
    <label for="phone">Phone Number *</label>
    <input type="tel" id="phone" name="phone" required>
  </div>

  <div class="form-group">
    <label for="occasion">Occasion *</label>
    <select id="occasion" name="occasion" required>
      <option value="">Select an occasion</option>
      <option>Birthday</option>
      <option>Wedding</option>
      <option>Anniversary</option>
      <option>Baby Shower</option>
      <option>Corporate</option>
      <option>Other</option>
    </select>
  </div>

  <div class="form-group">
    <label for="size">Cake Size *</label>
    <select id="size" name="size" required>
      <option value="">Select a size</option>
      <option>Small (6-inch)</option>
      <option>Medium (8-inch)</option>
      <option>Large (10-inch)</option>
      <option>Multi-Tier</option>
    </select>
  </div>

  <div class="form-group">
    <label for="flavor">Preferred Flavor</label>
    <input type="text" id="flavor" name="flavor" placeholder="Chocolate, Vanilla, Red Velvet...">
  </div>

  <div class="form-group">
    <label for="date">Delivery Date *</label>
    <input type="date" id="date" name="date" required>
  </div>

  <div class="form-group">
    <label for="design">Upload Inspiration (Optional)</label>
    <input type="file" id="design" name="design" accept="image/*">
  </div>

  <div class="form-group">
    <label for="message">Additional Details</label>
    <textarea id="message" name="message" placeholder="Tell us more about your dream cake..."></textarea>
  </div>

  <button type="submit">Submit Inquiry</button>
</form>

</section>

<footer>
  <div class="footer-container">
    <div class="footer-about">
      <h3>Artisan Cakes</h3>
      <p>Crafting exceptional custom cakes with the finest ingredients and artistic attention to detail. Every creation tells a unique story.</p>
    </div>
    <div class="footer-links">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="cakes.html">Our Cakes</a></li>
        <li><a href="custom-orders.html">Custom Orders</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </div>
    <div class="footer-contact">
      <h3>Contact Info</h3>
      <p>123 Baker Street<br>Sweet Valley, CA 90210</p>
      <p>Phone: <a href="tel:5551232253">(555) 123-CAKE</a></p>
      <p>Email: <a href="mailto:hello@artisancakes.com">hello@artisancakes.com</a></p>
    </div>
  </div>
  <div class="footer-bottom">&copy; 2024 Artisan Cakes. All rights reserved.</div>
</footer>

<div class="popup" id="successPopup">
  <div class="popup-content">
    <h2>🎉 Success!</h2>
    <p>Your inquiry has been submitted successfully. We’ll get back to you soon.</p>
    <button onclick="closePopup()">OK</button>
  </div>
</div>

<script>
function toggleMenu() {
  document.getElementById("menu").classList.toggle("active");
  document.querySelector(".hamburger").classList.toggle("active");
}

const form = document.getElementById("cakeForm");
const popup = document.getElementById("successPopup");



function closePopup() { popup.classList.remove("active"); }

// Scroll animations
const faders = document.querySelectorAll('.hero, .order-info, form, footer');
const appearOptions = { threshold:0.1, rootMargin:"0px 0px -50px 0px" };
const appearOnScroll = new IntersectionObserver((entries, observer)=>{
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
