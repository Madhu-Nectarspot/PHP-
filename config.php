<?php

require_once('stripe-php/init.php');

$stripe = array(
  "secret_key"      => "sk_test_51Hdo3rAwEfXm3W1EodlIUX3AAhZCQjIhTwwAVifcsv69dJFW2ClrzPCNf2bwgBzO6tJ1Kp8wCr8tKy3yxDQSZRV200qAR0d8OB",
  "publishable_key" => "pk_test_51Hdo3rAwEfXm3W1EyEkr2TLt5OXWqONVtf0KzGKMvmS2ffFByuFpPTnGScsg6jqyLiQgT31vq0KjueXb1XgPoCEa00lCwQjnQL"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>