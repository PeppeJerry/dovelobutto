<?php
$title = 'Email';

$db = require_once __DIR__.'/db.php';
include __DIR__.'/partials/head.php';

$email_address = $_POST['email'];
$product_searched = $_POST['product-name'];

// Add the email and the searched product submitted into the "emails" table in the database.
$sql = "INSERT INTO unclassified_products (`email`,`name`) VALUES ('$email_address','$product_searched')";
$db->query($sql);
?>

<div class="email-page">
  <div class="navbar">
    <?php include __DIR__.'/partials/header.php'; ?>
  </div>

  <div id="content">
    <figure>
      <img src="/assets/images/check-icon.svg" alt="E-mail inviata">
    </figure>

    <article>
      <p>Ti invieremo al più presto un'email a: <?=$email_address;?>
      <p> Prodotto cercato : <?=$product_searched;?> </p>
      <b></b></p>
      <a href="/"><button class="button">Torna alla home</button></a>
    </article>
  </div>
</div>

<?php include __DIR__.'/partials/footer.php'; ?>