<div class="interests-grid">
    <?php foreach ((array) $web['page']['var']['interests'] as $interestKey => $interestValue): ?>
        <div class="interest title"><?=ucfirst($interestValue['title'])?></div>
        <div class="interest-description"><?=$interestValue['description']?></div>
    <?php endforeach; ?>
</div>