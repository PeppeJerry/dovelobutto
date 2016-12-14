<?php 
  $title = 'Email'; 
  require('./partials/head.php'); 
  $email_address = $_POST['email'];
  $product_searched = $_POST['product-name'];

  $db = require_once "db.php";
  $sql = "INSERT INTO emails(email_address,product_name) VALUES ('$email_address','$product_searched')"; // Add the email and the searched product submitted into the "emails" table in the database.
  $sth = $db->query($sql);
?>

<div class="email-page">
  <div class="navbar">
    <?php require('./partials/header.php'); ?>
  </div>

  <div id="content">
    <figure>
      <img src="/assets/images/check-icon.svg" alt="E-mail inviata">
    </figure>

    <article>
      <p>Ti invieremo al più presto un'email a: <?php echo $email_address ?>
      <p> Prodotto cercato : <?php echo $product_searched ?> </p>
      <b></b></p>
      <a href="index.php"><button class="button">Torna alla home</button></a>
    </article>
  </div>
</div>

<?php require('./partials/tail.php'); ?>
