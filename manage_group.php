<?php
require './test_connection.php';


session_start();
if ( ! ( isset( $_SESSION['manage_groupid']) )) header('Location: groups.php');
              
$msg = " ";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $myid = $_SESSION['login_id'];
}
?> 
<!DOCTYPE html>
<html>


    <head>
        <meta charset="UTF-8">
        <title>Expense Tracker</title>

        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/expenses.css">
        <link rel="stylesheet" href="css/style.css">
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


    <body background="login.jpg">

        
            
        

        
        <p style="text-align:center;">
            
            Current users in the group are :
            <?php
                        
                        $ses_group_id = $_SESSION['manage_groupid'] ;
                        $result = mysqli_query($db, "SELECT * FROM group_participants");
                        while ($row = mysqli_fetch_array($result))
                        {
                            
                            $group_id = $row['group_id'] ;
                            $user_id = $row['users_id'] ;
                            if ( $group_id == $ses_group_id )
                            {
                               
                                $sql = "SELECT firstname, lastname, username from users WHERE id = '$user_id'";
                                $result2 = mysqli_query($db,$sql);
                                $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                $nickname = $row2['firstname']." '".$row2['username']."' ".$row2['lastname']." ; ";
                              
                                
                                echo $nickname;
                                
                            }
                            
                        }
            
            
            ?>
        
        </p>
        <div  >

            <div class="login-page">

                <div class="form">
                    <form class="login-form"  name="myForm"  role = "form" 
                          action = "manage_group.php"   method = "post">
                        <input type="text" placeholder="Add user by username: " name="add_username"/> 
                        <a href="manage_group.php">
                            <button>Add</button>
                        </a>
                    </form>



                </div>


            </div>



        </div>


        <div class="login-page">

            <div class="form">
                <form class="login-form"  name="myForm"  role = "form" 
                      action = "manage_group.php"   method = "post">
                    <input type="text" placeholder="Kick user by username: " name="kick_username"/> 
                    <a href="manage_group.php">
                        <button> Kick user</button>
                    </a>
                </form>

            </div>


        </div>




        <div class="login-page">

            <div class="form">
                <form class="login-form"  name="myForm"  role = "form" 
                      action = "manage_group.php"   method = "post">
                    <input type="text" placeholder="Description... " name="description"/> 
                   
                        <button> Change group description</button>
                    
                  
                        <button style="background-color: black" onclick='this.form.action="groups.php";'> Back</button>
                   
                </form>

            </div>


        </div>

        

    </body> 

</html>