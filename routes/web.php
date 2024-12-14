<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use Illuminate\Support\Facades\DB;

Route::get('/test-connection', function () {
    try {
        $pdo = DB::connection()->getPdo();
        var_dump($pdo);
        echo "Conectado com sucesso ao banco de dados!";
    } catch (\Exception $e) {
        echo "Não foi possível conectar ao banco de dados. Erro: " . $e->getMessage();
    }
});

Route::get('/pilotos', [PilotoController::class, 'listar']);
Route::get('/equipes', [EquipeController::class, 'equipes']);