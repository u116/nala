<form class="simple" action="/register" method="post">
    <p>Register an account:</p>
    <?php if (isset($web['page']['var']['user']['username']['message'])) print "<p class='error'>".$web['page']['var']['user']['username']['message']."</p>"?>
    <?php if (isset($web['page']['var']['user']['password']['message'])) print "<p class='error'>".$web['page']['var']['user']['password']['message']."</p>" ?>
    <input type="text" name="u" id="u" placeholder="Username">
    <input type="password" name="p" id="p" placeholder="Password">
    <input type="email" name="e" id="e" placeholder="Email (This can be empty)">
    <input type="submit" name="s" id="s" value="Sign In">
</form>

<script>
    document.getElementById("un").focus();
</script>