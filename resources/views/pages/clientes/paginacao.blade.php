{{-- Extends da index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
</div>

<form action="{{ route('cliente.index') }}" method="GET">
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Digite o nome" 
    name="pesquisar" aria-label="Digite o nome" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
  </div>
</form>

<div class="row">
    <a href="{{ route('cliente.cadastrar') }}" class="btn btn-primary">Novo</a>
</div>

<h2>Lista de clientes</h2>
      <div class="table-responsive">
        @if($findCliente->isEmpty())
          <h5 class="text-center">Sem registros</h5>
        @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">email</th>
              <th scope="col">endereco</th>
              <th scope="col">logradouro</th>
              <th scope="col">cep</th>
              <th scope="col">bairro</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($findCliente as $cliente)
            <tr>
                <td class="col-2">{{ $cliente->nome }}</td>
                <td class="col-2">{{ $cliente->email }}</td>
                <td class="col-2">{{ $cliente->endereco }}</td>
                <td class="col-2">{{ $cliente->logradouro }}</td>
                <td class="col-1">{{ $cliente->cep }}</td>
                <td class="col-1">{{ $cliente->bairro }}</td>
                <td class="col-2">
                  <a href="{{ route('cliente.editar', $cliente->id) }}" class="btn btn-warning">Editar</a>
                  <meta name='csrf-token' content=" {{ csrf_token() }}" />
                  <a onclick="deleteRegistroPaginacao( '{{ route('cliente.delete') }} ', {{ $cliente->id }}  )"
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