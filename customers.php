<?php
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
//Instantiate new customer
$customer = new Customer();
//get customers from database
$customers =  $customer->getCustomers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>View Customers</title>
</head>
<body>
    <div class="container mt-4">
        <!-- Toggle between customer and transaction tables -->
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-primary">Customers</a>
            <a href="transactions.php" class="btn btn-secondary">Transactions</a>
        </div>  
        <hr>
    <!-- Table header -->
    <h2>Customers</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Customer Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                <?php foreach($customers as $c): ?> 
                    <tr>
                    <td><?php echo $c->id; ?> </td>
                    <td><?php echo $c->first_name; ?> 
                    <?php echo $c->last_name; ?> </td>
                    <td><?php echo $c->email; ?> </td>
                    <td><?php echo $c->created_at; ?> </td>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <!-- Return to Paypage -->
        <p><a href="index.php">Pay Page</a></p>
    </div>
</body>
</html>