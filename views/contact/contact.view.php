<section class="contact-grid">
    <p>You can contact me through:</p>
    <?php foreach((array) $web['page']['var']['contacts'] as $key => $value): ?>
        <?php

        switch ($key) {
            case "email":
                ?><a href="mailto:<?=$value?>"><address><?=ucfirst($key)?></address></a> <?php
                break;
            case "X":
                ?><a href="https://x.com/<?=$value?>"><address><?=ucfirst($key)?></address></a> <?php
                break;
            case "github":
                ?><a href="https://github.com/<?=$value?>">
                <address><?=ucfirst($key)?></address></a> <?php
                break;
            case "discord":
                ?><address><?=ucfirst($key)?> (<?=$value?>)</address> <?php
                break;
            case "website":
                ?><a href="<?=$value?>"><address><?=ucfirst($key)?></address></a> <?php
                break;
        }

        ?>
    <?php endforeach; ?>
</section>