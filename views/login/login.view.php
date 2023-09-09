<form class="simple" action="/login" method="post">
    <p>Log into your account:</p>
    <?php if (isset($web['page']['var']['user']['username']['message'])) print "<p class='error'>".$web['page']['var']['user']['username']['message']."</p>"?>
    <?php if (isset($web['page']['var']['user']['password']['message'])) print "<p class='error'>".$web['page']['var']['user']['password']['message']."</p>" ?>
    <input type="text" name="u" id="u" placeholder="Username" value="<?php if (isset($web['page']['var']['user']['username']['username'])) print $web['page']['var']['user']['username']['username'] ?>">
    <input type="password" name="p" id="p" placeholder="Password">
    <input type="submit" name="s" id="s" value="Sign In">
</form>

<script>
    document.getElementById("u").focus();
</script>