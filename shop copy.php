<?php
// Start the session
session_start();


// // Clear product description variable 
// unset($_POST['prod_description']);

// Clear entire post
$_POST = array();



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
  <title>Astral Online Business Shop</title>
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
           <li><a href="update.php">Account Update</a></li>
           <li><a href="logout.php">log out</a></li>
          </ul>
        </nav>


  <h2>Select category below:</h2>
  <aside>
  <form id="orderForm" method="post" action="order.php">
    <table style="text-align: left;">

    <tr><td></td><td></td><td>    <?php
              // Return current date from the remote server
              $date = date('d-m-y');
              echo "Date: ";
              echo $date;
              ?></td>

    </tr>
   
      <tr>

          <td><img id="capImage" src="image/cap1.png" alt="click image of cap" width="400" height="400" /><input type="hidden" name="prod_description_cap" value="cap" /></td>

          <td><img id="hoodieImage" src="image/hoodie5.jpg" alt="click image of hoodie" width="400" height="400" /><input type="hidden" name="prod_description_hoodie" value="hoodie" /></td>

          <td><img id="shoeImage" src="image/shoe1.png" alt="click image of shoe" width="400" height="400" /><input type="hidden" name="prod_description_shoe" value="shoe" /></td>

      </tr>
     </table>
  </form>
  </aside>



  <script>
    // Script to submit description value Ref: ChatGpt
    document.getElementById('capImage').addEventListener('click', function() {
      document.getElementById('orderForm').submit();
    });

    document.getElementById('hoodieImage').addEventListener('click', function() {
      document.getElementById('orderForm').submit();
    });
    
    document.getElementById('shoeImage').addEventListener('click', function() {
      document.getElementById('orderForm').submit();
    });
    
  </script>

</body>

</html>





















































