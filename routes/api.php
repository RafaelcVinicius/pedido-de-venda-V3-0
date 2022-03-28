<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('produtos', [ApiController::class, 'produtos'])->name('produtos');
Route::post('produtoswhere', [ApiController::class, 'produtoswhere'])->name('produtoswhere');

Route::get('clientes', [ApiController::class, 'clientes'])->name('clientes');
Route::post('clienteswhere', [ApiController::class, 'clienteswhere'])->name('clienteswhere');

route::get('especies', [ApiController::class, 'especies'])->name('especies');

route::get('formasentrega', [ApiController::class, 'formasentrega'])->name('formasentrega');

route::get('consultauf', [ApiController::class, 'consultauf'])->name('consultauf');
route::post('consultacidadesuf', [ApiController::class, 'consultacidadesuf'])->name('consultacidadesuf');

Route::get('consultaaplicaca', [ApiController::class, 'consultaAplicaca'])->name('consultaaplicaca');
Route::get('consultaun', [ApiController::class, 'consultaUn'])->name('consultaun');

Route::get('pedido', [ApiController::class, 'pedido'])->name('pedido');
