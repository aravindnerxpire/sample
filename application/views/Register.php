<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h3>Register</h3>
<form method="post" action="<?php echo site_url('user/register'); ?>">
    <label>Name: <input type="text" name="name" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <label>Email: <input type="email" name="email" required></label><br><br>
    <label>Age: <input type="number" name="age" min="0" required></label><br><br>
    <button type="submit" name="create">Create</button>
</form>
</body>
</html>
