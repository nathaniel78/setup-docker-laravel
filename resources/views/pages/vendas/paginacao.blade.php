{{-- Extends da index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendas</h1>
</div>

<form action="{{ route('venda.index') }}" method="GET">
  <div class="input-group mb-3">
    <input type="number" class="form-control" placeholder="Digite o número" 
    name="pesquisar" aria-label="Digite o nome" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
  </div>
</form>

<div class="row">
    <a href="{{ route('venda.cadastrar') }}" class="btn btn-primary">Novo</a>
</div>

<h2>Lista de vendas</h2>
      <div class="table-responsive">
        @if($findVenda->isEmpty())
          <h5 class="text-center">Sem registros</h5>
        @else
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Número do pedido</th>
              <th scope="col">Produto</th>
              <th scope="col">Cliente</th>
              <th scope="col">E-mail</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($findVenda as $venda)
            <tr>
                <td class="col-2">{{ $venda->numero_da_venda }}</td>
                <td class="col-2">{{ $venda->produto->nome }}</td>
                <td class="col-3">{{ $venda->cliente->nome }}</td>
                <td class="col-2">{{ $venda->cliente->email }}</td>
                <td class="col-3">
                  <a href="{{ route('venda.editar', $venda->id) }}" class="btn btn-warning">Editar</a>
                  <meta name='csrf-token' content=" {{ csrf_token() }}" />
                  <a onclick="deleteRegistroPaginacao( '{{ route('venda.delete') }} ', {{ $venda->id }}  )"
                      class="btn btn-danger">
                      Excluir
                  </a>
                  <a href="{{ route('venda.comprovante', $venda->id) }}" onclick="confirm('Deseja enviar comprovante de venda ao cliente?')" class="btn btn-info">E-mail</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>

@endsection