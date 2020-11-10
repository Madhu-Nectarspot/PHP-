<?php
    require_once('stripe-php-6.24.0/init.php');

    // $products = array(
    //     "pids" => ["1", "2", "3"],
    //     "1" => "plan_E4g2jsIPScZeH6",
    //     "2" => "plan_E7Hcdysyy9TU58",
    //     "3" => "plan_E7HdyXFDlTpQpb"
    // );

    $stripe = [
        "secret_key"      => "sk_test_aD1GeDVFXe3NE3GshlSHF8XU00OQbDXQ8L",
        "publishable_key" => "pk_test_V6ftH5y3wNAtOhnjVYddFEBD00lWwfAHPl",
    ];

    \Stripe\Stripe::setApiKey($stripe['secret_key']);

    $pid = $_GET['pid'];
    $token  = $_POST['stripeToken'];
    $email  = $_POST['stripeEmail'];

    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source'  => $token,
    ]);

    \Stripe\Subscription::create([
        "customer" => $customer->id,
        "items" => [
            [
                "price" => "price_1HlXb9L8wYEspRzFyoxbQzsI",
                // "plan" => $products[$pid],
            ],
        ]
    ]);

    Stripe\Charge::create(array(
            "amount" => 100*100,
            "currency" => "usd",
            //"subscription" => $subscription,
            "source" => $_POST['stripeToken'],
            "description" =>"monthly payment",
          )
    );
   if($result == 1) {
   echo "<script type='text/javascript'>alert('Your Subscribe Plan has been processed successfully.!');
      window.location.href= 'index.php';
        </script>";
     
  } else{
    echo "<div class='text-danger'>Stripe Payment Status : \".$result.</div>";
  }

?>