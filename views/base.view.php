<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>nala.dev - personal website</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">

<meta name="twitter:site" content="@nala_dev">
<meta property="og:url" content="https://nala.dev">
<meta property="og:title" content="Nala">
<meta property="og:description" content="nala.dev is a personal website used for tools like file-sharing, link-shortening and other functionalities.">

<link type="image/png" sizes="32x32" rel="icon" href="/storage/anmi 1.png">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/var.css">
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

</head>
<body>
    <script>0</script> <!-- Css doesn't load in time without applying this. Very quick fix found on google -->
    <main>
        <a href=<?= $web['page']['route'] === 'home' ? 'about' : '/' ?>>
            <img id="cat" class="<?php if($web['page']['route'] === 'home') echo 'home'; ?>" src="/storage/img/itazuranekoanimated.png">
        </a>

        <?php if (isset($web['page']['view'])): ?>

        <article class="box">
            <?php require $web['page']['view'] ?>
        </article>

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

        <?php endif; ?>

    </main>
</body>
</html>

<?php ob_end_flush(); ?>