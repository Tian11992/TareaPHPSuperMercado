<?php

	require_once('model/Tblventas_model.php');
	require_once('model/Tblproductos_model.php');

	class Tblventas_controller
	{
		private $model_ventas;
		private $model_productos;

		public function __construct()
		{
			$this->model_ventas = new Tblventas_model();
			$this->model_productos = new Tblproductos_model();
		}

		public function menuVentas(){
        $consultaVentas =  $this->model_ventas->consultarVentas();
        $consultaProductos = $this->model_productos->consultarProductos();
        require_once 'view/menuVentas.php';
    }

    	public function eliminarVenta()
    	{
    		$idventa = $_REQUEST['id'];

    		$this->model_ventas->eliminarVenta($idventa);

    		$this->menuVentas();
    	}

    	public function guardarVenta()
    	{
    		$datos['idproducto'] = $_POST['idproducto'];
    		$datos['cantidad'] = $_POST['cantidad'];
    		$precio = $this->model_productos->consultarProductoPorId($datos['idproducto']);
    		$datos['total'] = $precio[0]['precio'] * $datos['cantidad'];

    		$this->model_ventas->guardarVenta($datos);
    		$this->menuVentas();
    	}
	}

?>