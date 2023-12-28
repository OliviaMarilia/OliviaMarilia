l.<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\candidato;
/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------------ --------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
    Route::post('/cadastrar-candidatos', function (Request $informacoes) {
        candidato::create ([
              'nome'=> $informacoes->nome_candidato,
              'telefone'=> $informacoes->telefone_candidatos,
              'morada'=> $informacoes->morada_candidatos,

        ]);
        echo "candidato cadastrado com  sucesso";
        //debug
        //die
    });
 Route::get('/mostrar-candidato/{id_do_candidato}', function ($id_do_candidato) {
//dd($id_do_candidato);
$candidato = candidato::findOrFail($id_do_candidato);
extract($row_candidato);

echo "ID candidato:$id  <br>";
echo "Nome do candidato:$nome  <br>";
echo "Telefone do candidato:$telefone  <br>";
echo "morada do candidato:$morada  <br>";


echo $candidato->nome;
echo "<br />";
echo $candidato->telefone;
echo "<br />";
echo $candidato->morada;

   });

    Route::get('/editar-candidato/{id_do_candidato}', function ($id_do_candidato) {
        $candidato = candidato::findOrFail($id_do_candidato);
        return view('editar_candidato',['candidato'=> $candidato]);
});

Route::put('/atualizar-candidato/{id_do_candidato}', function (Request $informacoes, $id_do_candidato) {
    $candidato = candidato::findOrFail($id_do_candidato);
    $candidato->nome = $informacoes->nome_candidato;
    $candidato->telefone = $informacoes->telefone_candidatos;
    $candidato->morada = $informacoes->morada_candidatos;
    $candidato->save();
    echo"Candidato atualizado com Sucesso!";

});

Route::get('/excluir-candidato/{id_do_candidato}', function (Request $informacoes, $id_do_candidato) {
    $candidato = candidato::findOrFail($id_do_candidato);
    $candidato->delete();
   echo "Candidato excluido com sucesso";

});
