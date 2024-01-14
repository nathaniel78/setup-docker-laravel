<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCliente;
use App\Models\Cliente;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * protected
     */
    protected $cliente;

    /**
     * construct
     */
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * nome: index
     * descrição: função da página principal
     */
    public function index(Request $request)
    {
        $pesquisar = $request->input('pesquisar', '');
        $findCliente = $this->cliente->getPesquisar(search: $pesquisar ?? '');

        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    /**
     * nome: cadastrar
     * descrição: função responsável por página de formulário
     */
    public function cadastrar(FormRequestCliente $request)
    {
        if($request->method() == "POST") {
            $data = $request->all();
            Cliente::create($data);

            Toastr::success('Cadastro realizado com sucesso');

            return redirect()->route('cliente.index');
        }

        return view('pages.clientes.create');
    }

    /**
     * nome: atualizar
     * descrição: função responsável pela página de formulário com dados
     */
    public function atualizar(FormRequestCliente $request, $id) 
    {
        if($request->method() == "PUT") {
            $data = $request->all();
            $cliente = Cliente::find($id);
            $cliente->update($data);

            Toastr::success('Atualização realizada com sucesso');

            return redirect()->route('cliente.index');
        }

        $editarCliente = Cliente::where('id', '=', $id)->first();

        return view('pages.clientes.atualizar', compact('editarCliente'));
    }

    /**
     * nome: delete
     * descrição: função responsável por deletar registro
     */
    public function delete(Request $request) 
    {
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();

        Toastr::success('Exclusão realizada com sucesso');

        return response()->json(['success' => true]);
    }

}
