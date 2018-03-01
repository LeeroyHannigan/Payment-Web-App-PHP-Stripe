<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Pay Page</title>

</head>
<body>
    <!-- Main content -->
    <div class="container">

        <!-- Nav Buttons -->
        <button class="btn btn-primary mt-4" id="mybtn">Login</button>

        <!-- If logged in show links for database access -->
        <?php if(isset($_COOKIE['login'])): ?>
        <div class="btn-group" role="group">
        <a href="customers.php" class="btn btn-outline-primary mt-4">Customers</a>
        <a href="transactions.php" class="btn btn-outline-primary mt-4">Transactions</a>
        <a href="logout.php" class="btn btn-outline-primary mt-4">Logout</a>
        </div>
        <?php endif; ?>
            
     <!-- Show Product        -->
    <h2 class="mb-4 text-center">Monroe Hollywood Mirror [€150]</h2>
    
            <!-- Customer form -->
            <form action="./charge.php" method="post" id="payment-form">
            <div class="form-row">
              <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
              <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
              <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
            <div id="card-element" class="form-control">
            
            <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
        </div>
        <button>Submit Payment</button>
        </form>

    <!-- Login Modal -->
    <div id="id01" class="container modal">
  
      <form class="modal-content animate" action="login.php" method="POST">
        
        <!-- Display image -->
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img class="img-fluid" src="head.png" alt="Avatar" class="avatar">
        </div>
      
      <!-- Display Login from -->
      <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="username = username" name="uname" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="password = password" name="psw" required>
      </div>
      <div class="container my-4">
        <button type="submit" class="btn btn-success">Login</button> 
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger">Cancel</button>
    </div>
  </form>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="js/charge.js"></script>
<script src="js/login.js"></script>
</body>
</html>