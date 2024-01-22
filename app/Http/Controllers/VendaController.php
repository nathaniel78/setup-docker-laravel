<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteVendaEmail;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Venda;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;

class VendaController extends Controller
{
     /**
     * protected
     */
    protected $venda;

    /**
     * construct
     */
    public function __construct(Venda $venda) 
    {
        $this->venda = $venda;
    }

    /**
     * nome: index
     * descrição: função da página principal
     */
    public function index(Request $request) 
    {
        $pesquisar = $request->input('pesquisar', '');
        $findVenda = $this->venda->getPesquisar(search: $pesquisar ?? '');

        return view('pages.vendas.paginacao', compact('findVenda'));
    }

    /**
     * nome: cadastrar
     * descrição: função responsável por página de formulário
     */
    public function cadastrar(FormRequestVenda $request)
    {
        $numeracaoVenda = Venda::max('numero_da_venda') + 1;
        $totalProduto = Produto::all();
        $totalCliente = Cliente::all();

        if($request->method() == "POST") {
            $data = $request->all();
            $data['numero_da_venda'] = $numeracaoVenda;

            Venda::create($data);

            Toastr::success('Cadastro realizado com sucesso');

            return redirect()->route('venda.index');
        }

        return view('pages.vendas.create', compact('numeracaoVenda', 'totalProduto', 'totalCliente'));
    }

    /**
     * nome: atualizar
     * descrição: função responsável pela página de formulário com dados
     */
    public function atualizar(FormRequestVenda $request, $id) 
    {
        $totalProduto = Produto::all();
        $totalCliente = Cliente::all();

        if($request->method() == "PUT") {
            $data = $request->all();

            $venda = Venda::find($id);
            $venda->update($data);

            Toastr::success('Atualização realizada com sucesso');

            return redirect()->route('venda.index');
        }

        $editarVenda = Venda::where('id', '=', $id)->first();
        // dd($editarVenda);

        return view('pages.vendas.atualizar', compact('editarVenda', 'totalProduto', 'totalCliente'));
    }

    /**
     * nome: delete
     * descrição: função responsável por deletar registro
     */
    public function delete(Request $request) 
    {
        $id = $request->id;
        $buscaRegistro = Venda::find($id);
        $buscaRegistro->delete();

        Toastr::success('Exclusão realizada com sucesso');

        return response()->json(['success' => true]);
    }

    /**
     * nome: enviar email
     * descrição: função responsável por enviar email, comprovante
     */
    public function enviarComprovanteEmail($id)
    {
        $buscaVenda = Venda::where('id', '=', $id)->first();
        $nomeCliente = $buscaVenda->cliente->nome;
        $emailCliente = $buscaVenda->cliente->email;
        $nomeProduto = $buscaVenda->produto->nome;
        $sendMailData = [
            'produtoNome' => $nomeProduto,
            'clienteNome' => $nomeCliente,
        ];
        // dd($sendMailData);
        
        Mail::to($emailCliente)->send(new ComprovanteVendaEmail($sendMailData));

        Toastr::success('Comprovante enviado com sucesso');
        return redirect()->route('venda.index');
    }
}
