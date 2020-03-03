<?php 

require_once 'model/Tblcategorias_model.php';

class Tblcategorias_controller{

    private $model_categorias;

    public function __construct(){
        $this->model_categorias = new Tblcategorias_model();
    }

    public function menuCategorias(){
        $consulta =  $this->model_categorias->consultarCategorias();
        require_once 'view/menuCategorias.php';
    }

    public function guardarCategoria(){
        $dato['nombre'] = $_POST["txtnombre"];
        $this->model_categorias->insertarCategoria($dato);
        $this->menuCategorias();
    }

    public function modificarCategoria()
    {
        $id = $_REQUEST['id'];
        $consultaCategoria = $this->model_categorias->consultarCategoriaPorId($id);
        $consultaCategorias = $this->model_categorias->consultarCategorias();
        
        require_once 'view/tblcategoria_modificar.php';
    }

    public function guardarCambiosCategoria()
    {
        $datos['id'] = $_POST['id'];
        $datos['categoria'] = $_POST['categoria'];

        $this->model_categorias->actualizarCategoria($datos);
        $this->menuCategorias();
    }

}

?>