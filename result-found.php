<div id="response" class="lets-move pop-up-2s">
  <figure>
    <img id="found-img" <?= isset($result['bin']) ? "src='/assets/images/bin-".$result['bin'].".png' alt='Ricicla come ".$result['binName']."'" : '';?>>
  </figure>
  <article>
    <h4>Ricicla come</h4>
    <h2 id="found-bin"><?= $result['binName'] ?? '';?></h2>
  </article>
</div>
