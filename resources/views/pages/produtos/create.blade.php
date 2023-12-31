{{-- Extends da index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos cadastrar</h1>
</div>

<form class="form" action="{{ route('produto.cadastrar') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nome</span>
        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome do produto" 
        aria-label="Nome do produto" aria-describedby="basic-addon1">
        @if ($errors->has('nome'))
            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
        @endif
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon2">R$</span>
        <input class="form-control @error('valor') is-invalid @enderror" id="mascara_valor" name="valor"
        placeholder="Valor do produto" aria-label="Valor do produto" aria-describedby="basic-addon2">
        @if ($errors->has('valor'))
            <div class="invalid-feedback">{{ $errors->first('valor') }}</div>
        @endif
      </div>

      <button type="submit" class="btn btn-success w-100 mb-2">Salvar</button>
      <a href="{{ route('produto.index') }}" class="btn btn-primary w-100 mb-2">Voltar</a>
</form>

@endsection