<?php

include 'components/connect.php';
session_start();
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass =  $_POST['pass'];

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>LOGIN</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">
   <form action="" method="post">
      <h3>LOGIN</h3>
      <input type="email" name="email" required placeholder="EMAIL" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')"> <!--SECURTIY MEASURE, ESCAPE SPECIAL CHARACHERS USING JS -->
      <input type="password" name="pass" required placeholder="PASSWORD" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')"> <!--SECURTIY MEASURE, ESCAPE SPECIAL CHARACHERS USING JS -->
      <input type="submit" value="LOGIN" class="btn" name="submit">
      <p>NO ACCOUNT?</p>
      <a href="user_register.php" class="option-btn">REGISTER</a>
      <a href="admin/admin_login.php" class="option-btn">ADMIN LOGIN</a>
   </form>
</section>
<?php include 'components/footer.php'; ?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="js/script.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>

<button class="g-recaptcha" 
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit'>SUBMIT</button>

</body>
</html>