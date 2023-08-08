<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">

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
    <!-- Self Reloading a page -->
    <meta http-equiv="refresh" content="10000">
  <!-- Other meta tags and CSS styles here -->
  <title>Astral Online Business Shop:Cart</title>
</head>

<body>
  <!--This is the header/ banner section of the web page-->
  <header>
    <img src="image/banner.jpg" alt="onlinebusiness Banner gif" />
  </header>

    <!--This is the navigation bar for the web site-->
    <nav>
          <ul>                       
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
          <li><a href="shop.php">Shop</a></li>
           <li><a href="update.php">Account Update</a></li>
           <li><a href="logout.php">log out</a></li>
          </ul>
        </nav>




  <aside>
    <table>
       <tr>
          <td></td>
          <td><h1>Shopping Cart</h1></td>
          <td></td>
        </tr>
      <tr>
     

      </tr>

  </form>
  </table>
  </aside>








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





















































