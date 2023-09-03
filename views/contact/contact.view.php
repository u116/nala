<?php

if (!empty($web['page']['var']['contacts'])) {
    ?> <div class="contact-grid"> <?php
    echo "<p>You can contact me through: </p>";
    foreach($web['page']['var']['contacts'] as $key => $value) {
        switch ($key) {
            case "email":
                ?><a href="mailto:<?=$value?>"><?=ucfirst($key)?></a> <?php
                break;
            case "X":
                ?><a href="https://x.com/<?=$value?>"><?=ucfirst($key)?></a> <?php
                break;
            case "github":
                ?><a href="https://github.com/<?=$value?>"><?=ucfirst($key)?></a> <?php
                break;
            case "discord":
                ?><?=ucfirst($key)?> (<?=$value?>) <?php
                break;
            case "website":
                ?><a href="<?=$value?>"><?=ucfirst($key)?></a> <?php
                break;
        }
    }
    ?> </div> <?php
}