<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Expense Tracker</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  <style>
body, html {
    height: 100%;
    margin: 0;
}

.bg {
    /* The image used */
    background-image: url("login.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
</head>



<body >
  <script src="js/index.js"></script>
  
  
  <div class="bg">
  
  
  <div class="login-page">
    <div class="form">
  <img src="logo.png" alt="Smiley face" align="middle">
        <form class="login-form"  name="myForm"  role = "form" 
                   action = "login.php" onclick="return validateForm()"  method = "post">
          <input type="text" placeholder="username" name="fname" required/>
          <input type="password" name="pass" placeholder="password" required/>
          <button>login</button>
     
         </form>
       <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
    </div>
</div>
 
  </div>
</body>
</html>
