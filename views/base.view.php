<?php ob_start(); ?>

<!DOCTYPE html>
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:website="http://ogp.me/ns/website" lang="en-US" itemscope="" itemtype="http://schema.org/WebPage">
<head>

<title>Nala - <?=$web['page']['title']?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<meta name="twitter:site" content="@nala_dev">
<meta property="og:url" content="https://nala.dev">
<meta property="og:title" content="Nala - <?=$web['page']['title']?>">
<meta property="og:description" content="Nala is a personal website used for tools like file-sharing, link-shortening and many other functionalities.">
<meta property="og:image" content="/storage/favico2.png">
<meta name="title" content="Nala - <?=$web['page']['title']?>">
<meta name="description" content="Nala is a personal website used for tools like file-sharing, link-shortening and other functionalities.">

<link type="image/png" sizes="32x32" rel="icon" href="/storage/favico2.png">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/var.css">

</head>
<body>
    <script>0</script> <!-- Css doesn't load in time without applying this. Very quick fix found on google -->
    <div id="web-container">
        <div class="elements">
            <p>
                <?= isset($web['user']['data']['username']) ?
                    "Logged in as {$web['user']['data']['username']}" :
                    "<a class='no-session' href='/login'>Login</a>"
                ?>
            </p>
            <p>
                <?=$excTime?>
            </p>
            <?= isset($web['user']['data']['username']) ?
                "<p><a href='/logout'>Logout</a></p>" :
                "<a class='no-session' href='/register'>Register</a>"
            ?>
        </div>
        <a href=<?= $web['page']['route'] === 'home' ? 'about' : '/' ?>>
            <figure id="cat" class="<?php if($web['page']['route'] === 'home') echo 'home'; ?>"><img alt="cat" src="/storage/img/itazuranekoanimated.png"></figure>
        </a>
        <!--<a href=<?= $web['page']['route'] === 'home' ? 'about' : '/' ?>><h1 class="<?php if($web['page']['route'] === 'home') echo 'home'?>">ナラ</h1></a>-->

        <?php if ($web['menu_at_top']) require view('_menu.view.php'); ?>

        <?php if (isset($web['page']['view'])): ?>

        <main class="box">
            <?php require $web['page']['view'] ?>
        </main>

        <?php if (!$web['menu_at_top']) require view('_menu.view.php'); ?>

        <?php endif; ?>

    </div>
</body>
</html>

<?php ob_end_flush(); ?>