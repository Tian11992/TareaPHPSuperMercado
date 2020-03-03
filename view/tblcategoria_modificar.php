<?php require_once 'header.php'; ?>

        <h1>Modificación de categoría</h1>
        <br>
        <?php foreach($consultaCategoria as $datoCategoria): ?>
            <form name="form1" method="POST" action="./?accion=guardarCambiosCategoria">
                <p>ID: <input type="text" name="id" value="<?php echo $datoCategoria['id'] ?>" readonly></p>
                <p>Categoría: <input type="text" name="categoria" value="<?= $datoCategoria['nombre']?>"></p>
                <p><input type="submit" name="btnguardarcategoria" value="Guardar categoria"></p>
            </form>
        <?php endforeach; ?>

        <br>
        <br>
        <br>
        <a href="./?accion=menuCategorias">Volver</a>
<?php require_once 'footer.php'; ?>