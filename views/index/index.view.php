<section class="index-grid">
    <?php foreach((array) $web['page']['var']['index'] as $indexKey => $indexValue): ?>
    <div class="index-grid_entry">
        <a target="__blank" href="<?=$indexValue['link']?>"><?=$indexValue['title']?></a>
        <p><?=$indexValue['description']?></p>
    </div>
    <?php endforeach; ?>
</section>