<!DOCTYPE html>
<html>
<head>
  <title>Students</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h2>Student List</h2>
  <a href="/students/create" class="btn btn-primary mb-3">Add New Student</a>

  <form method="GET" action="/students" class="mb-3">
    <div class="input-group">
      <input type="text" name="search" value="<?= $search ?? '' ?>" placeholder="Search name or course" class="form-control">
      <button type="submit" class="btn btn-secondary">Search</button>
    </div>
  </form>

  <table class="table table-bordered table-striped">
    <tr class="table-dark">
      <th>Name</th><th>Email</th><th>Course</th><th>Actions</th>
    </tr>
    <?php foreach($students ?? [] as $s): ?>
    <tr>
      <td><?= $s['name'] ?></td>
      <td><?= $s['email'] ?></td>
      <td><?= $s['course'] ?></td>
      <td>
        <a href="/students/edit/<?= $s['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="/students/delete/<?= $s['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php if (isset($pager)): ?>
    <?= $pager->links() ?>
  <?php endif; ?>
</body>
</html>
