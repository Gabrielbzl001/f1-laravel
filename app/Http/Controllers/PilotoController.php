<?php

namespace App\Http\Controllers;

use App\Models\Piloto;

    class PilotoController extends Controller{
        function listar() {
            // $model = new Piloto();
            $piloto = new Piloto();
            $pilotos = Piloto::all();
            return view('listar-pilotos', compact('pilotos'));
        }
        function novo() {
            $piloto = array();
            $piloto['id'] = 0;
            $piloto['nome'] = "";
            $piloto['numero'] = "";
            $piloto['data_nasc'] = "";
            $piloto['equipe'] = "";
            //$piloto['nacionalidade'] = "";
            $modelEquipe = new Equipe();
            $equipes = $modelEquipe->getAll();
            include_once "views/formulario_piloto.php";
        }

        function salvar() {
            $piloto = array();
            $piloto['id'] = $_POST['id'];
            $piloto['nome'] = $_POST['nome'];
            $piloto['numero'] = $_POST['numero'];
            $piloto['data_nasc'] = $_POST['data_nasc'];
            //$piloto['equipe'] = $_POST['equipe'];
            //$piloto['nacionalidade'] = $_POST['nacionalidade'];
            $piloto['equipe_id'] = $_POST['equipe_id'];
            $model = new Piloto();
            if ($piloto['id'] == 0) {
                $model->insert($piloto);
            } else {
                $model->update($piloto);
            }
            header('location: listar');
            
        }

        function editar($id) {
            $model = new Piloto();
            $piloto = $model->getById($id);
            $modelEquipe = new Equipe();
            $equipes = $modelEquipe->getAll();
            include_once "views/formulario_piloto.php";
        }

        function apagar($id) {
            $model = new Piloto();
            $model->delete($id);
            header('location: '.APP.'piloto/listar'); 
        }
    }
?>