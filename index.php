<?php
include 'components/connect.php';
session_start();
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
include 'components/wishlist_cart.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FlowerVisa | Shopping Made Easy</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">
<section class="home">
   <div class="swiper home-slider">
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-img-1.jpg" alt="">
         </div>
         <div class="content">
            <span>UP T0 60% OFF</span>
            <h3>LUXE WINTER COATS</h3>
            <a href="shop.php" class="btn">SHOP NOW</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-img-2.jpg" alt="">
         </div>
         <div class="content">
            <span>UP TO 30% OFF</span>
            <h3>CUSTOM BOOTS AND HEELS</h3>
            <a href="shop.php" class="btn">SHOP NOW</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home-img-3.jpg" alt="">
         </div>
         <div class="content">
            <span>UP TO 50% OFF</span>
            <h3>MAKEUP AND ACSESSORIES</h3>
            <a href="shop.php" class="btn">SHOP NOW</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category">
   <h1 class="heading">SHOP BY CATEGORY</h1>
   <div class="swiper category-slider">
   <div class="swiper-wrapper">
   <a href="category.php?category=boots" class="swiper-slide slide">
      <img src="images/boots.png" alt="">
      <h3>BOOTS</h3>
   </a>

   <a href="category.php?category=handbag" class="swiper-slide slide">
      <img src="images/handbag.png" alt="">
      <h3>HANDBAGS</h3>
   </a>

   <a href="category.php?category=dress" class="swiper-slide slide">
      <img src="images/dress.png" alt="">
      <h3>DRESSES</h3>
   </a>

   <a href="category.php?category=makeup" class="swiper-slide slide">
      <img src="images/make-up.png" alt="">
      <h3>MAKEUP</h3>
   </a>

   <a href="category.php?category=heels" class="swiper-slide slide">
      <img src="images/shoe.png" alt="">
      <h3>HEELS</h3>
   </a>

   <a href="category.php?category=denim" class="swiper-slide slide">
      <img src="images/denim-jacket.png" alt="">
      <h3>DENIM</h3>
   </a>

   <a href="category.php?category=wig" class="swiper-slide slide">
      <img src="images/wig.png" alt="">
      <h3>WIGS</h3>
   </a>

   <a href="category.php?category=coat" class="swiper-slide slide">
      <img src="images/trench-coat.png" alt="">
      <h3>CUSTOM COATS</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="home-products">

   <h1 class="heading">latest products</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>R</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>