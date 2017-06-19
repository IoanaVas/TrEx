
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Expense Tracker</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/expenses.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
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


        <br> <br>
        <h2 class="page-title"> Filter your expenses by  </h2>
        <br> <br>
        <div style="display:inline-block; vertical-align: middle; margin-left:620px">

            <button onclick="location.href = 'expenses_filter.php?id=1&opt=1'">Cost Asc</button> &nbsp;
            <button onclick="location.href = 'expenses_filter.php?id=1&opt=2'">Cost Desc</button> &nbsp;
            <button onclick="location.href = 'expenses_filter.php?id=2&opt=1'">Name Asc</button> &nbsp; 
            <button onclick="location.href = 'expenses_filter.php?id=2&opt=2'">Name Desc</button> &nbsp; 
            <button onclick="location.href = 'expenses_filter.php?id=3&opt=1'">Date Asc</button>  &nbsp; 
            <button onclick="location.href = 'expenses_filter.php?id=3&opt=2'">Date Desc</button>

        </div>
        <br> <br>
        <h2 class="page-title"> Your Expenses between 2 dates </h2>
        <br> <br>
        
        <div class="form">
                    <form class="login-form"  name="myForm"  role = "form" 
                          action = "expenses_filter_dates.php"   method = "get">
                        <input type="Date" placeholder="Start date " name="start" required/> 
                        <input type="Date" placeholder="End date " name="end" required/> 
                        <button> Submit</button>
                    </form>
                </div>
        
        
        
        
        <h2 class="page-title">Choose a report</h2>

        <br> <br> 

        <div style="text-align:center">
            <div id="show-all-users">



                <select id="report-type" style="width:30%;margin-bottom:15px;">
                    <option value="raport_avg_expense_price"> Report_avg_expense_price</option>
                    <option value="raport_user"> Report_user </option>
                     <option value="raport_place"> Report_place </option>


                </select>
                <br>
                <input type="text" id="report-data" placeholder="report data"  size="77" width="700"/>

                <br>  <br>  
                <select id="show-all-users-type" style="width:30%">
                    <option value="json">JSON</option>
                    <option value="xml">XML</option>
                    <option value="html">HTML</option>
                </select>
                <br/> 
                <button style="margin-top:30px;"> Show </button>


            </div>

        </div>
        
        <br> <br> <br>
         <h2 class="page-title"> See all the users of the website </h2>
         
         
          <button onclick="location.href = 'print_users.php'  " style="margin-left:915px"> Users </button> 
          
          <br> <br>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

        <script>
                $(document).ready(function () {
                    $('#show-all-users button').on('click', function () {
                        var type = $("#show-all-users-type").val();
                        var reptype = $("#report-type").val();
                        var data = $("#report-data").val();
                        $.ajax({
                            url: `reports/showAllUsers.php?data=${data}&type=${type}&reptype=${reptype}`,
                            method: "GET"
                        })
                                .done(function (data) {
                                    window.location.href = "reports/results." + type;
                                });
                    });

                })
        </script>


    </body> 

</html>

