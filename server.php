<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
define('DB_SERVER', 'server');
define('DB_USERNAME', 'username');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'database_name');

/* Attempt to connect to MySQL database */
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($role)) { array_push($errors, "Role is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  /*if (count($errors) == 0) {
     $password = md5($password_1);//encrypt the password before saving in the database

     $query = "INSERT INTO Users (username, role, password) 
                VALUES('$username', '$role', '$password')";
                mysqli_query($db, $query);
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: login.php');
  */
// Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
     $password = md5($password_1);//encrypt the password before saving in the database

     $query = "INSERT INTO Users (username, role, password) 
                VALUES('$username', '$role', '$password')";
                mysqli_query($db, $query);
      

    $id_query = mysqli_query($db, "SELECT * FROM Users");
    $count = 0;
    while($store = mysqli_fetch_array($id_query)){
        $count = $store[0];
    }

    if ($role == 'customer'){
        $cust_query = "INSERT INTO Customer (id, name, is_member) VALUES ($count, 'default_name', 0)";
        mysqli_query($db, $cust_query);
    }

    else if ($role == 'supplier'){
        $supp_query = "INSERT INTO Supplier (id, country) VALUES ($count, 'default_country')";
        mysqli_query($db, $supp_query);
    }

    else if ($role == 'employee'){
        $emp_query = "INSERT INTO Employee (id, years_of_experience) VALUES ($count, 0)";
        mysqli_query($db, $emp_query);
    }

      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: login.php');
  }

/*$_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: login.php');
*/}

//      }
//}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $role = mysqli_real_escape_string($db, $_POST['role']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = $results -> fetch_assoc();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            $_SESSION['success'] = "You are now logged in";
            // logout of current sql connection to general login user jbw5ze_d
            // $db->close();
            mysqli_close($db);
            if($db->connect_errno) {
                echo "fail";
                $db->close();
                exit();
                }

            switch( $_SESSION['role'] ){

                case 'customer':
                    // log into new sql connection to customer user jbw5ze_a
                    // connect to the database
                    define('DB_SERVER', 'server');
                    define('DB_USERNAME', 'username');
                    define('DB_PASSWORD', 'password');
                    define('DB_NAME', 'database_name');
                    /* Attempt to connect to MySQL database */
                    $db = mysqli_connect(DB_SERVER1, DB_USERNAME1, DB_PASSWORD1, DB_NAME1);
                    $_SESSION['subuser_a'] = DB_USERNAME1;
                    if($db === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    header("location:index.php");

                case 'employee':
                    // log into new sql connection to employee user jbw5ze_c
                    // connect to the database
                    define('DB_SERVER', 'server');
                    define('DB_USERNAME', 'username');
                    define('DB_PASSWORD', 'password');
                    define('DB_NAME', 'database_name');
/* Attempt to connect to MySQL database */
                    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                    header("location:index.php");

                case 'supplier':
                    // log into new sql connection to employee user jbw5ze_b
                    // connect to the database
                    define('DB_SERVER', 'server');
                    define('DB_USERNAME', 'username');
                    define('DB_PASSWORD', 'password');
                    define('DB_NAME', 'database_name');

                    /* Attempt to connect to MySQL database */
                    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                    header("location:index.php");

                default:
                    header("location:index.php");
                    exit();
            }
        }
        else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

  ?>
                                                                                              
