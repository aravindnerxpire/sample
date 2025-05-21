<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h3>Users List</h3>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Action</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['age']; ?></td>
            <td><a href="<?php echo site_url('user/edit/'.$user['id']); ?>">Update</a></td>
            <td><a href="<?php echo site_url('user/delete/'.$user['id']); ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<a href="<?php echo site_url('user/logout'); ?>">Logout</a>
</body>
</html>
