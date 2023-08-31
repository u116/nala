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

<link type="image/jpg" sizes="32x32" rel="icon" href="/public/storage/anmi.jpg">
<link rel="stylesheet" href="/public/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

</head>
<body>
<script>0</script> <!-- Css doesn't load in time without applying this. Very quick fix found on google -->
<div class="container">
    <!-- Este wrapper sirve para colocar el header y  cuerpo en la parte superior de la web y el footer en la inferior, mediante la propiedad flex 'space-between' en div.container -->
    <div class="wrapper">
        <?php #require '../resources/views/header.view.php' ?>

        <!-- For production
        <div class="top-info">
            <p>This website is currently in the making and far from completed. It's online for portfolio reasons or reference.</p>
        </div>
        -->

        <main>
            <?php require $web['page']['route'] ?>
        </main>

    </div>
    <?php #require "../resources/views/footer.view.php" ?>

</div>

</body>
</html>

<?php ob_end_flush(); ?>