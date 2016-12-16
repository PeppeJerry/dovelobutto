<?php
$title = 'DoveLoButto';

include __DIR__.'/partials/head.php';

if (isset($_GET['object'])) {
  include __DIR__.'/api/_result.php';
}
?>

<div id="response-page" class="response-page <?= isset($result['found']) ? 'bin-'.$result['bin'] : '';?>">
  <div class="navbar">
    <?php include __DIR__.'/partials/header.php'; ?>
    <form class="search-bar">
      <input type="text" id="input-bar" name="object" placeholder="Ricicla ora..">
      <input type="image" src="/assets/images/action-icon.svg" alt="Ricicla">
    </form>
  </div>

  <section id="section-index" <?= isset($_GET['object']) ? 'class="hidden"' : '';?>>
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

  <section id="section-found" <?= (!isset($_GET['object']) || $result['found'] !== 1) ? 'class="hidden"' : '';?>>
    <?php include __DIR__.'/result-found.php'; ?>
  </section>

  <section id="section-not-found" <?= (!isset($_GET['object']) || $result['found'] !== 0) ? 'class="hidden"' : '';?>>
    <?php include __DIR__.'/result-not-found.php'; ?>
  </section>
</div>

<?php include __DIR__.'/partials/footer.php'; ?>
