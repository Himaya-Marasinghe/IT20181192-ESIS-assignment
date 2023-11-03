<?php 
    include 'links.php';
    //include 'header.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <div id="service" class="services wow fadeIn" >
    <!--?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'channelling');

    if (!$con) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Check if the "users" table exists; if not, create it
    $checkTableSQL = "SHOW TABLES LIKE 'users'";
    $result = mysqli_query($con, $checkTableSQL);

    if (mysqli_num_rows($result) == 0) {
        // Table doesn't exist, create it
        $createTableSQL = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";

        if (mysqli_query($con, $createTableSQL)) {
            echo "Table 'users' created.";
        } else {
            echo "Error creating the table: " . mysqli_error($con);
        }
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the database
    $insertSQL = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

    if (mysqli_query($con, $insertSQL)) {
        // Registration successful, display a message and redirect with JavaScript
        echo '<div id="registration-success" style="color: green;"  font-size: 160px;"><b>Registration successful. You can now log in.<b></div>';
        echo '<script>
            setTimeout(function() {
                document.getElementById("registration-success").style.display = "none";
                window.location.href = "login.php";
            }, 4000); // 4 seconds
        </script>';
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'channelling');

    if (!$con) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Check if the email already exists in the database
    $checkEmailSQL = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $checkEmailSQL);

    if (mysqli_num_rows($result) > 0) {
        // Email already exists, prompt the user to log in
        echo '<div id="registration-success" style="color: green; font-size: 20px;">This email is already registered. Please <a href="login.php">log in</a>.</div>';
    } else {
        // Email doesn't exist, proceed with registration

        // Check if the "users" table exists; if not, create it
        $checkTableSQL = "SHOW TABLES LIKE 'users'";
        $result = mysqli_query($con, $checkTableSQL);

        if (mysqli_num_rows($result) == 0) {
            // Table doesn't exist, create it
            $createTableSQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL
            )";

            if (mysqli_query($con, $createTableSQL)) {
                echo "Table 'users' created.";
            } else {
                echo "Error creating the table: " . mysqli_error($con);
            }
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert data into the database
        $insertSQL = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        if (mysqli_query($con, $insertSQL)) {
            // Registration successful, display a success message and redirect with JavaScript
            echo '<div id="registration-success" style="color: green; font-size: 20px;">Registration successful. You can now log in.</div>';
            echo '<script>
                setTimeout(function() {
                    document.getElementById("registration-success").style.display = "none";
                    window.location.href = "login.php";
                }, 4000); // 4 seconds
            </script>';
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    // Close the database connection
    mysqli_close($con);
}
?>


        <div class="container" style="text-align: center;  margin-top: 25px;">
            <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                
               </div>
               <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12" style="margin: top 10004px;">
                  <div class="appointment-form">
                     <h3><span>+</span> Register</h3>
                     <div class="form">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="password-form">
                           <fieldset>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="form-group">
                                        <!--label for="username">Username:</label-->
                                        <input type="text" id="name" name="username" placeholder="Your Name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                 <p id="email-validation-message"></p>
                                    <div class="form-group">
                                       <input type="email" name="email" placeholder="Email Address" id="email" required/>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="password" name="password" placeholder="Password" id="password" required />
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="password" placeholder="Password" id="re-password" required/>
                                       <p id="message"></p>
                                    </div>
                                 </div>
                              </div>
                              <div style="text-align: right;"><a href="login.php">Already have an account</a>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <div class="center"><button type="submit">Register</button></div>
                                    </div>
                                 </div>
                              </div>
                              
                           </fieldset>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <script>
    // Email validation
    const emailInput = document.getElementById('email');
    const emailValidationMessage = document.getElementById('email-validation-message');

    emailInput.addEventListener('input', function() {
        const email = emailInput.value;

        if (isValidEmail(email)) {
            emailValidationMessage.textContent = 'Valid email address.';
            emailValidationMessage.style.color = 'green';
        } else {
            emailValidationMessage.textContent = 'Invalid email address.';
            emailValidationMessage.style.color = 'red';
        }
    });

    function isValidEmail(email) {
        // Regular expression to validate email format
        const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
        return emailPattern.test(email);
    }
    
    
    // Password validation
    const passwordInput = document.getElementById('password');
    const rePasswordInput = document.getElementById('re-password');
    const message = document.getElementById('message');

    function validatePassword() {
        const password = passwordInput.value;
        const rePassword = rePasswordInput.value;

        if (password.length >= 8) {
            if (password === rePassword) {
                message.textContent = 'Passwords match!';
                message.style.color = 'green';
            } else {
                message.textContent = 'Passwords do not match.';
                message.style.color = 'red';
            }
        } else {
            message.textContent = 'Password must be at least 8 characters.';
            message.style.color = 'red';
        }
    }

    rePasswordInput.addEventListener('input', validatePassword);
    passwordInput.addEventListener('input', validatePassword);
</script>


    
        

      <!--script>
        //email validation
        const emailInput = document.getElementById('email');
        const emailValidationMessage = document.getElementById('email-validation-message');

        emailInput.addEventListener('input', function() {
            const email = emailInput.value;

            if (!isValidEmail(email)) {
                emailValidationMessage.textContent = 'Invalid email address.';
                emailValidationMessage.style.color = 'red';
            } 
        });

        function isValidEmail(email) {
            // Regular expression to validate email format
            const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
            return emailPattern.test(email);
        }



         //password validation
         const passwordInput = document.getElementById('password');
        const rePasswordInput = document.getElementById('re-password');
        const message = document.getElementById('message');
        const form = document.getElementById('password-form');

        function validatePassword() {
            const password = passwordInput.value;
            const rePassword = rePasswordInput.value;

            if (password === rePassword) {
                message.innerHTML = 'Passwords match!';
                message.style.color = 'green';
            } else {
                message.innerHTML = 'Passwords do not match!';
                message.style.color = 'red';
            }
        }

        function submitForm(event) {
            event.preventDefault();
            validatePassword();
        }

        rePasswordInput.addEventListener('input', validatePassword);
        form.addEventListener('submit', submitForm);
    </script-->