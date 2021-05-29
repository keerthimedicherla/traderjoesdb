<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Trader Joe's Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  <h2 id='welcome'>Sign Up For Trader Joe's Management Application</h2>
  </div>
  
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	    <input type="text" name="username" value="<?php echo $username; ?>">
  	    </div>
  	    <div class="input-group">
        <label>Role</label>
        <select id="role" name="role" value="<?php echo $role; ?>">
            <option value="customer">Customer</option>
            <option value="employee">Employee</option>
            <option value="supplier">Supplier</option>
        </select>
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	    <input type="password" name="password_1">
  	    </div>
  	    <div class="input-group">
  	      <label>Confirm password</label>
  	        <input type="password" name="password_2">
  		</div>
  		<div class="input-group">
  		  <button type="submit" class="btn" name="reg_user">Register</button>
  		  </div>
  		  <p>
			Already a member? <a href="login.php">Sign in</a>
  			</p>
  </form>
</body>
</html>
