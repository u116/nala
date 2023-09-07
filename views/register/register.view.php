<form class="simple" action="/register" method="post">
    <p>Register an account:</p>
    <input type="text" name="un" id="un" placeholder="Username">
    <input type="password" name="pw" id="pw" placeholder="Password">
    <input type="email" name="e" id="e" placeholder="Email (This can be empty)">
    <input type="submit" name="s" id="s" value="Sign In">
</form>

<script>
    document.getElementById("un").focus();
</script>