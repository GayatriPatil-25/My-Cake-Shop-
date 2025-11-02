<?php
session_start();

// Initialize cart if not set
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

// Add to cart functionality
if(isset($_POST['add_to_cart'])){
    $name = $_POST['cake_name'];
    $price = (int)$_POST['cake_price'];

    // Check if cake already in cart
    $found = false;
    foreach($_SESSION['cart'] as &$item){
        if($item['name'] === $name){
            $item['qty'] += 1;
            $found = true;
            break;
        }
    }
    if(!$found){
        $_SESSION['cart'][] = ['name'=>$name, 'price'=>$price, 'qty'=>1];
    }
    header("Location: ".$_SERVER['PHP_SELF']); // prevent form resubmission
    exit();
}

// Remove from cart
if(isset($_GET['remove'])){
    $removeName = $_GET['remove'];
    foreach($_SESSION['cart'] as $key => $item){
        if($item['name'] === $removeName){
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Our Cake Collection | Cake Heaven</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
<style>
:root {
  --peach: #ffe9e3;
  --cream: #fffaf5;
  --brown: #6d4c41;
  --pink: #f7a8a8;
  --white: #fff;
  --shadow: 0 4px 20px rgba(0,0,0,0.08);
}
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'Montserrat', sans-serif; background:var(--cream); color:var(--brown); line-height:1.6; scroll-behavior:smooth; }

/* NAVBAR */
nav { position:fixed; top:0; left:0; right:0; background:var(--white); display:flex; justify-content:space-between; align-items:center; padding:clamp(10px,2vw,15px) clamp(15px,5vw,30px); box-shadow:0 2px 6px rgba(0,0,0,0.05); z-index:1000; flex-wrap:wrap; }
nav .logo { font-family:'Playfair Display', serif; font-size:clamp(1.5rem,4vw,1.8rem); color:black; }
nav .logo:hover { color:#e96443; }
nav ul { display:flex; gap:clamp(15px,4vw,25px); list-style:none; justify-content:flex-end; flex-wrap:wrap; }
nav ul li a { text-decoration:none; color:var(--brown); font-weight:600; padding:8px 0; transition:color 0.3s; white-space:nowrap; display:block; }
nav ul li a:hover { color:#e96443; } 
.btn-links { padding:clamp(8px,2vw,12px) clamp(16px,4vw,24px); background:linear-gradient(135deg,#e97659,#feb47b); color:#fff; text-decoration:none; border-radius:25px; font-weight:600; cursor:pointer; transition:all 0.3s ease; }
.btn-links:hover { background:linear-gradient(135deg,#e96443,#dbaa4f); color:black; transform:translateY(-3px); }

/* Hamburger */
.hamburger { display:none; flex-direction:column; gap:5px; cursor:pointer; }
.hamburger span { width:25px; height:3px; background:var(--brown); border-radius:2px; transition:0.3s; }
.hamburger.active span:nth-child(1){ transform:rotate(45deg) translate(5px,5px); }
.hamburger.active span:nth-child(2){ opacity:0; }
.hamburger.active span:nth-child(3){ transform:rotate(-45deg) translate(5px,-5px); }
@media(max-width:768px){
  nav ul { position:absolute; top:60px; right:0; background: var(--white); flex-direction: column; width:70%; max-width:250px; display:none; padding:20px; gap:15px; box-shadow:0 5px 15px rgba(0,0,0,0.1); }
  nav ul.active{ display:flex; }
  .hamburger{display:flex;}
}

/* HERO */
.hero { position:relative; min-height:85vh; background:url('home1.jpg') center/cover no-repeat; display:flex; justify-content:center; align-items:center; flex-direction:column; text-align:center; padding:0 20px; }
.hero::before { content:""; position:absolute; inset:0; background:rgba(0,0,0,0.55); z-index:0; }
.hero h1, .hero p, .hero .btn { position:relative; z-index:1; opacity:0; transform:translateY(30px); transition: all 0.8s ease-out; }
.hero h1 { font-size: clamp(2rem,6vw,3.5rem); margin-bottom:20px; color:#fff; }
.hero p { max-width:750px; font-size: clamp(1rem,2.5vw,1.2rem); margin-bottom:30px; color:#fff; }
.hero .btn { background:#e96443; color:#fff; padding:12px 28px; border-radius:16px; font-weight:600; text-decoration:none; transition:0.3s; }
.hero .btn:hover { background:#ec9034; }

/* SECTION HEADING */
.section-heading { text-align:center; margin:60px 20px 30px; opacity:0; transform:translateY(30px); transition: all 0.8s ease-out; }
.section-heading h2 { font-size: clamp(1.8rem,4vw,2.2rem); color:black; margin-bottom:15px;}
.section-heading p { max-width:700px; margin:0 auto; color:#555; font-weight:bold;}

/* FILTERS */
.filters { text-align:center; margin-bottom:40px; opacity:0; transform:translateY(30px); transition: all 0.8s ease-out; }
.filter-btn { background:#fff; border:2px solid #d4a373; color: var(--brown); padding:8px 18px; margin:5px; border-radius:20px; cursor:pointer; font-weight:600; transition:0.3s; }
.filter-btn:hover, .filter-btn.active { background:#e96443; color:white; }

/* CAKE CARDS */
.cake-collection { max-width:1200px; margin:0 auto; padding:40px 20px 80px; display:grid; grid-template-columns: repeat(auto-fit, minmax(280px,1fr)); gap:30px; }
.cake-card { background: var(--white); border-radius:16px; box-shadow: var(--shadow); overflow:hidden; display:flex; flex-direction:column; opacity:0; transform:translateY(30px); transition:all 0.8s ease-out; position:relative; }
.cake-card:hover { transform: translateY(-5px); }
.cake-card img { width:100%; height:220px; object-fit:cover; }
.cake-info { padding:20px; flex-grow:1; display:flex; flex-direction:column; }
.cake-info h3 { font-size:1.3rem; margin-bottom:6px; color:black; }
.cake-info .flavour { font-size:0.9rem; font-weight:600; color:#d35400; margin-bottom:8px; }
.cake-info .desc { font-size:0.95rem; color:#555; margin-bottom:15px; }
.bottom-row { margin-top:auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px; }
.price { font-size:1.1rem; font-weight:700; color:black; }

/* Buttons */
.buttons { display:flex; gap:10px; }
.btn-order, .btn-learn, .btn-addcart { padding:8px 16px; border-radius:8px; font-size:0.9rem; font-weight:600; text-decoration:none; transition:0.3s; }
.btn-order { background:#f57150; color:white; } .btn-order:hover{background:#e09d59;}
.btn-learn { border:1px solid grey; color:grey; background: var(--white);} .btn-learn:hover{background:#d4a373;color:black;}

/* Add to cart icon style */
.btn-addcart { background:#e96443; color:white; border:none; cursor:pointer; font-size:1.2rem; width:45px; height:45px; display:flex; align-items:center; justify-content:center; border-radius:50%; transition:0.3s; }
.btn-addcart:hover{background:#d35400; transform:scale(1.1);}

/* Heart/Favorite */
.favorite { position: absolute; top: 15px; right: 15px; font-size: 1.5rem; color: #ccc; cursor: pointer; z-index: 2; transition: color 0.3s, transform 0.3s; }
.favorite:hover { color: #e96443; transform: scale(1.2); }

/* FOOTER */
footer { background:linear-gradient(135deg, #e96443, #dbaa4f);; color: var(--cream); padding:60px 20px 30px; margin-top:50px; opacity:0; transform:translateY(30px); transition:all 0.8s ease-out;}
.footer-container { max-width:1200px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:40px; text-align:center; }
footer h3 { font-size:clamp(1.1rem,3vw,1.3rem); margin-bottom:15px; color:black;}
footer p, .footer-links a { font-size:clamp(0.85rem,2.5vw,0.95rem); }
.footer-links ul { list-style:none; padding:0; } .footer-links li { margin-bottom:10px;}
.footer-links a { color: rgb(75,43,11); text-decoration:none; transition:color 0.3s; }
.footer-links a:hover{color:var(--brown); font-weight:bold;}
.footer-contact a { color: var(--brown); text-decoration:none; font-weight:bold;}
.footer-contact a:hover{text-decoration:underline;}
.footer-bottom { margin-top:40px; padding-top:20px; font-size:0.9rem; color:black; border-top:1px solid #e4dcd4; }

/* SCROLL SHOW CLASS */
.show{opacity:1!important; transform:translateY(0)!important;}

/* Modal styles */
.modal { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6); justify-content: center; align-items: center; z-index: 2000; }
.modal-content { background: var(--white); padding: 30px; border-radius: 16px; max-width: 700px; width: 90%; text-align: center; position: relative; animation: fadeIn 0.4s ease; }
@keyframes fadeIn { from { opacity: 0; transform: translateY(-20px);} to { opacity: 1; transform: translateY(0);} }
.modal img { width: 100%; height: 300px; object-fit: cover; border-radius: 10px; margin-bottom: 10px; }
.modal-close { position: absolute; top: 10px; right: 20px; font-size: 1.8rem; color: #555; cursor: pointer; }
.modal-nav { display: flex; justify-content: space-between; margin-top: 15px; }
.modal-nav button { background: #e96443; color: white; border: none; padding: 10px 16px; border-radius: 8px; cursor: pointer; font-weight: 600; }
.modal-nav button:hover { background: #d35400; }

@media(max-width:992px){.hero h1{font-size:2.5rem}.hero p{font-size:1.1rem;} }
@media(max-width:576px){.hero{min-height:70vh}.hero h1{font-size:1.7rem}.cake-card img{height:180px}.buttons{flex-direction:column;width:100%}.buttons a, .buttons button{flex:1;text-align:center;} }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav>
  <div class="logo">** CakeHeaven **</div>
  <div class="hamburger" onclick="toggleMenu()"><span></span><span></span><span></span></div>
  <ul id="menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="About.php">About</a></li>
    <li><a href="My cakes.php">Menu</a></li>
    <li><a href="order.php">Orders</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="gallery.html" class="btn-links">Add your Cake</a></li>
    <li><a href="auth.php" class="btn-links">Login/SignUp</a></li>
    <li><a href="#" class="btn-links" onclick="openCart()">Cart 🛒 (<?= count($_SESSION['cart']); ?>)</a></li>
  </ul>
</nav>

<!-- HERO -->
<section class="hero">
  <h1>Our Cake Collection</h1>
  <p>Discover our signature creations, crafted with passion and precision. From classics to bold innovations, find the perfect centerpiece for your celebration.</p>
  <a href="#cakes" class="btn">Explore Collection</a>
</section>

<!-- SECTION HEADING -->
<div class="section-heading" id="cakes">
  <h2>Delicious Creations</h2>
  <p>From timeless classics to bold new flavors, our cakes are designed to bring joy to every occasion.</p>
</div>

<!-- FILTERS -->
<div class="filters">
  <button class="filter-btn active" data-filter="all">All</button>
  <button class="filter-btn" data-filter="chocolate">Chocolate</button>
  <button class="filter-btn" data-filter="fruit">Fruit</button>
  <button class="filter-btn" data-filter="vanilla">Vanilla</button>
  <button class="filter-btn" data-filter="fusion">Fusion</button>
</div>

<!-- CAKE COLLECTION -->
<section class="cake-collection">
<?php
// Cake data array
$cakes = [
    ['name'=>'Chocolate Delight','category'=>'chocolate','image'=>'chocolate.jpg','flavour'=>'Dark Chocolate, Cocoa Cream','desc'=>'Decadent chocolate fudge cake with luscious chocolate ganache frosting.','price'=>200],
    ['name'=>'Strawberry Fantasy','category'=>'fruit','image'=>'strawberry-cake.jpg','flavour'=>'Strawberry, Cream','desc'=>'Light sponge cake layered with fresh strawberries and whipped cream.','price'=>180],
    ['name'=>'Vanilla Dream','category'=>'vanilla','image'=>'vanilla dreame.jpg','flavour'=>'Classic Vanilla','desc'=>'Soft and fluffy vanilla sponge topped with smooth vanilla buttercream.','price'=>170],
    ['name'=>'Mango Mania','category'=>'fruit','image'=>'mango.jpg','flavour'=>'Mango, Cream','desc'=>'Tropical mango cake with creamy layers and fresh mango slices.','price'=>210],
    ['name'=>'Fusion Delight','category'=>'fusion','image'=>'fusion.jpg','flavour'=>'Chocolate & Mango Fusion','desc'=>'Bold mix of chocolate and mango layered in a moist sponge cake.','price'=>250],
    ['name'=>'Black Forest','category'=>'chocolate','image'=>'blackforest.jpg','flavour'=>'Chocolate, Cherry','desc'=>'Classic Black Forest cake with cherries and cream layers.','price'=>220],
    ['name'=>'Blueberry Bliss','category'=>'fruit','image'=>'blueberry bliss.jpg','flavour'=>'Blueberry, Vanilla','desc'=>'Vanilla sponge layered with blueberry compote and cream.','price'=>200],
    ['name'=>'Caramel Crunch','category'=>'fusion','image'=>'caramel.jpg','flavour'=>'Caramel, Chocolate','desc'=>'Caramel cake with chocolate layers and crunchy topping.','price'=>230],
    ['name'=>'Lemon Zest','category'=>'vanilla','image'=>'lemon.jpg','flavour'=>'Lemon, Vanilla','desc'=>'Refreshing lemon cake with tangy lemon frosting.','price'=>190],
    ['name'=>'Nutty Chocolate','category'=>'chocolate','image'=>'nutty.jpg','flavour'=>'Chocolate, Nuts','desc'=>'Rich chocolate cake with a nutty crunch and creamy frosting.','price'=>240],
];

foreach($cakes as $cake):
?>
  <div class="cake-card" data-category="<?= $cake['category']; ?>">
    <img src="<?= $cake['image']; ?>" alt="<?= $cake['name']; ?>">
    <div class="favorite">&#10084;</div>
    <div class="cake-info">
      <h3><?= $cake['name']; ?></h3>
      <p class="flavour">Flavours: <?= $cake['flavour']; ?></p>
      <p class="desc"><?= $cake['desc']; ?></p>
      <div class="bottom-row">
        <div class="price"><?= $cake['price']; ?></div>
        <div class="buttons">
          <a href="order.php" class="btn-order">Order Now</a>
          <a href="#" class="btn-learn">Learn More</a>
          <form method="POST" class="add-to-cart-form">
            <input type="hidden" name="cake_name" value="<?= $cake['name']; ?>">
            <input type="hidden" name="cake_price" value="<?= $cake['price']; ?>">
            <button type="submit" name="add_to_cart" class="btn-addcart" title="Add to Cart">🛒</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</section>

<!-- CART MODAL -->
<div id="cartModal" class="modal">
  <div class="modal-content">
    <span class="modal-close" id="cartClose">&times;</span>
    <h2>Your Cart</h2>
    <?php if(!empty($_SESSION['cart'])): ?>
      <ul style="list-style:none; padding:0; margin:20px 0;">
        <?php $total=0; foreach($_SESSION['cart'] as $item): 
            $subtotal = $item['price']*$item['qty']; 
            $total += $subtotal;
        ?>
          <li style="margin-bottom:10px;">
            <?= htmlspecialchars($item['name']); ?> - ₹<?= $item['price']; ?> x <?= $item['qty']; ?>
            <a href="?remove=<?= urlencode($item['name']); ?>" style="color:red;">[Remove]</a>
          </li>
        <?php endforeach; ?>
      </ul>
      <p><b>Total:</b> ₹<?= $total; ?></p>
      <a href="checkout.php" class="btn-links">Checkout</a>
    <?php else: ?>
      <p>Your cart is empty.</p>
    <?php endif; ?>
  </div>
</div>

<!-- FOOTER -->
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
  <div class="footer-bottom">&copy; 2025 Artisan Cakes. All rights reserved.</div>
</footer>

<!-- SCRIPTS -->
<script>
// Hamburger menu
function toggleMenu(){ 
  document.getElementById("menu").classList.toggle("active"); 
  document.querySelector(".hamburger").classList.toggle("active"); 
}

// Filter buttons
const filterButtons = document.querySelectorAll(".filter-btn");
const cakes = document.querySelectorAll(".cake-card");
filterButtons.forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelector(".filter-btn.active").classList.remove("active");
    btn.classList.add("active");
    const filter = btn.getAttribute("data-filter");
    cakes.forEach(cake => {
      cake.style.display = (filter === "all" || cake.getAttribute("data-category") === filter) ? "flex" : "none";
    });
  });
});

// Scroll animation
const faders = document.querySelectorAll('.hero h1, .hero p, .hero .btn, .section-heading, .filters, .cake-card, footer');
const appearOptions = { threshold:0.1, rootMargin:"0px 0px -50px 0px" };
const appearOnScroll = new IntersectionObserver((entries, observer)=>{
  entries.forEach(entry=>{
    if(!entry.isIntersecting) return;
    entry.target.classList.add('show');
    observer.unobserve(entry.target);
  });
}, appearOptions);
faders.forEach(fader=>appearOnScroll.observe(fader));

// Favorite toggle
const favorites = document.querySelectorAll('.favorite');
favorites.forEach(fav => {
  fav.addEventListener('click', () => {
    if(fav.style.color === 'rgb(233, 100, 67)'){
      fav.style.color = '#ccc';
    } else {
      fav.style.color = '#e96443';
    }
  });
});

// Cart Modal
function openCart(){
  document.getElementById('cartModal').style.display = 'flex';
}
document.getElementById('cartClose').addEventListener('click', ()=>{
  document.getElementById('cartModal').style.display = 'none';
});
window.addEventListener('click', e => {
  if(e.target === document.getElementById('cartModal')){
    document.getElementById('cartModal').style.display = 'none';
  }
});
</script>

</body>
</html>
