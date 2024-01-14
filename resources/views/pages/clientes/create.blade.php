{{-- Extends da index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes cadastrar</h1>
</div>

<form class="form" action="{{ route('cliente.cadastrar') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nome</span>
        <input type="text" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}"
        name="nome" placeholder="Nome do cliente" aria-label="Nome do cliente" aria-describedby="basic-addon1">
        @if ($errors->has('nome'))
            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
        @endif
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">E-mail</span>
        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
        name="email" placeholder="E-mail do cliente" aria-label="E-mail do cliente" aria-describedby="basic-addon1">
        @if ($errors->has('email'))
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        @endif
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Endereço</span>
        <input type="text" class="form-control @error('endereco') is-invalid @enderror" value="{{ old('endereco') }}"
        name="endereco" id="endereco" placeholder="Endereço do cliente" aria-label="Endereço do cliente" aria-describedby="basic-addon1">
        @if ($errors->has('endereco'))
            <div class="invalid-feedback">{{ $errors->first('endereco') }}</div>
        @endif
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Logradouro</span>
        <input type="text" class="form-control @error('logradouro') is-invalid @enderror" value="{{ old('logradouro') }}"
        name="logradouro" id="logradouro" placeholder="Logradouro do cliente" aria-label="Logradouro do cliente" aria-describedby="basic-addon1">
        @if ($errors->has('logradouro'))
            <div class="invalid-feedback">{{ $errors->first('logradouro') }}</div>
        @endif
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">CEP</span>
        <input type="text" class="form-control @error('cep') is-invalid @enderror" value="{{ old('cep') }}" data-mask="00000-000"
        id="cep" name="cep" placeholder="CEP do cliente" aria-label="CEP do cliente" aria-describedby="basic-addon1">
        @if ($errors->has('cep'))
            <div class="invalid-feedback">{{ $errors->first('cep') }}</div>
        @endif
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Bairro</span>
        <input type="text" class="form-control @error('bairro') is-invalid @enderror" value="{{ old('bairro') }}"
        name="bairro" id="bairro" placeholder="Bairro do cliente" aria-label="Bairro do cliente" aria-describedby="basic-addon1">
        @if ($errors->has('bairro'))
            <div class="invalid-feedback">{{ $errors->first('bairro') }}</div>
        @endif
      </div>

      <button type="submit" class="btn btn-success w-100 mb-2">Salvar</button>
      <a href="{{ route('cliente.index') }}" class="btn btn-primary w-100 mb-2">Voltar</a>
</form>

@endsection