<?php 
    include 'links.php'; 
?>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'channelling');

    if (!$con) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    try {
        $selectSQL = "SELECT id, email, password FROM users WHERE email = ?";
        $stmt = mysqli_prepare($con, $selectSQL);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $email, $hashedPassword);
                mysqli_stmt_fetch($stmt);

                if (password_verify($password, $hashedPassword)) {
                    // Authentication successful
                    $_SESSION['user_id'] = $id;
                    header('Location: s.php');
                    exit();
                } else {
                    $error = "Invalid password.";
                }
            } else {
                $error = "Email not found.";
            }

            mysqli_stmt_close($stmt);
        } else {
            $error = "Database error: " . mysqli_error($con);
        }
    } catch (Exception $e) {
        $error = "An error occurred: " . $e->getMessage();
    }

    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    
    <!--?php
    session_start(); // Start a PHP session
    //include 'header.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Connect to the database
        $con = mysqli_connect('localhost', 'root', '', 'channelling');

        if (!$con) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        // Use prepared statements to prevent SQL injection
        $selectSQL = "SELECT id, email, password FROM users WHERE email = ?";
        $stmt = mysqli_prepare($con, $selectSQL);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $email, $hashedPassword);
                mysqli_stmt_fetch($stmt);

                if (password_verify($password, $hashedPassword)) {
                    // Authentication successful
                    $_SESSION['user_id'] = $id;
                    header('Location: s.php'); // Redirect to admin.php
                    exit();
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "Email not found.";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Database error: " . mysqli_error($con);
        }

        mysqli_close($con);
    }
    ?-->
    <div id="service" class="services wow fadeIn" >
    <div class="container" style="text-align: center;  margin-top: 25px;">
            <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                
               </div>
               <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12" style="margin: top 10004px;">
                  <div class="appointment-form">
                     <h3><span>+</span> Login</h3>
                     <div class="form">

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="password-form">
            <fieldset>
                <br>

                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                 <p id="email-validation-message"></p>
                                 <!--label for="email">Email:</label-->
                                    <div class="form-group">
                                       <input  type="email" name="email" placeholder="Email Address" id="email" required/>
                                    </div>
                                 </div>
                              </div>

                              <br><br><br>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <!--label for="password">Password:</label-->
                                    <div class="form-group">
                                       <input type="password" name="password" placeholder="Password" id="password" required />
                                    </div>
                                 </div>
                              </div>
                              <br> <br>  <br>
                              <div style="text-align: left;"><a>forgot password</a> 
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="r2.php">Don't have a account</a></div>

                              
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <div class="center"><button type="submit">Submit</button></div>
                                    </div>
                                 </div>
                              </div>
                              </fieldset>
                        </form>
                        <?php
            if (isset($error)) {
                echo '<div style="color: red;">' . $error . '</div>';
            }
            ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
</body>
</html>
