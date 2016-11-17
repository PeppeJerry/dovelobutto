<?php 
  $title = 'Result';

  require('./partials/head.php');
  require('./mock.php');

  $requested = strtolower($_GET['object']);
  if (isset($mock[$requested])) {
    $found = True;

    $translated = array(
      "plastic" => "plastica",
      "glass" => "vetro",
      "paper" => "carta"
    );
    $bin = $mock[$requested];
    $binName = $translated[$bin];
  } else {
    $found = False;
  }

?>

<div class="response-page plastic">
  <div class="navbar">
    <?php require('./partials/header.php'); ?>
    <form action="/result.php" method="get" class="search-bar">
      <input type="text" name="object" placeholder="Ricicla ora..">
      <input type="image" src="/assets/images/action-icon.svg" alt="Ricicla">
    </form>
  </div>

  <div id="response" class="lets-move pop-up-2s">
    <?php 
      if ($found) {
        require('./result-found.php');
      } else {
        require('./result-not-found.php');
      }
    ?>
  </div>
</div>

<?php require('./partials/tail.php'); ?>
