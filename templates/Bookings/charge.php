<?php
require_once('vendor/autoload.php');


\Stripe\Stripe::setApiKey('sk_test_51PFDCjC4SRSYpdkUiRVsXowsmWxsO1bgmV26rjHo6kAkaaYb1912x5Yu6VQymQJpFLolqO1gEubBy3lMV3unFm8n00GSoYWvo0');

$token  = $_POST['stripeToken'];
$amount = $_POST['amount'];

try {
    $charge = \Stripe\Charge::create([
        'amount' => $amount,
        'currency' => 'usd',
        'description' => 'Example charge',
        'source' => $token,
    ]);

    echo 'Charge successful';
} catch(\Stripe\Exception\CardException $e) {
    echo 'Charge failed: ' . $e->getMessage();
} catch (\Exception $e) {
    echo 'Charge failed: ' . $e->getMessage();
}
?>
