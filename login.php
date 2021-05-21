<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" 
  content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Controle de Estoque</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top" style="min-height:70px">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
          data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <img src="assets/img/logo.png">
        </a>
      </div>
    </div>
  </nav>

  <div class="container col-md-offset-3" style="min-height:500px;margin-top:120px">
    <div class="row">
      <div class="col-md-4">
        <h3 align="center">Login</h3><hr>
      </div>
    </div>
    <div class="col-md-4">
      <form action="oper/login.php" method="post">
        <div class="form-group">
          <label>Matrícula</label>
          <input type="text" class="form-control" name="matricula" required>
        </div>
        <div class="form-group">
          <label>Senha</label>
          <input type="password" class="form-control" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary" style="width:140px">Entrar</button>
      </form>
    </div>
  </div>

  <div class="container-fluid" align="center">
    <footer class="footer" style="border-top:1px solid #ccc">
      <small>&copy; Direitos Reservados - <?php echo date('Y') ?></small>
    </footer>
  </div>

</body>
</html>
