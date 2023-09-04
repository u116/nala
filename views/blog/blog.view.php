<div class="blog-grid">
    <?php foreach((array)$web['page']['var']['blog'] as $key => $value): ?>
        <div class="title"><?=$value['title']?> (<?=ucfirst(dateFormat($value['date']))?>)</div>
        <div class="content"><?=$value['content']?></div>
        <img src="/storage/img/<?=$value['picture']?>" alt="">
    <?php endforeach; ?>
</div>

<a href="#top">
    <div class="top">
        ▲
    </div>
</a>