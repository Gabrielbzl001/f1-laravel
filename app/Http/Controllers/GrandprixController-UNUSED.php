<?php
    class GrandprixController {
        function listar() {
            $model = new Grandprix();
            $grandprixs = $model->getAll();
            include_once "views/listagem_grandprix.php";
        }
        function novo() {
            $grandprix = array();
            $grandprix['id'] = 0;
            $grandprix['circuito'] = "";
            $grandprix['data'] = "";
            // $modelCategoria = new Categoria();
            // $categorias = $modelCategoria->getAll();
            include_once "views/formulario_grandprix.php";
        }

        function salvar() {
            $grandprix = array();
            $grandprix['id'] = $_POST['id'];
            $grandprix['circuito'] = $_POST['circuito'];
            $grandprix['data'] = $_POST['data'];
            // $grandprix['autor'] = $_POST['autor'];
            // $grandprix['categoria_id'] = $_POST['categoria_id'];
            $model = new Grandprix();
            if ($grandprix['id'] == 0) {
                $model->insert($grandprix);
            } else {
                $model->update($grandprix);
            }
            header('location: listar');
            
        }

        function editar($id) {
            $model = new Grandprix();
            $grandprix = $model->getById($id);
            // $modelCategoria = new Categoria();
            // $categorias = $modelCategoria->getAll();
            include_once "views/formulario_grandprix.php";
        }

        function apagar($id) {
            $model = new Grandprix();
            $model->delete($id);
            header('location: '.APP.'grandprix/listar'); 
        }
    }
?>