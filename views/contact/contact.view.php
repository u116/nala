<section class="contact-grid">
    <p>You can contact me through:</p>
    <?php foreach((array) $web['page']['var']['contacts'] as $key => $value): ?>
        <?php

        switch ($key) {
            case "email":
                ?><a href="mailto:<?=$value?>"><?=ucfirst($key)?></a> <?php
                break;
            case "X":
                ?><a href="https://x.com/<?=$value?>"><?=ucfirst($key)?></a> <?php
                break;
            case "github":
                ?><a href="https://github.com/<?=$value?>">
                <?=ucfirst($key)?></a> <?php
                break;
            case "discord":
                ?><?=ucfirst($key)?> (<?=$value?>) <?php
                break;
            case "website":
                ?><a href="<?=$value?>"><?=ucfirst($key)?></a> <?php
                break;
        }

        ?>
    <?php endforeach; ?>
</section>