
<!DOCTYPE html>
<html>

    
    <head>
  <meta charset="UTF-8">
  <title>Expense Tracker</title>

  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/reports.css">
  <link rel="stylesheet" href="css/expenses.css">
 
        
</head>
    

<body>
  
            
  <div class="topnav" id="myTopnav">
      <a href="login.php"> Profile </a>
      <a href="groups.php">Groups</a>
      <a href="expenses.php">Expenses</a>
      <a href="reports.php">Reports</a>
        <div class="right">
         <a href="index.php">Sign Out</a>
      </div>
  </div>

    
   
   
    
  
         <div class="login-page">
 <div class="wrapper">
     <br>
     <br>
        <button onclick="tableCreate(); this.onclick=null;">Raport Lunar Personal</button>
      
     <br>
 
     <br>
      <button>Raport pe grup</button>
      
      
      <br>
     <br>
      <button>Raport in functie de medii(varsta, zona) </button>
      
    
     <br>
     <br>
      <button>Costul mediu al produselor</button>
     
   
     
  </div>
</div>
     
     <p id="familie"> </p>
    <br>
    <br>
    <br>
  
     
    <table id="myTable">
        <br>
    </table>
    
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
            var table = document.getElementById("myTable");
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var things = ["Chocolate", "Milk", "Bread", "Soap", "Watch", "Coke", "Perfume", "Perfume"];
            var users = ["Ioana12", "BogdanD", "CostelNicusor", "AnaMaria1", "DanD", "MateiL", "IoanaV", "Korodescu",
            "MatcoV", "admin", "Monica22", "Ioana12" ] ;
            var dimension ;

           
            cell1.innerHTML = "Expense";
            cell2.innerHTML = "Cost";
            cell3.innerHTML = "Date";
            dimension = things.length;

            for(var i = 1; i < 12; i++)
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