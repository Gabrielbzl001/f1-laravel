<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

    class EquipeController {
        function listar() {
            $model = new Equipe();
            $equipes = $model->getAll();
            include_once "views/lista_equipe.php";
        }
        function novo() {
            $equipe = array();
            $equipe['id'] = 0;
            $equipe['nome'] = "";
            $equipe['nacionalidade'] = "";
            // $equipe['data_nasc'] = "";
            // $equipe['equipe'] = "";
            // $equipe['nacionalidade'] = "";
            // $modelEquipe = new Equipe();
            // $equipes = $modelEquipe->getAll();
            include_once "views/formulario_equipe.php";
        }

        function salvar() {
            $equipe = array();
            $equipe['id'] = $_POST['id'];
            $equipe['nome'] = $_POST['nome'];
            //$equipe['nacionalidade'] = $_POST['nacionalidade'];
            // $equipe['data_nasc'] = $_POST['data_nasc'];
            // $equipe['equipe'] = $_POST['equipe'];
            // $equipe['nacionalidade'] = $_POST['nacionalidade'];
            // $equipe['equipe_id'] = $_POST['equipe_id'];
            $model = new equipe();
            if ($equipe['id'] == 0) {
                $model->insert($equipe);
            } else {
                $model->update($equipe);
            }
            header('location: listar');
            
        }

        function editar($id) {
            $model = new equipe();
            $equipe = $model->getById($id);
            $modelEquipe = new Equipe();
            $equipes = $modelEquipe->getAll();
            include_once "views/formulario_equipe.php";
        }

        function apagar($id) {
            $model = new equipe();
            $model->delete($id);
            header('location: '.APP.'equipe/listar'); 
        }
    }
?>