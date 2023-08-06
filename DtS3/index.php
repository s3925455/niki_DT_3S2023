
<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<style>
.error {color: #FF0000;}
</style>
  <head>
    <!--***************************************************************-->
    <!--Developer Nikita Munjal of  Astral Website 2023 -->
    <!--***************************************************************-->
    <!-- <link rel="stylesheet" href="css/style1.css">-->
    <link rel="stylesheet" href="css/style2.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="nikita" content="onlinebusiness">
    <meta name="cloths" content="HTML, CSS, PHP">
    <title>Astral Online Business</title>
    <!-- Self Reloading a page -->
    <meta http-equiv="refresh" content="10000">
  </head>

  <body>
    <!--This is the header/ banner section of the web page-->
    <header>
      <img src="image/banner.jpg" alt="onlinebusiness Banner gif" />
    </header>

  <!--This is the navigation bar for the web site-->
    <nav>
          <ul>
            <li> <a href="index.php">Home</Details></a></li>
  
            <!-- <li><a href="shop.php">Shop</a></li>           -->
            
            <!-- <li><a href="items.php">Items</a></li> -->
            <li><a href="login.php">Login</a></li>   
            <li><a href="register.php">Register</a></li>
            
            <?php
            // //These links below will appear if the user has global admin rights. 
            // //This is desidned by user_name but ideally should be used with a role defined and better to reflect this in the table 
              $user_name = $_SESSION['user_name'];
                // $user_name = "aaa"; 
                if ($user_name === "aaa") {
                  echo '<li><a href="addproduct.php">Add Product</a></li>';
                  echo '<li><a href="admin_dashboard.php">Admin Dashboard</a></li>';
                 echo "Logged in as admin to view 2 extra links";
                }
            ?>
           <li><a href="contact.php">Contact</a></li>
            
          </ul>
        </nav>

    <!--This is the main section of the web page where most of the information is provided-->
    <!--linked to an email address and provide a range of controls – text boxes, radio buttons etc – to help prompt for and store responses to a relevant survey-->

    <main>
    
        <table class="tableform">
          <tr>
            <th></th>
            <th><h1>Welcome to Astral Wear</h1><hr></th>
            <th>

            <?php
              // Return current date from the remote server
              $date = date('d-m-y');
              echo "Date: ";
              echo $date;

              $user_id = $_SESSION['user_id'];
              $user_first = $_SESSION['user_first'];
              $user_last = $_SESSION['user_last'];

              ?>
            </th>
          </tr>
          <tr>
            <td><img src="image/hoodie4.jpg" alt="image of hoodie4"/></td>
            <td>
            <img src="image/hoodie2.jpg" alt="image of hoodie2"/>
            </td>

            <td>
              <img src="image/hoodie1.jpg" alt="image of hoodie1"/>
            
                
            </td>
          </tr>
        </table>

    </main>


<!--This is the debug area to see variables and vaules -->
    <aside id="debug">
      <hr>
      <h3>Debug Area</h3>
      <pre>
        GET Contains:
        <?php print_r($_GET) ?>
        POST Contains:
        <?php print_r($_POST) ?>
        SESSION Contains:
        <?php print_r($_SESSION) ?>
        <?php clearButton(); ?>
      </pre>
      <hr>
      <h3>Code Area</h3>
        <?php //debugModule() ?>
        <?php printMyCode() ?>
    </aside>
   

  </body>
</html>
