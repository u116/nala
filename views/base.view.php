<?php ob_start(); ?>

<!DOCTYPE html>
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"
      xmlns:website="http://ogp.me/ns/website" lang="en-US" itemscope="" itemtype="http://schema.org/WebPage"
      class="yui3-js-enabled js flexbox canvas canvastext webgl no-touch hashchange history draganddrop rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms no-csstransforms3d csstransitions video audio svg inlinesvg svgclippaths"
      style="">
<head>

<title>Nala - Personal website</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">

<meta name="twitter:site" content="@nala_dev">
<meta property="og:url" content="https://nala.dev">
<meta property="og:title" content="Nala - Personal website">
<meta property="og:description" content="nala.dev is a personal website used for tools like file-sharing, link-shortening and other functionalities.">
<meta name="title" content="Nala - Personal website">
<meta name="description" content="nala.dev is a personal website used for tools like file-sharing, link-shortening and other functionalities.">

<link type="image/png" sizes="32x32" rel="icon" href="/storage/favico2.png">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/var.css">

</head>
<body>
    <script>0</script> <!-- Css doesn't load in time without applying this. Very quick fix found on google -->
    <main>
        <a href=<?= $web['page']['route'] === 'home' ? 'about' : '/' ?>>
            <img id="cat" alt="cat" class="<?php if($web['page']['route'] === 'home') echo 'home'; ?>" src="/storage/img/itazuranekoanimated.png">
        </a>

        <?php if ($web['menu_at_top']) require view('_menu.view.php'); ?>

        <?php if (isset($web['page']['view'])): ?>

        <article class="box">
            <?php require $web['page']['view'] ?>
        </article>

        <?php if (!$web['menu_at_top']) require view('_menu.view.php'); ?>

        <?php endif; ?>

    </main>
</body>
</html>

<?php ob_end_flush(); ?>