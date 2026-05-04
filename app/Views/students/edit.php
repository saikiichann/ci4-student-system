<!DOCTYPE html>
<html>
<head>
  <title>Edit Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <?php $student = isset($student) ? $student : ['id' => '', 'name' => '', 'email' => '', 'course' => '']; ?>
  <h2>Edit Student</h2>
  <form method="POST" action="/students/update/<?= $student['id'] ?>">
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" value="<?= $student['name'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" value="<?= $student['email'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Course</label>
      <input type="text" name="course" value="<?= $student['course'] ?>" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="/students" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>
