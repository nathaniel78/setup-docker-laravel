{{-- Extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários editar</h1>
    </div>

    <form class="form" action="{{ route('usuario.atualizar', $editarUsuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                value="{{ isset($editarUsuario->name) ? $editarUsuario->name : old('name') }}" name="name"
                placeholder="Nome do usuário" aria-label="Nome do usuário" aria-describedby="basic-addon1">
            @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">E-mail</span>
            <input type="text" class="form-control @error('email') is-invalid @enderror"
                value="{{ isset($editarUsuario->email) ? $editarUsuario->email : old('email') }}" name="email"
                placeholder="E-mail do usuário" aria-label="E-mail do usuário" aria-describedby="basic-addon1">
            @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Senha</span>
            <input type="password" class="form-control @error('endereco') is-invalid @enderror"
                value="{{ isset($editarUsuario->password) ? $editarUsuario->password : old('password') }}" name="password"
                placeholder="Senha do usuário" aria-label="Senha do usuário" aria-describedby="basic-addon1">
            @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-success w-100 mb-2">Salvar</button>
        <a href="{{ route('usuario.index') }}" class="btn btn-primary w-100 mb-2">Voltar</a>
    </form>
@endsection
