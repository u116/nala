<nav class="box">
    <ul>
        <?php

        $links = ['about', 'contact', 'interests', 'blog', 'index'];

        foreach ($links as $link) {
            if ($web['page']['route'] === $link) {
                echo "<li class='highlight'><a href='$link'>$link</a></li>";
            } else {
                echo "<li><a href='$link'>$link</a></li>";
            }
        }

        ?>
    </ul>
</nav>