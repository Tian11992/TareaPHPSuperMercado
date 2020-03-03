<?php require_once 'header.php'; ?>

        <h1>Menú Ventas</h1>
        <br>
        <form name="form1" method="POST" action="./?accion=guardarVenta">
        	<p>Producto:
        		<select name="idproducto">
        			<option value="">Seleccione</option>
        			<?php foreach($consultaProductos as $productos): ?>
						<option value="<?= $productos['id']?>"><?= $productos['nombre']?></option>
        			<?php endforeach; ?>
        		</select>
        	<p>Cantidad: <input type="text" name="cantidad"></p>
        	</p>
            <p><input type="submit" name="btnguardarventa" value="Guardar Venta"></p>
        </form>
        <br>

        <table border="1">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Categoría</th>
                    <th>Nombre Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($consultaVentas as $dato): ?>
                <tr>
                    <td><?= $dato['idventa']; ?></td>
                    <td><?= $dato['categoria']; ?></td>
                    <td><?= $dato['nombre']; ?></td>
                    <td><?= $dato['precio']; ?></td>
                    <td><?= $dato['cantidad']; ?></td>
                    <td><?= $dato['total']; ?></td>
                    <td><a href="./?accion=eliminarVenta&id=<?php echo $dato['idventa']; ?>">Eliminar</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <br>
        <br>
        <br>
        <a href="./">Volver</a>
<?php require_once 'footer.php'; ?>