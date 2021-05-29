
<?php
  session_start();

  include("./server.php");
  if (!isset($_SESSION['username'])) {
     $_SESSION['msg'] = "You must log in first";
     header('location: login.php');
  }
  if (isset($_GET['logout'])) {
     session_destroy();
     unset($_SESSION['username']);
     header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<img
            class="background"
            src="https://us.123rf.com/450wm/romastudio/romastudio1411/romastudio141100013/33709969-healthy-food-background-studio-photo-of-different-fruits-and-vegetables-on-wooden-table.jpg?ver=6"
            >
        <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p>You are a <strong><?php echo $_SESSION['role']; ?></strong></p>
            <!-- <a href="http://cs.virginia.edu/~jbw5ze/project/logout.php">logout</a> -->
        <div class="jumbotron">
            <div class="container text-center header">
                <h1 id='welcome'>Welcome, <?php echo $_SESSION['username']; ?></h1>
                <p>Your next Trader Joe's shopping experience awaits.</p>
            </div>
        </div>
    <?php endif ?>
<div class="content">
     <!-- notification message -->
     <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
           <h3>
          <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
          ?>
          </h3>
      </div>
      <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
        <?php  if ($_SESSION['role'] == 'customer') : ?>
            <div class="container text-center">
            <h3>Customer Dashboard</h3><br>
            <div class="row">
            <div class="col-sm-4">
                <div class="well">
                <a href="create_recipe.html">Insert Your Favorite Recipe</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="well">
                <a href="customer_info.html">Edit Customer Information</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="well">
                <a href="ajax/Stores/search_stores.html">View Store Information</a>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-4">
                <div class="well">
                <a href="recipe_view.php"><b>View Recipes</b></a><br>
                <a href="all_recipes_html.php">Download all recipes in HTML Format</a><br>
                <a href="all_recipes_xml.php">Download all recipes in XML Format</a>
                </div>
            </div>

      <div class="col-sm-4">
        <div class="well">
          <a href="cheapest_view.php"><b>View Items < $5</b></a><br>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="well">
          <a href="index.php?logout='1'"><b>Logout</b></a><br>
        </div>
      </div>
    </div>
    
  </div><br>
        <?php endif ?>
        <?php  if ($_SESSION['role'] == 'employee') : ?>
            <div class="container text-center">
    <h3>Employee Dashboard</h3><br>
    <div class="row">
        <div class="col-sm-4">
            <div class="well">
                <a class="btn btn-light" href="employeepg_customer_info.php" role="button">Customer Information</a>
            </div>
            <div class="well">
                <a class="btn btn-light" href="employeepg_item_info.php" role="button">Item Information</a>
            </div>
          </div>

      <div class="col-sm-4">
        <div class="well">
          <a class="btn btn-light" href="employeepg_recipe_info.php" role="button">Recipe Information</a>
        </div>
       <div class="well">
        <a class= "btn btn-light" href="employee_info.php" role="button">Employee Information</a>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="well">
          <a class="btn btn-light" href="employeepg_store_info.php" role="button">Store Information</a>
        </div>
        <div class="well">
          <a class="btn btn-light" href="employeepg_supplier_info.php" role="button">Supplier Information</a>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="well">
          <a href="index.php?logout='1'"><b>Logout</b></a><br>
        </div>
      </div>
    </div>
  </div><br>
        <?php endif ?>
        <?php  if ($_SESSION['role'] == 'supplier') : ?>
            <div class="container text-center">
    <h3>Supplier Dashboard</h3><br>
    <div class="row">
        <div class="col-sm-6">
            <div class="well">
                <a href="supplier_view.php">View Supplier Information</a>
            </div>
            <div class="well">
                <a href="supplier_form.html">Edit/Delete Supplier Information</a>
            </div>
            </div>
            <div class="col-sm-6">
                <div class="well">
                <a href="store_view.php"><b>View All Store Information</b></a><br>
                <a href="store_view_html.php">Download in HTML Format</a><br>
                <a href="store_view_xml.php">Download in XML Format</a>
                </div>
                <div class="well">
                <a href="ajax/Stores/search_stores.html">Search for Store Information</a>
                </div>
            </div>
	    <div class="col-sm-6">
        <div class="well">
          <a href="index.php?logout='1'"><b>Logout</b></a><br>
        </div>
      </div>
            </div>
        </div><br>
        <?php endif ?>
    <?php endif ?>
    <!-- logged in customer information -->

    <footer class="container-fluid text-center">
  <p>CS 4750: Trader Joe's Application</p>
</footer>

</div>
</body>
</html>
        
