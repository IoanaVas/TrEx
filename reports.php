
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Expense Tracker</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/expenses.css">
    </head>
    <body class="page reports-page">   
        <div class="topnav" id="myTopnav">
            <a href="login.php"> Profile </a>
            <a href="groups.php">Groups</a>
            <a href="expenses.php">Expenses</a>
            <a href="reports.php">Reports</a>
            <div class="right">
                <a href="logout.php">Sign Out</a>
            </div>
        </div>
       
        <br> <br> <br> <br>
        
       
       <div id="show-all-users">
          <div class="form">
            <form> 
               
                 <select id="report-type" style="width:100%;margin-bottom:15px;">
            <option value="raport_avg_expense_price"> Report_avg_expense_price</option>
            <option value="raport_user"> Report_user </option>
         

          </select>
          <input type="text" id="report-data" placeholder="report data" />
          <select id="show-all-users-type" style="width:100%">
            <option value="json">JSON</option>
            <option value="xml">XML</option>
            <option value="html">HTML</option>
          </select>
          <br/>
                <button style="margin-top:30px;"> Show </button>
                
            </form>
          </div>
        </div>
    
      
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script>
  $(document).ready(function() {
    $('#show-all-users button').on('click', function() {
      var type = $("#show-all-users-type").val();
      var reptype = $("#report-type").val();
      var data = $("#report-data").val();
      $.ajax({
      url: `reports/showAllUsers.php?data=${data}&type=${type}&reptype=${reptype}`,
      method: "GET"
    })
    .done(function(data) {
      window.location.href="reports/results." + type;
    });
    });
    
  })
    </script>
    
    
</body> 

</html>