
<!DOCTYPE html>
<html>

    
    <head>
  <meta charset="UTF-8">
  <title>Expense Tracker</title>

      <link rel="stylesheet" href="css/login.css">
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

    
    



    
<table class ="green" align="center" border="3" color >
    <br>
    <br>
    <br>

  <tr>
    <th>Expense</th>
    <th>Cost</th>
    <th>Date</th>
	<th>Type</th>
  </tr>
  <tr>
    <td>Chocolate</td>
    <td>22</td>
    <td>11/01/2017</td>
	<td>Personal</td>
  </tr>
  
  <tr>
    <td>Shoes</td>
    <td>220</td>
    <td>18/01/2017</td>
	<td>Personal</td>
  </tr>
  
  
  <tr>
    <td>Meat</td>
    <td>45</td>
    <td>18/01/2017</td>
	<td>Family</td>
  </tr>
  
  
  <tr>
    <td>Milk</td>
    <td>15</td>
    <td>18/01/2017</td>
	<td>Family</td>
  </tr>
  
  
  <tr>
    <td>Gloves</td>
    <td>56</td>
    <td>22/02/2017</td>
	<td>Personal</td>
  </tr>
  
  <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>
  
   <tr>
    <td>Bread</td>
    <td>8</td>
    <td>22/02/2017</td>
	<td>Family</td>
  </tr>

</table>

  
  
         <div class="login-page">
 <div class="wrapper">
     <br>
     <br>
     <button> Add Expense </button>
     
     
  </div>



<script>
function tableCreate(){
    
    
    
    
    
    var body = document.body,
        tbl  = document.createElement('table');
    tbl.style.width  = '100px';
    tbl.style.border = '1px solid black';

    for(var i = 0; i < 3; i++){
        var tr = tbl.insertRow();
        for(var j = 0; j < 2; j++){
            if(i == 2 && j == 1){
                break;
            } else {
                var td = tr.insertCell();
                td.appendChild(document.createTextNode('Cell'));
                td.style.border = '1px solid black';
                if(i == 1 && j == 1){
                    td.setAttribute('rowSpan', '2');
                }
            }
        }
    }
    body.appendChild(tbl);
}

function activare() {
    document.getElementById('activare').style.cssText = 'background-color: red; color: white; font-size: 44px';
}


</script>

    
    
</body> 

</html>