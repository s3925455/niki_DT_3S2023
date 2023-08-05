<?php
// Start the session
session_start();

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();
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
    <title>Astral Online Business Login</title>
    <!-- Self Reloading a page -->
    <meta http-equiv="refresh" content="600000">

  </head>

  <body>
    <!--This is the header/ banner section of the web page-->
    <header>
    <img src="image/banner.jpg" alt="onlinebusiness Banner gif" />
    </header>
    
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

    <?php
    // define variables and set to empty values
    $usernameErr = $emailErr = "";
    $username = $email = $address = "";

    //input field validation including PREG match with IF statement
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["user_name"])) {
        $usernameErr = "User Name is required";
      } else {
        $username = test_input($_POST["user_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z,]+$/",$username)) {
          $usernameErr = "Only letters allowed";
        }
      }

      // if (empty($_POST["password"])) {
      //   $passwordErr = "Password is required";
      // } else {
      //   $password = test_input($_POST["password"]);
      //   // check if password is well-formed
      //   if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]$/",$password)) {
      //     $passwordErr = "Only letters, numbers, special characters allowed";
      //   }
      // }
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
    ?>

    <!--This is the main section of the web page where most of the information is provided-->
    <!--linked to an email address and provide a range of controls – text boxes, radio buttons etc – to help prompt for and store responses to a relevant survey-->

    <main>
    
        <table class="tableform">
          <tr>
            <th></th>
            <th><h2>Login In</h2></th>
            <th>
            <?php
				// Return current date from the remote server
				$date = date('d-m-y');
				echo "Date: ";
				echo $date;
				?>
            </th>
          </tr>
          <tr>

            <td></td>
            <td></td>
            <td>
 
            </td>
          </tr>
          <tr>
            <td></td>
            
            <td>
            <p><span class="error">* required field</span></p>
              <form method="post" action="">  
              
                Name : <input type="text" name="user_name" required>*
                <br><br>
                Email: <input type="email" name="user_email" required>

                <br><br>

                <br><br>
                <input type="submit" name="submit" value="Submit">  
              </form>

              <!-- <a href="home.php"> student admin</a> -->
            </td>

            <td></td>
          </tr>
          <tr>
          <td></td>
          <td>
            <span class="error"><?php echo $usernameErr;?></span><br>
            <!-- <span class="error"><?php echo $passwordErr;?></span> -->
          </td> 

          <td></td>

          </tr>
        </table>
 
    </main>

    <?php
      // Declare variables 
    
      $servername = "localhost";
      $db1username = "bob";
      $password = "down";
      $dbname = "onlineshop";
      $dbusername='';
      $dbuseremail ='';
      $dbaddress='';
   

      // Connect to MySQL database
      $dbc = mysqli_connect($servername, $db1username, $password, $dbname);

      // Check connection
      if (!$dbc) {
          die("  Connection failed:  " . mysqli_connect_error());
      } else {
        echo "  Connected to database  ";
      }

      // Set encoding to match PHP script encoding
      mysqli_set_charset($dbc, 'utf8');


      // echo "--start to process sq--l";
      $dbtablename = "customers";
      // echo "-user name-";
      echo $username;
      $sql = "SELECT user_name, user_email, user_address FROM $dbtablename where user_name = '$username'";
      $result = mysqli_query($dbc, $sql) or die("Error: " . mysqli_error($dbc));

      $num = mysqli_num_rows($result);
      if ($num == 0) {
          die("  There are no users in your database table ");
      } else {
          // echo " There are $num members in the $tablename table ";
        
        // to extract sql values from the query into variables
          while($row = $result->fetch_assoc()){
            
            // Start Session to broadcast Variables 
            session_start();
            $dbusername = $row["user_name"];
            $dbuseremail = $row["user_email"];
            $dbuseraddress = $row["user_address"];
            $_SESSION['user_name']=$dbusername;
            $_SESSION['user_email']=$dbuseremail;
            $_SESSION['user_address']=$dbuseraddress;

            if($dbusername == $username) {
            header('Location:shop.php');
             }else{ 
            echo "password incorrect";
           }
          }    
      }

    ?>

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
