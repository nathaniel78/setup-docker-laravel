<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * nome: index
     * descrição: função da página principal
     */
    public function index()
    {
        $totalProdutos = $this->totalProdutosCadastrados();
        $totalclientes = $this->totalClientesCadastrados();
        $totalVendas = $this->totalVendasCadastrados();
        $totalUsuarios = $this->totalUsuariosCadastrados();

        return view('pages.dashboard.home', compact('totalProdutos', 'totalclientes', 'totalVendas', 'totalUsuarios'));
    }

    /**
     * nome: totalProdutosCadastrados
     * descrição: função contar total de produtos
     */
    public function totalProdutosCadastrados()
    {
        $total = Produto::all()->count();

        return $total;
    }

    /**
     * nome: totalClientesCadastrados
     * descrição: função contar total de clientes
     */
    public function totalClientesCadastrados()
    {
        $total = Cliente::all()->count();

        return $total;
    }

    /**
     * nome: totalVendasCadastrados
     * descrição: função contar total de vendas
     */
    public function totalVendasCadastrados()
    {
        $total = Venda::all()->count();

        return $total;
    }

     /**
     * nome: totalVendasCadastrados
     * descrição: função contar total de usuarios
     */
    public function totalUsuariosCadastrados()
    {
        $total = User::all()->count();

        return $total;
    }
}
