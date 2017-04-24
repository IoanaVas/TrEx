<?php
 
   ob_start();
   session_start();
   
?>
    
<?php
    
     // echo $_POST['username'];
           
?>

<!DOCTYPE html>
<html>

    
    <head>
  <meta charset="UTF-8">
  <title>Expense Tracker</title>

      <link rel="stylesheet" href="css/login.css">
      

  
</head>
    

<body>
    
    <script>
        function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
        </script>
            
  <div class="topnav" id="myTopnav">
      
      
      <a href="login.php"> Profile </a>
      <a href="groups.php">Groups</a>
      <a href="expenses.php">Expenses</a>
      <a href="reports.php">Reports</a>
      <div class="right">
         <a href="index.php">Sign Out</a>
      </div>
<!--      <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>-->

  </div>
        
        
        
   <div class="container">
    <h1> Hello, admin!</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
       <div >
        <div>
          <img src="profil.jpg" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" id="upload">
        </div>
      </div>
      
      <!-- edit form column -->
     
        <h3>Personal info</h3>
        
        <form>
          <div >
            <label>First name:</label>
            <div>
              <input type="text" value="Diaconu">
            </div>
          </div>
          <div>
            <label>Last name:</label>
            <div>
              <input type="text" value="Dan">
            </div>
          </div>
          <div >
            <label>Place of birth:</label>
            <div>
              <input type="text" value="Iasi">
            </div>
          </div>
          <div >
            <label >Email:</label>
            <div >
              <input type="text" value="diaconudann@gmail.com">
            </div>
          </div>
 
            
       
          <div>
            <label>Password:</label>
            <div >
              <input type="password" value="">
            </div>
          </div>
          <div>
            <label>Confirm new password:</label>
            <div>
              <input type="password" value="">
            </div>
          </div>
            
            <div>
            <label>Confirm new password:</label>
            <div>
              <input type="password" value="">
            </div>
          </div>
            
          <div>
            <label ></label>
            <div>
              <input type="button"  value="Save Changes">
              <span></span>
              <input type="reset"  value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
        
        
        
        
        
        
        
        
        
        
        
<!--        <div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
       left column 
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
       edit form column 
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="Jane">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="Bishop">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Company:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="janesemail@gmail.com">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Time Zone:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control">
                  <option value="Hawaii">(GMT-10:00) Hawaii</option>
                  <option value="Alaska">(GMT-09:00) Alaska</option>
                  <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                  <option value="Arizona">(GMT-07:00) Arizona</option>
                  <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                  <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                  <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                  <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="janeuser">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="11111122333">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="11111122333">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="button" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>-->
</body> 






</html>