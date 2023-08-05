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
    <!--Developer Nikita Munjal of  Narrabundah Home page Website 2023 -->
    <!--***************************************************************-->
    <!-- <link rel="stylesheet" href="css/style1.css">-->
    <link rel="stylesheet" href="css/style2.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Update</title>

  </head>

  <body>
    <!--This is the header/ banner section of the web page-->
    <header>
    <img src="image/banner.jpg" alt="onlinebusiness Banner gif" />
    </header>

    <?php
      // define variables and set to empty values
      $nameErr = $addressErr = $emailErr = "";
      $name = $address = $email = "";

      //input field validation including PREG match with IF statement
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["user_address"])) {
          $addressErr = "Address is required";
        } else {
          $address = test_input($_POST["user_address"]);
          // check if state only contains letters and whitespace
          if (!preg_match("/[A-Za-z0-9\-\\,.]+/", $address)) {
            // "/^[a-zA-Z-' ]*$/"
            // /[A-Za-z0-9\-\\,.]+/
            $addressErr = "Only letters and white space allowed in address";
          }
        }

        if (empty($_POST["user_email"])) {
          $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["user_email"]);
          // check if postcode only contains numbers
          if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
            $emailErr = "Insert email in proper format";
        }
      }
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
  <!--This is the navigation bar on the web page -->
  <nav>
          <ul>
            <li> <a href="shop.php">Shop</Details></a></li>          
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
           <li><a href="logout.php">log out</a></li>
            
          </ul>
        </nav>


    <!--This is the main section of the web page where most of the information is provided-->
    
    <main>
    
        <table class="table">
          <tr>
            <th></th>
            <th><h2>Customer Update</h2></th>
            <th></th>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <!--The sectionform below is for taking input from the user to UPDATE the record-->
          <tr>
            <td></td>     
            <td>
            <p><span class="error">* required field</span></p>
              <form method="post" action="">  
                <table style="text-align: left;">

                <tr>
                <td>Name:</td>
                <td><input type="text" name="user_name" value= "<?= $_SESSION['user_name'] ?>" readonly ></td>
              </tr>

                <tr>
                  <td>Email: </td>
                  <td> <input type="email" name="user_email" value= "<?= $_SESSION['user_email'] ?>">*</td>
                </tr>
              

              
              <tr>
                <td>Address:</td>
                <td><input type="text" name="user_address" value= "<?= $_SESSION['user_address'] ?>" >*</td>
              </tr>
              </table>

                <input type="submit" name="submit" value="Update"> 
              </form>
            </td>

            <td></td>
          </tr>

          <tr>
            <td></td>
            <!--This section displays the Errors generated from the input validation-->
            <td>  
               <span class="error"><?php echo $emailErr ;?></span>  <br>        
              <!-- <span class="error"><?php echo $nameErr;?></span><br> -->
              <span class="error"><?php echo $addressErr ;?></span><br>
             
            </td>
            <td></td>
          </tr>
        </table>
 
    </main>

    <?php
      // // code to turn error reporting on
      // error_reporting(E_ALL);
      // ini_set('display_errors', 1);

      //Declare variables to use for SESSION and writing to the DATABASE


        $servername = "localhost";
        $username = "bob";
        $password = "down";
        $dbname = "onlineshop";
        $name = $_POST['user_name'];
        $address = $_POST['user_address'];
        $email = $_POST['user_email'];

        echo $name;
        echo $email;
        echo $address;

        // Check if the field is mpty then not to insert record in table
        if(!empty($name) && !empty($email) && !empty($address)) {

        // Open conncetion
        $conn = new mysqli($servername, $username, $password, $dbname);
        echo "conn open";
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        // Build SQL and execute
        // UPDATE `customers` SET `user_name`='[value-1]',`user_email`='[value-2]',`user_address`='[value-3]' WHERE 1
        
        $stmt = $conn->prepare("UPDATE customers SET user_email = '$email', user_address = '$address' WHERE user_name = '$name'; ");
        $stmt->execute();

        //Close conncetion
        $stmt->close();
        $conn->close();
      
        //Once completed go to shop.php web page
        header('Location:shop.php');
      }

     
?>


<!--This section displays the information on the web page -->
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
