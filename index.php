<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page de commande</title>
</head>
<body>

  <form action="charge.php" method="post" id="payment-form">
    <div>
      <label for="first-name">Prénom</label>
      <input type="text" id="first-name" name="first-name" required>
    </div>
    <div>
      <label for="last-name">NOM</label>
      <input type="text" id="last-name" name="last-name" required>
    </div>
    <input type="hidden" name="amount" value="10.00">
    <div id="card-element">

    </div>
    <div id="card-errors" role="alert">

    </div>
    <button type="submit">Payer</button>



  </form>

  <script src="https://js.stripe.com/v3/"></script>
  <script src="app.js"></script>
</body>
</html>