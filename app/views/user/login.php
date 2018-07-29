<h2>Login</h2>

<form action="<?=URL?>/user/login" method="POST">
    <label for="email"><b>Username</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
</form>