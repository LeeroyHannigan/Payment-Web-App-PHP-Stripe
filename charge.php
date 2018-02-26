<?php

require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');

\Stripe\Stripe::setApiKey('sk_test_zUeOVV7rgpWlk98N7LjayDly');



//Sanitize POST array
$POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

//Crate Customer In Stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));

//Charge Customer
$charge = \Stripe\Charge::create(array(
    "amount" => 15000, 
    "currency" => "eur",
    "description" => "Monroe Hollywood Mirror", 
    "customer" => $customer->id
));

$customerData =[
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
];
 

// Instantiate Customer
$customer = new Customer();

//Add Customer
$customer->addCustomer($customerData);


$transactionData =[
    'id' => $charge->id,
    'customer_id' =>$charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount, 
    'currency'=> $charge->currency,
    'status' => $charge->status
];
 

// Instantiate Customer
$transaction = new Transaction();

//Add Customer
$transaction->addTransaction($transactionData);

//Redirect To Success
header('Location: success.php?tid='.$charge->id.'& product='.$charge->description);

?>