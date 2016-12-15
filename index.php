<?php
$title = 'DoveLoButto';
require('./partials/head.php');

if ($_GET['object']) {
  require('./api/_result.php');
}

?>

<div id="response-page" class="response-page <?php if ($result['found']) echo 'bin-'.$result['bin'] ?>">
  <div class="navbar">
    <?php require('./partials/header.php'); ?>
    <form action="/result.php" method="get" class="search-bar">
      <input type="text" id="input-bar" name="object" placeholder="Ricicla ora..">
      <input type="image" src="/assets/images/action-icon.svg" alt="Ricicla">
    </form>
  </div>

  <section id="section-index" <?php if ($_GET['object']) echo 'class="hidden"' ?>>
    <p>
      <strong>DoveLoButto</strong> ti permette di scoprire velocemente e
      facilmente come riciclare tutto ciò che ti passa per le mani.
    </p>
    <p>
      La raccolta differenziata non è facile come sembra e questo servizio
      nasce apposta per facilitarla, fornendo alle persone uno strumento
      utile e facile da usare.
    </p>
  </section>

  <section id="section-found" <?php if (!$_GET['object'] || $result['found'] != 1) echo 'class="hidden"' ?>>
    <?php require('result-found.php'); ?>
  </section>

  <section id="section-not-found" <?php if (!$_GET['object'] || $result['found'] != 0) echo 'class="hidden"' ?>>
    <?php require('result-not-found.php'); ?>
  </section>
</div>

<?php require('./partials/tail.php'); ?>
