<?php $title = 'DoveLoButto'; require('./partials/head.php'); ?>

<div class="response-page plastic">
  <div class="navbar">
    <?php require('./partials/header.php'); ?>
    <form action="/result.php" method="get" class="search-bar">
      <input type="text" name="object" placeholder="Ricicla ora..">
      <input type="image" src="/assets/images/action-icon.svg" alt="Ricicla">
    </form>
  </div>

  <section id="section-index">
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

  <section id="section-found" class="hidden">
    <?php require('result-found.php'); ?>
  </section>

  <section id="section-not-found" class="hidden">
    <?php require('result-not-found.php'); ?>
  </section>
</div>

<?php require('./partials/tail.php'); ?>
