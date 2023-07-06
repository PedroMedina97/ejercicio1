<?= session_start();?>

<?php if (isset($_SESSION['status']) && $_SESSION['status'] == true && $_SESSION['type']== 'admin'): ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                Bienvenido usuario admin <?= $_SESSION['name'] ?>
                <a href="cerrar.php" class="btn btn-primary">Cerrar Sesión</a>
                <!-- link para logout -->
            </div>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                Acceso denegado
                <a href="index.php">Ir al Login</a>
                <!-- hacer link al form login -->
            </div>
        </div>
    </div>
</div>
<?php endif;?>