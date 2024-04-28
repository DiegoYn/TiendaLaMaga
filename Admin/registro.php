<?php
echo "olaaaa"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<link rel="stylesheet" href="../styles.css"/>
<body>
<?php $url="http://".$_SERVER['HTTP_HOST']."/index.php"?>
<?php include('template/header.php');?>

<div class="container py-5 mt-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <br/><br/><br/>
            <div class="card">
                <div class="card-header">Registro</div>
                <div class="card-body">
                    <?php if ($mensaje != ''): ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Usuario:</label>
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="password" class="form-control" name="contrasenia" placeholder="Contraseña" required>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('template/footer.php');?>
</body>
</html>
