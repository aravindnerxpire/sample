<!DOCTYPE html>
<html>
<head>
    <title>Add Mango + Pineapple</title>
</head>
<body>
    <h2>Add New Mango & Pineapple</h2>
    <form method="post" action="<?= site_url('mango/create') ?>">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Age:</label><br>
        <input type="number" name="age" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Add">
    </form>
</body>
</html>
