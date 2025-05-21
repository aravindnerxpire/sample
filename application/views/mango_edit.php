<!DOCTYPE html>
<html>
<head>
    <title>Edit Mango & Pineapple</title>
</head>
<body>
    <h2>Edit Mango & Pineapple</h2>
    <form method="post" action="<?= site_url('mango/update/' . $mango->id) ?>">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($mango->name) ?>" required><br><br>

        <label>Age:</label><br>
        <input type="number" name="age" value="<?= htmlspecialchars($mango->age) ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($mango->email) ?>" required><br><br>

        <label>New Password (leave blank to keep current):</label><br>
        <input type="password" name="password"><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
