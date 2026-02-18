<?php
include 'components/pdo.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: view.php');
    exit();
}

$id = (int) $_GET['id'];
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');

    if ($firstname === '' || $lastname === '') {
        $error = 'First name and last name are required.';
    } else {
        $sql = 'UPDATE users SET firstname = ?, lastname = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstname, $lastname, $id]);
        header('Location: view.php');
        exit();
    }
}

$stmt = $pdo->prepare('SELECT id, firstname, lastname FROM users WHERE id = ?');
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header('Location: view.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 560px;">
      <div class="card-body">
        <h1 class="h4 mb-4">Update User</h1>

        <?php if ($error !== ''): ?>
          <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>

        <form method="post" action="update.php?id=<?php echo $user['id']; ?>">
          <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo htmlspecialchars($user['firstname'], ENT_QUOTES, 'UTF-8'); ?>" required>
          </div>

          <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo htmlspecialchars($user['lastname'], ENT_QUOTES, 'UTF-8'); ?>" required>
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="view.php" class="btn btn-outline-secondary">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
