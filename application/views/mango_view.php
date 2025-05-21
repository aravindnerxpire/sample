<!DOCTYPE html>
<html>
<head>
    <title>Mango & Pineapple List</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <h2>List of Mangos and Their Pineapples</h2>

    <!-- Add User Button -->
    <p>
        <a href="<?= site_url('mango/create') ?>">
            <button>Add User</button>
        </a>
    </p>

    <!-- Data Table -->
    <table id="mytable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mangos as $row): ?>
            <tr>
                <td><?= $row->id ?></td>
                <td><?= $row->name ?></td>
                <td><?= $row->age ?></td>
                <td><?= $row->email ?? 'N/A' ?></td>
                <td>
                    <a href="<?= site_url('mango/edit/' . $row->id) ?>"class="btn btn-primary">Edit</a> |
                    <a href="<?= site_url('mango/delete/' . $row->id) ?>" onclick="return confirm('Are you sure you want to delete this record?');"class="btn btn-primary">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Logout Button (moved outside the table) -->
    <p>
        <a href="<?= site_url('mango/logout') ?>">
            <button>Logout</button>
        </a>
    </p>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
</body>
</html>
