<?php

require_once('vendor/autoload.php');

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

//Redirect To Success
header('Location: success.php?tid='.$charge->id.'& product='.$charge->description);

?>