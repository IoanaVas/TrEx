
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
        <h2 class="page-title">Choose a report</h2>
        <div class="page-content">
    <div id="list5">
  <ul>
            <li>Monthly report  &nbsp;   <button id="button2" onclick="tableCreate(); this.onclick=null;">Show</button>
            </li>
            <li>Groups report  &nbsp; &nbsp; <button id="button2" onclick="tableCreate(); this.onclick=null;">Show</button> 
            </li>
            <li>Report based on a characteristic  <button id="button2" onclick="tableCreate(); this.onclick=null;">Show</button>
                 </li>
            <li>Average cost of expenses &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <button  id="button2" onclick="tableCreate(); this.onclick=null;">Show</button>
                </li>
  </ul>
        <a href="reports.php">
          <button id="button1">Hide</button>
         </a>
</div>
  
 
     
     <p id="familie"> </p>
    <br>
   
  
     
    <table id="imagetable">
      
    </table>
        </div>
      
    <script>
      var contor=0;
       function tableCreate()
       {
           contor++;
           if ( contor == 2 )
           {
               contor = 0 ;
               location.reload();
           }
            document.getElementById("familie").innerHTML = ".";
            var table = document.getElementById("imagetable");
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var things = ["Chocolate", "Milk", "Bread", "Soap", "Watch", "Coke", "Perfume", "Perfume"];
           
            var dimension ;

           
            cell1.innerHTML = "Expense";
           
            cell2.innerHTML = "Cost";
            cell3.innerHTML = "Date";
            cell1.style.fontStyle="italic";
            cell2.style.fontStyle="italic";
            cell3.style.fontStyle="italic";
            dimension = things.length;

            for(var i = 1; i < 9; i++)
            {
              row = table.insertRow(i);
              cell1 = row.insertCell(0);
              cell2 = row.insertCell(1);
              cell3 = row.insertCell(2);
            

              
            

              position = Math.floor(Math.random() *dimension);
              cell1.innerHTML = things[position];

           
              cell2.innerHTML =  Math.floor(Math.random() *100);

             
              cell3.innerHTML = i + "/" + "04" + "/2017" ;

            }
           
       }
    </script>
    
    
</body> 

</html>