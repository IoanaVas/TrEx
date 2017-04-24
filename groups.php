
<!DOCTYPE html>
<html>

    
    <head>
  <meta charset="UTF-8">
  <title>Expense Tracker</title>

      <link rel="stylesheet" href="css/login.css">
      <link rel="stylesheet" href="css/expenses.css">
      
  
</head>
    

<body background="groups.png">
 
     
  
   
  <div class="topnav" id="myTopnav">
      <a href="login.php"> Profile </a>
      <a href="groups.php">Groups</a>
      <a href="expenses.php">Expenses</a>
      <a href="reports.php">Reports</a>
       <div class="right">
         <a href="index.php">Sign Out</a>
      </div>
  </div>
    
    <br>
    <br>
    <button> Create Group </button>
   <table class ="green" align="left" border="3" color >

       <br>
       <br>
  <tr>
    <th>Your Groups</th>
    <th> Options </th>
  </tr>
  <tr>
    <td>Family</td>
    <td>
        <button onclick="tableCreate(); this.onclick=null;">Show</button>
        &nbsp;
        <a href="groups.php">
             <button>Hide</button>
        </a>
       
         
         
    </td>
  </tr>
   <tr>
    <td>Friends</td>
    <td>
     <button onclick="tableCreate(); this.onclick=null;">Show</button>
        &nbsp;
           <a href="groups.php">
             <button>Hide</button>
        </a>
       
        &nbsp;
        <button> Manage </button>
    </td>
  </tr>
   <tr>
    <td>Coleagues</td>
    <td>
        <button  onclick="tableCreate(); this.onclick=null;">Show</button>
        &nbsp;
           <a href="groups.php">
             <button>Hide</button>
        </a>
       
        &nbsp;
       
    </td>
        
  </tr>

</table>
    
  
    
   

    
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
            var cell4 = row.insertCell(3);
            var things = ["Chocolate", "Milk", "Bread", "Soap", "Watch", "Coke", "Perfume", "Perfume"];
            var users = ["Ioana12", "BogdanD", "CostelNicusor", "AnaMaria1", "DanD", "MateiL", "IoanaV", "Korodescu",
            "MatcoV", "admin", "Monica22", "Ioana12" ] ;
            var dimension ;

            cell1.innerHTML = "User";
            cell2.innerHTML = "Expense";
            cell3.innerHTML = "Cost";
            cell4.innerHTML = "Date";
            dimension = things.length;

            for(var i = 1; i < 12; i++)
            {
              row = table.insertRow(i);
              cell1 = row.insertCell(0);
              cell2 = row.insertCell(1);
              cell3 = row.insertCell(2);
              cell4 = row.insertCell(3);

              
              cell1.innerHTML = users[Math.floor(Math.random() * users.length) ];

              position = Math.floor(Math.random() *dimension);
              cell2.innerHTML = things[position];

           
              cell3.innerHTML =  Math.floor(Math.random() *100);

             
              cell4.innerHTML = (Math.floor(Math.random() *30) + 1 ) + "/" + ( Math.floor(Math.random() *3) + 1 ) + "/2017" ;

            }
           
       }
    </script>
    
    
</body> 

</html>