<?php
require 'vendor/autoload.php';
require 'env.php';

\Stripe\Stripe::setApiKey($_API_SEC_KEY);

$response = ["payment" => "error", "amount" => 0];

if(isset($_POST['stripeToken'], $_POST['amount'], $_POST['first-name'], $_POST['last-name'])){
  $token = $_POST['stripeToken'];
  $amount = $_POST['amount'];
  $firstname = $_POST['first-name'];
  $lastname = $_POST['last-name'];

  // On change l'amount (initialement en euros) pour l'avoir en cents.
  $amount = $amount * 100;

  try{
    $charge = \Stripe\Charge::create([
      'amount' => $amount,
      'currency' => 'eur',
      'description' => 'Paiement test',
      'source' => $token,
      'metadata' => [
        'first_name' => $firstname,
        'last_name' => $lastname
      ]
    ]);

    // Ici, redirection du USER.
    $response['message'] = 'success';
    $response['payment'] = 'success';
    $response['amount'] = $amount/100;
    echo "Paiement test réussi";

  } catch(\Stripe\Exception\CardException $e){
    $response['message'] = $e->getMessage();
  } catch(\Exception $e){
    $response['message'] = $e->getMessage();
  }
}

echo json_encode($response);

?>