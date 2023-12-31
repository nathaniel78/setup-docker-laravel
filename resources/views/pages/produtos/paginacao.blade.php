{{-- Extends da index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
</div>

<form action="{{ route('produto.index') }}" method="GET">
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Digite o nome" 
    name="pesquisar" aria-label="Digite o nome" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
  </div>
</form>

<div class="row">
    <a href="{{ route('produto.cadastrar') }}" class="btn btn-primary">Novo</a>
</div>

<h2>Lista de produtos</h2>
      <div class="table-responsive">
        @if($findProduto->isEmpty())
          <h5 class="text-center">Sem registros</h5>
        @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Valor</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($findProduto as $produto)
            <tr>
                <td class="col-6">{{ $produto->nome }}</td>
                <td class="col-4">{{ 'R$' . ' ' . number_format($produto->valor, 2, ',', '.') }}</td>
                <td class="col-2">
                  <button type="button" class="btn btn-warning">Editar</button>
                  <meta name='csrf-token' content=" {{ csrf_token() }}" />
                  <a onclick="deleteRegistroPaginacao( '{{ route('produto.delete') }} ', {{ $produto->id }}  )"
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