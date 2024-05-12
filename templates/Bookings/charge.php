<?php
require_once('vendor/autoload.php');

// my stripe key
\Stripe\Stripe::setApiKey('pk_test_51PFDCjC4SRSYpdkURdxb1ni6CPp01vZoczO6RaaYiBTQLlgEwzY5ptSaudvYtwFAwGvXqTIGGyLhLgkUkuB3LSg600RrlLVadU');

// get payment information
$card_number = $_POST['card_number'];
$exp_month = $_POST['exp_month'];
$exp_year = $_POST['exp_year'];
$cvc = $_POST['cvc'];
$amount = $_POST['value'] * 100; // amount is in cent

try {
    // create token
    $token = \Stripe\Token::create([
        'card' => [
            'number'    => $card_number,
            'exp_month' => $exp_month,
            'exp_year'  => $exp_year,
            'cvc'       => $cvc
        ]
    ]);

    // use token to make payment
    $charge = \Stripe\Charge::create([
        'amount' => $amount,
        'currency' => 'usd',
        'description' => 'Example charge',
        'source' => $token->id
    ]);

    echo '<h1>Successfully charged $10.00!</h1>';
} catch(\Stripe\Exception\CardException $e) {
    // if error, print error info
    echo '<h1>Error: ' . $e->getError()->message . '</h1>';
}
?>
