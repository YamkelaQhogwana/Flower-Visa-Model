<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>
<section class="about">
   <div class="row">
      <div class="image">
         <img src="images/contact.gif" alt="">
      </div>

      <div class="content">
         <h3>SHOP WITH FLOWER VISA</h3>
         <p>Discover a world of fashion, beauty, and creativity at FlowerVisa on Joburg's Small Street. From stylish clothing and vibrant makeup to stunning wigs, our boutique offers a carefully curated selection to enhance your unique style and express your inner beauty. Step into FlowerVisa and experience exceptional customer service and a delightful shopping experience that will leave you feeling confident and inspired.</p>
         <a href="contact.php" class="btn">CONTACT US- (MAKE SURE YOURE LOGGED IN FIRST)</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">HEAR FROM OUR HAPPY SHOPPERS!</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="images/pic-1.png" alt="">
         <p>FlowerVisa is my go-to boutique for all things fashion and beauty! The clothing selection is trendy and diverse, with something for every occasion. The makeup collection is top-notch, and the staff is incredibly knowledgeable and helpful. I always leave feeling fabulous and inspired!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Zac Jane</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-2.png" alt="">
         <p>I can't recommend FlowerVisa enough! The wigs they offer are of exceptional quality and come in a wide variety of styles and colors. The staff is so friendly and always ready to assist with finding the perfect wig to suit my needs. It's my one-stop shop for all my wig-related needs.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lilly James</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-3.png" alt="">
         <p>FlowerVisa is a hidden gem on jOUTGs small street. The clothing collection is curated with great taste, offering unique and stylish pieces. The makeup selection is extensive, and I love how they carry both popular and niche brands. It's a must-visit for fashion and beauty enthusiasts!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Marc Visa</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-4.png" alt="">
         <p>I recently discovered FlowerVisa, and I'm blown away by their attention to detail and exceptional customer service. The staff takes the time to understand my preferences and helps me put together stunning outfits. Their makeup recommendations have been spot on, and the wigs are fantastic. It's become my favorite boutique!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lilly Vuran</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-5.png" alt="">
         <p>FlowerVisa has become my secret weapon for special occasions. The clothing options are so elegant and sophisticated, and I always receive compliments when I wear their pieces. Their makeup selection has everything I need to create a glamorous look, and the wigs add that extra touch of magic. Love this place</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Neo Nadine</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-6.png" alt="">
         <p>FlowerVisa has completely transformed my style game. The clothing options are stylish, trendy, and affordable. Their makeup collection is impressive, and the staff's expertise in suggesting the perfect shades and products is unmatched. I also adore their wig collection, which allows me to experiment with different looks effortlessly. Highly recommended!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Mandy Moore</h3>
      </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>


<!--EMBEDDED JS SCRIPTS AND COMPONENT INCLUSION-->
<?php include 'components/footer.php'; ?>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>
</body>
</html>