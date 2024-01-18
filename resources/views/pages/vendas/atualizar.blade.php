{{-- Extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas editar</h1>
    </div>

    <form class="form" action="{{ route('venda.atualizar', $editarVenda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nº da venda</span>
            <input type="text" class="form-control @error('numero_da_venda') is-invalid @enderror" disabled
                value="{{ isset($editarVenda->numero_da_venda) ? $editarVenda->numero_da_venda : old('numero_da_venda') }}"
                name="numero_da_venda" placeholder="Número da venda" aria-label="Numero da venda"
                aria-describedby="basic-addon1">
            @if ($errors->has('nome'))
                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
            @endif
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Produto</span>
            <select class="form-select" aria-label="Selecione um produto" name="produto_id">
                <option>Selecione um produto</option>
                @foreach ($totalProduto as $produto)
                    @if ($editarVenda->produto_id == $produto->id)
                        <option selected value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @else
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endif
                @endforeach
            </select>
            @if ($errors->has('produto_id'))
                <div class="invalid-feedback">{{ $errors->first('produto_id') }}</div>
            @endif
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Cliente</span>
            <select class="form-select" aria-label="Selecione um produto" name="cliente_id">
                <option>Selecione um cliente</option>
                @foreach ($totalCliente as $cliente)
                    @if ($editarVenda->cliente_id == $cliente->id)
                        <option selected value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @else
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endif
                @endforeach
            </select>
            @if ($errors->has('cliente_id'))
                <div class="invalid-feedback">{{ $errors->first('cliente_id') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-success w-100 mb-2">Salvar</button>
        <a href="{{ route('produto.index') }}" class="btn btn-primary w-100 mb-2">Voltar</a>
    </form>
@endsection
