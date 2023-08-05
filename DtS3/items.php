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
    <title>Astral Online Business Items</title>

  </head>

  <body>
    <!--This is the header/ banner section of the web page-->
    <header>
    <img src="image/banner.jpg" alt="onlinebusiness Banner gif" />
    </header>


    <!-- <?php

      // define variables and set to empty values
      $useridErr = "";
      $userid = "";

      //input field validation including PREG match with IF statement
      if ($_SERVER["REQUEST_METHOD"] == "POST") {


      if (empty($_POST["user_id"])) {
        $useridErr = "Stdent Id is required";
      } else {


        $userid = test_input($_POST["user_id"]);
        // check if suburb only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $userid)) {
          $useridErr = "Only letters/numbers and white space allowed";
        }
      }

    //   if (empty($_POST["user_state"])) {
    //     $stateErr = "State is required";
    //   } else {
    //     $userstate = test_input($_POST["user_state"]);
    //     // check if state only contains letters and whitespace
    //     if (!preg_match("/^[a-zA-Z-' ]*$/", $userstate)) {
    //       $stateErr = "Only letters and white space allowed";
    //     }
    //   }

    //   if (empty($_POST["user_postcode"])) {
    //     $postcodeErr = "Postcode is required";
    //   } else {
    //     $userpostcode = test_input($_POST["user_postcode"]);
    //     // check if postcode only contains numbers
    //     if (!preg_match("/^[0-9]*$/", $userpostcode)) {
    //       $postcodeErr = "Only numbers are allowed";
    //     }
    //   }
    }


   // The function test_input($data) is a common function used for data validation and sanitization in PHP.
   //  It takes a data input as a parameter and performs the following actions:
   // trim($data): This function removes any leading or trailing whitespace from the data. It ensures that there 
   //  are no unnecessary spaces before or after the actual content.
   // stripslashes($data): This function removes any backslashes (\) from the data. It is used to prevent the injection 
   // of unwanted characters, particularly when dealing with data that has been submitted from HTML forms.
   // htmlspecialchars($data): This function converts special characters to their HTML entities. It helps to prevent 
   // cross-site scripting (XSS) attacks by encoding characters that have special meanings in HTML, such as <, >, ", ', 
   // and &. This ensures that the data is displayed correctly in the HTML output and prevents potential security vulnerabilities.

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
    ?> -->
  <!--This is the navigation bar on the web page -->
  <nav>
      <ul>
      <li> <a href="index.php">Home</Details></a></li>
            <li><a href="login.php">Login</a></li>   
            <li><a href="shop.php">Shop</a></li>          
            <li><a href="contact.php">Contact</a></li>
            <li><a href="items.php">Items</a></li>
            <li><a href="search.php">🔍Search</a></li>
        
        <?php
            // //These links below will appear if the user has global admin rights. 
            // //This is desidned by user_name but ideally should be used with a role defined and better to reflect this in the table 
              $user_name = $_SESSION['user_name'];
                // $user_name = "aaa"; 
                if ($user_name === "aaa") {
                  echo '<li><a href="admin_addstudent.php">Add Student</a></li>';
                  echo '<li><a href="admin_deletestudent.php">Delete Student</a></li>';
                  echo '<li><a href="admin_dashboard.php">Admin Dashboard</a></li>';
                  
                 echo "Logged in as admin to view 2 extra links";
                }
            ?>
            
            <li><a href="logout.php">Log off</a></li>
      </ul>
  </nav>


    <!--This is the main section of the web page where most of the information is provided-->
    
    <main>
    
        <table class="table">
          <tr>
            <th></th>
            <th>
            </th>
            <th>
                 <h2>Shopping Cart</h2></th>
            
            
 
    </main>

    

    

  </body>
</html>
