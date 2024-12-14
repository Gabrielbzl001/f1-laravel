<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class Piloto extends Model
{
        // Definir a tabela associada ao modelo
        protected $table = 'piloto';

        // Definir a ordem padrão dos resultados
        protected $orderBy = 'nome';
    
        // Definir a consulta SQL personalizada
        protected $sql = "SELECT p.*, e.nome AS equipe FROM Piloto p JOIN equipe e ON e.id = p.equipe_id ORDER BY nome, id";
    
        // Se você precisar de timestamps automáticos, deixe true (padrão), senão defina como false
        public $timestamps = false;
    
        // Se precisar definir as chaves primárias, use a chave primária personalizada (se não for 'id')
        // protected $primaryKey = 'custom_id';
    
        // Caso queira tratar os campos da tabela com segurança
        protected $fillable = ['nome', 'equipe_id'];
    
        // Definir a relação com a equipe (caso exista)
        public function equipe()
        {
            return $this->belongsTo(Equipe::class, 'equipe_id');
        }

        function getAll() {
            // $conexao = $this->get_connection();
            // if ($this->sql != "") {
            //   $sql = $this->sql;
            // } else {
            //   $sql = "SELECT * FROM $this->table ORDER BY $this->orderBy ";
            // }
            // $dados = array();
            $sentenca = DB::connection()->query("SELECT p.*, e.nome AS equipe FROM Piloto p JOIN equipe e ON e.id = p.equipe_id ORDER BY nome, id", PDO::FETCH_ASSOC);
            $dados = $sentenca->fetchAll();
            return $dados;
        }

        function get_connection() {
            try {
              $conexao = new PDO('pgsql:host=localhost;port=5432;dbname=web3', "postgres", "postgres");
            } catch (PDOException $e) {
              echo "erro de conexao";
            }    
            return $conexao;
        }  
    
}
