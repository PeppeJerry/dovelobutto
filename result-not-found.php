<h2>
    Ci dispiace, non abbiamo trovato l'oggetto
    <b id="product-searched">
        <?= $_GET['object'] ?>
    </b>
</h2>
<h3>Inserisci la tua email e ti contatteremo non appena lo sapremo!</h3>
<form action="email.php" method="POST" accept-charset="utf-8">
    <span style="display:block;">
        <input type="email" name="email" id="email-bar">
    </span>
    <span style="display:block;margin-top: 15px;">
        <input type="submit" value="Invia" class="button">
    </span>
  <input type="hidden" id="product-name" name="product-name" value="">
</form>
