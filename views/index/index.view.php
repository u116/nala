<div class="index-grid">
    <?php foreach((array) $web['page']['var']['index'] as $indexKey => $indexValue): ?>
        <a target="__blank" href="<?=$indexValue['link']?>"><?=$indexValue['title']?></a>
        <p><?=$indexValue['description']?></p>
    <?php endforeach; ?>
</div>