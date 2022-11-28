<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Index</title>
</head>
<body>
<h1>LOG - IN</h1>
<form action="login.php" method="post">
<div>
<label for="user" class="form-label">Password</label>
  <input type="text" class="form-control" name="user" id="user" placeholder="Tu nombre de usuario">
</div>
<div class="mb-3">
  <label for="password" class="form-label">Password</label>
  <input type="password" class="form-control" name="password" id="password" placeholder="Tu contraseña">
</div>
<button type="submit" name="enviar" class="btn btn-primary">Log in</button>
</form>
</body>
</html>