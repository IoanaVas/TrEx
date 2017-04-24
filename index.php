<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Expense Tracker</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>



<body background="career-1738216_1280.jpg">
  <script src="js/index.js"></script>
    <div class="login-page">
  <div class="form">
  
    <form class="login-form"  name="myForm"  role = "form" 
               action = "login.php" onclick="return validateForm()"  method = "post">
      <input type="text" placeholder="username" name="fname" required/>
      <input type="password" name="pass" placeholder="password" required/>
      <button>login</button>
     
    </form>
       <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
  </div>
</div>
  
</body>
</html>
