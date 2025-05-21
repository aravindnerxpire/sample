<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h3>Login</h3>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="<?php echo site_url('user/login'); ?>">
    <label>Name: <input type="text" name="name" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit" name="login">Login</button>
</form>

<br>

<!-- Register Button -->
<form method="get" action="<?php echo site_url('user/register'); ?>">
    <button type="submit">Register</button>
</form>

</body>
</html>
