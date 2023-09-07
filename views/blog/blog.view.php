<section class="blog-grid">
    <?php foreach((array)$web['page']['var']['blog'] as $key => $value): ?>
    <article class="blog-grid">
        <h4 class="title"><?=$value['title']?> (<time datetime="<?=$value['date']?>"><?=ucfirst(dateFormat($value['date']))?></time>)</h4>
        <p><?=$value['content']?></p>
        <figure><img src="/storage/img/<?=$value['picture']?>" alt="<?=explode('.', $value['picture'])[0]?>"></figure>
    </article>
    <?php endforeach; ?>
</section>

<a href="#top">
    <div class="top">
        ▲
    </div>
</a>