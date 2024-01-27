{{-- Extends da index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuários</h1>
</div>

<form action="{{ route('usuario.index') }}" method="GET">
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Digite o nome" 
    name="pesquisar" aria-label="Digite o nome" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
  </div>
</form>

<div class="row">
    <a href="{{ route('usuario.cadastrar') }}" class="btn btn-primary">Novo</a>
</div>

<h2>Lista de Usuários</h2>
      <div class="table-responsive">
        @if($findUsuario->isEmpty())
          <h5 class="text-center">Sem registros</h5>
        @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">email</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($findUsuario as $usuario)
            <tr>
                <td class="col-3">{{ $usuario->name }}</td>
                <td class="col-7">{{ $usuario->email }}</td>
                <td class="col-2">
                  <a href="{{ route('usuario.editar', $usuario->id) }}" class="btn btn-warning">Editar</a>
                  <meta name='csrf-token' content=" {{ csrf_token() }}" />
                  <a onclick="deleteRegistroPaginacao( '{{ route('usuario.delete') }} ', {{ $usuario->id }}  )"
                      class="btn btn-danger">
                      Excluir
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>

@endsection