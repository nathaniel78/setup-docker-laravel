<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUsuario;
use App\Models\Componentes;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
     /**
     * protected
     */
    protected $user;

    /**
     * construct
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * nome: index
     * descrição: função da página principal
     */
    public function index(Request $request)
    {
        $pesquisar = $request->input('pesquisar', '');
        $findUsuario = $this->user->getPesquisar(search: $pesquisar ?? '');

        return view('pages.usuarios.paginacao', compact('findUsuario'));
    }

    /**
     * nome: cadastrar
     * descrição: função responsável por página de formulário
     */
    public function cadastrar(FormRequestUsuario $request)
    {
        if($request->method() == "POST") {
            $data = $request->all();
            $componentes = new Componentes();
            $data['password'] = $componentes->criptoPassword($data['password']);

            User::create($data);

            Toastr::success('Cadastro realizado com sucesso');

            return redirect()->route('usuario.index');
        }

        return view('pages.usuarios.create');
    }

    /**
     * nome: atualizar
     * descrição: função responsável pela página de formulário com dados
     */
    public function atualizar(FormRequestUsuario $request, $id) 
    {
        if($request->method() == "PUT") {
            $data = $request->all();
            $componentes = new Componentes();
            $data['password'] = $componentes->criptoPassword($data['password']);
            $usuario = User::find($id);
            $usuario->update($data);

            Toastr::success('Atualização realizada com sucesso');

            return redirect()->route('usuario.index');
        }

        $editarUsuario = User::where('id', '=', $id)->first();

        return view('pages.usuarios.atualizar', compact('editarUsuario'));
    }

    /**
     * nome: delete
     * descrição: função responsável por deletar registro
     */
    public function delete(Request $request) 
    {
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();

        Toastr::success('Exclusão realizada com sucesso');

        return response()->json(['success' => true]);
    }
}
