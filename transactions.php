<?php
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Transaction.php');
//Instatiate new Transaction
$transaction = new Transaction();
//Get all transactions
$transactions =  $transaction->getTransactions();

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
<!-- Main Body -->
<div class="container mt-4">
    <!-- Select Customer or Transaction items -->
    <div class="btn-group" role="group">
        <a href="customers.php" class="btn btn-secondary">Customers</a>
        <a href="transactions.php" class="btn btn-primary">Transactions</a>
    </div>  
    <hr>

    <!-- Table Header -->
    <h2>Customers</h2>

    <!-- Table of Transactions -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Transaction Id</th>
                <th>Customer Id</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
              <?php foreach($transactions as $t): ?> 
                <tr>
                    <td><?php echo $t->id; ?> </td>
                    <td><?php echo $t->customer_id; ?> </td>
                    <td><?php echo $t->product; ?> </td>
                    <td><?php echo sprintf('%.2f', $t->amount /100) ?>
                    <?php echo strtoupper($t->currency); ?> </td>
                    <td><?php echo $t->status; ?> </td>
                    <td><?php echo $t->created_at; ?> </td>
                </tr>
              <?php endforeach; ?>
        </tbody>
    </table>
    <br>

    <!-- Return to Paypage -->
    <p><a href="index.php">Pay Page</a></p>
</div>
</body>
</html>