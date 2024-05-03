<?php

if (isset($web['page']['var']['redirects'])) {
    print "<div class='redirect-list'>";
        foreach ($web['page']['var']['redirects'] as $redirects => $redirect) {
            print "<a class='button' href='/r/{$redirect['name']}' target='__blank'>{$redirect['name']}</a>";
        }
    print "</div>";
}

?>

<form class="simple" action="/redirect" method="post">
    <p>Create a new redirect:</p>
    <?php if (isset($web['page']['var']['error'])) print "<p class='error'>".$web['page']['var']['error']."</p>"?>
    <input type="text" name="n" id="n" placeholder="Name" autocomplete="off">
    <input type="text" name="u" id="u" placeholder="URL" autocomplete="off">
    <input type="submit" name="s" id="s" value="Submit">
</form>

<script>
    document.getElementById("u").focus();
</script>