<?php 

	class Tblventas_model
	{

		private $bd;
		private $tblventas;

		public function __construct()
		{
	        $this->bd = Conexion::getConexion();
	        $this->tblventas = array();
    	}

		public function consultarVentas(){
        $consulta = $this->bd->query("SELECT v.idventa, c.nombre categoria, p.nombre, p.precio, v.cantidad, v.total FROM tblventas v INNER JOIN tblproductos p ON p.id = v.idproducto INNER JOIN tblcategorias c ON c.id = p.idcategoria");
        while($fila = $consulta->fetch_assoc()){
            $this->tblventas[] = $fila;
        }
        return $this->tblventas;
    }

    	public function eliminarVenta($idventa)
    	{
    		$sql = "DELETE FROM tblventas WHERE idventa = $idventa";

    		mysqli_query($this->bd, $sql);
    	}

    	public function guardarVenta($datos)
    	{
    		$idproducto = $datos['idproducto'];
    		$cantidad = $datos['cantidad'];
    		$total = $datos['total'];

    		$sql = $this->bd->query("INSERT INTO tblventas VALUES(NULL, $idproducto, $cantidad, $total)");
    	}
	}

?>