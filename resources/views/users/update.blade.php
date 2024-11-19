@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-light rounded shadow" style="background-color: #b0c4e1; padding: 20px; margin-top: 50px; margin-bottom: 50px;">
                <div class="text-center">
                    <h1>Editar Perfil</h1>
                </div>
                <div class="mt-4">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h5>Informações do Usuário</h5>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label font-weight-bold">Nome:</label>
                                <input id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label font-weight-bold">Email:</label>
                                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cpf" class="form-label font-weight-bold">CPF:</label>
                                <input id="cpf" name="cpf" value="{{ old('cpf', $user->cpf) }}" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label font-weight-bold">Telefone:</label>
                                <input id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control" required>
                            </div>
                        </div>

                        <h5>Endereço</h5>
                        <hr>
                        <div class="border p-3 mb-4" style="border: 2px solid #007bff; border-radius: 5px;">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="municipio" class="form-label font-weight-bold">Município:</label>
                                    <input id="municipio" name="municipio" value="{{ old('municipio', $user->address->municipio) }}" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="estado" class="form-label font-weight-bold">Estado:</label>
                                    <input id="estado" name="estado" value="{{ old('estado', $user->address->estado) }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="bairro" class="form-label font-weight-bold">Bairro:</label>
                                    <input id="bairro" name="bairro" value="{{ old('bairro', $user->address->bairro) }}" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="rua" class="form-label font-weight-bold">Rua:</label>
                                    <input id="rua" name="rua" value="{{ old('rua', $user->address->rua) }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="numero" class="form-label font-weight-bold">Número:</label>
                                    <input id="numero" name="numero" value="{{ old('numero', $user->address->numero) }}" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="cep" class="form-label font-weight-bold">CEP:</label>
                                    <input id="cep" name="cep" value="{{ old('cep', $user->address->cep) }}" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Atualizar Perfil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
