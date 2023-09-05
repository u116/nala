<form class="login" action="/login" method="post">
    <p>Log into your account:</p>
    <input type="text" name="un" id="un" placeholder="Username">
    <input type="password" name="pw" id="pw" placeholder="Password">
    <input type="submit" name="s" id="s" value="Sign In">
</form>

<script>
    document.getElementById("un").focus();
</script>