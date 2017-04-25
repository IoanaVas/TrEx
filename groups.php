
<!DOCTYPE html>
<html>

    
    <head>
  <meta charset="UTF-8">
  <title>Expense Tracker</title>

      <link rel="stylesheet" href="css/login.css">
      <link rel="stylesheet" href="css/expenses.css">
      <style>
          body, html {
        height: 100%;
        margin: 0;
}

       .bg {
        /* The image used */
        background-image: url("groups.jpg");

        /* Full height */
        height: 100%; 

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
 


      </style>
  
</head>
    

<body>
 
     
  <div class="bg">
   
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
    
   

    
    
    
    
    <div id="list5">
  <ul>
      <li> Your Groups
         <ol>
            <li>Family  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; <button id="button2" onclick="tableCreate(); this.onclick=null;">Show</button>
              <button id="button2" onclick="tableCreate(); this.onclick=null;">Hide</button></li>
            <li>Friends <span></span> <span class="backspace"></span>&nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; <button id="button2" onclick="tableCreate(); this.onclick=null;">Show</button> 
             <button id="button2" onclick="tableCreate(); this.onclick=null;">Hide</button> <button id="button2" >Manage</button></li></li>
            <li>University <span></span> <span class="backspace2"></span>&nbsp;  &nbsp;  &nbsp; <button id="button2" onclick="tableCreate(); this.onclick=null;">Show</button>
                 <button id="button2" onclick="tableCreate(); this.onclick=null;">Hide</button> </li>
             
         </ol>
  </ul>
        &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;<button id="button1"> Create Group </button>
</div>
    
<!--   <table class ="green" align="left" border="3" color >

       <br>
       <br>
  <tr>
      <th> <font color="white">Your Groups</font></th>
    <th> <font color="white"> Options</font> </th>
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

</table>-->
    
  
    
   

    
     <p id="familie"> </p>

  
  
    <div style="overflow-x:auto;">
    <table id="imagetable" >
        
    </table>
    </div>
  
    
    <div>

       
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
            var cell4 = row.insertCell(3);
            var things = ["Chocolate", "Milk", "Bread", "Soap", "Watch", "Coke", "Perfume", "Perfume"];
            var users = ["Ioana12", "BogdanD", "CostelNicusor", "AnaMaria1", "DanD", "MateiL", "IoanaV", "Korodescu",
            "MatcoV", "admin", "Monica22", "Ioana12" ] ;
            var dimension ;
            
            cell1.innerHTML = "User";
            cell1.style.fontStyle="italic"
           
            cell2.innerHTML = "Expense";
            cell2.style.fontStyle="italic"
            
         
            cell3.innerHTML = "Cost";
            cell3.style.fontStyle="italic"
            
            cell4.innerHTML = "Date";
            cell4.style.fontStyle="italic"
           

            dimension = things.length;

            for(var i = 1; i < 11; i++)
            {
              row = table.insertRow(i);
              cell1 = row.insertCell(0);
              cell2 = row.insertCell(1);
              cell3 = row.insertCell(2);
              cell4 = row.insertCell(3);

              
              cell1.innerHTML = users[Math.floor(Math.random() * users.length) ];

              position = Math.floor(Math.random() *dimension);
              cell2.innerHTML = things[position];

           
              cell3.innerHTML =  Math.floor(Math.random() *100 + 1);

             
              cell4.innerHTML = (Math.floor(Math.random() *30) + 1 ) + "/" + ( Math.floor(Math.random() *3) + 1 ) + "/2017" ;
              
              cell1.style.color = "black" ;
              cell2.style.color = "black" ;
              cell3.style.color = "black" ;
              cell4.style.color = "black" ;

            }
           
       }
    </script>
    
    
</body> 

</html>