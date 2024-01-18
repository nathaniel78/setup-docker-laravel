{{-- Extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos cadastrar</h1>
    </div>

    <form class="form" action="{{ route('venda.cadastrar') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nº da venda</span>
            <input type="text" class="form-control @error('numero_da_venda') is-invalid @enderror"
                value="{{ $numeracaoVenda }}" name="numero_da_venda" placeholder="Número da venda" aria-label="Numero da venda"
                aria-describedby="basic-addon1" disabled>
            @if ($errors->has('numero_da_venda'))
                <div class="invalid-feedback">{{ $errors->first('numero_da_venda') }}</div>
            @endif
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Produto</span>
            <select class="form-select" aria-label="Selecione um produto" name="produto_id">
                <option selected>Selecione um produto</option>
                @foreach ($totalProduto as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
            @if ($errors->has('produto_id'))
                <div class="invalid-feedback">{{ $errors->first('produto_id') }}</div>
            @endif
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Cliente</span>
            <select class="form-select" aria-label="Selecione um produto" name="cliente_id">
                <option selected>Selecione um cliente</option>
                @foreach ($totalCliente as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
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
