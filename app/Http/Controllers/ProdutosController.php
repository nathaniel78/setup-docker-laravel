<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * protected
     */
    protected $produto;

    /**
     * construct
     */
    public function __construct(Produto $produto) 
    {
        $this->produto = $produto;
    }

    /**
     * nome: index
     * descrição: função da página principal
     */
    public function index(Request $request) 
    {
        $pesquisar = $request->input('pesquisar', '');
        $findProduto = $this->produto->getPesquisar(search: $pesquisar ?? '');

        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    /**
     * nome: cadastrar
     * descrição: função responsável por página de formulário
     */
    public function cadastrar(FormRequestProduto $request)
    {
        if($request->method() == "POST") {
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Produto::create($data);

            Toastr::success('Cadastro realizado com sucesso');

            return redirect()->route('produto.index');
        }

        return view('pages.produtos.create');
    }

    /**
     * nome: atualizar
     * descrição: função responsável pela página de formulário com dados
     */
    public function atualizar(FormRequestProduto $request, $id) 
    {
        if($request->method() == "PUT") {
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            $produto = Produto::find($id);
            $produto->update($data);

            Toastr::success('Atualização realizada com sucesso');

            return redirect()->route('produto.index');
        }

        $editarProduto = Produto::where('id', '=', $id)->first();

        return view('pages.produtos.atualizar', compact('editarProduto'));
    }

    /**
     * nome: delete
     * descrição: função responsável por deletar registro
     */
    public function delete(Request $request) 
    {
        $id = $request->id;
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();

        Toastr::success('Exclusão realizada com sucesso');

        return response()->json(['success' => true]);
    }
}
