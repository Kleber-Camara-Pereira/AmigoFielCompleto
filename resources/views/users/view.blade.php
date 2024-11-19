@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-light rounded shadow" style="background-color: #b0c4e1; padding: 20px; margin-top: 50px; margin-bottom: 50px;">
                <div class="text-center">
                    <h1>Perfil</h1>
                </div>
                <div class="mt-4">
                    <h5>Informações do Usuário</h5>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label font-weight-bold">Nome:</label>
                            <p id="name">{{ $user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label font-weight-bold">Email:</label>
                            <p id="email">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cpf" class="form-label font-weight-bold">CPF:</label>
                            <p id="cpf">{{ $user->cpf }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label font-weight-bold">Telefone:</label>
                            <p id="phone">{{ $user->phone }}</p>
                        </div>
                    </div>

                    <h5>Endereço</h5>
                    <hr>
                    <div class="border p-3 mb-4" style="border: 2px solid #007bff; border-radius: 5px;">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="municipio" class="form-label font-weight-bold">Município:</label>
                                <p id="municipio">{{ $user->address->municipio }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="estado" class="form-label font-weight-bold">Estado:</label>
                                <p id="estado">{{ $user->address->estado }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="bairro" class="form-label font-weight-bold">Bairro:</label>
                                <p id="bairro">{{ $user->address->bairro }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="rua" class="form-label font-weight-bold">Rua:</label>
                                <p id="rua">{{ $user->address->rua }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="numero" class="form-label font-weight-bold">Número:</label>
                                <p id="numero">{{ $user->address->numero }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="cep" class="form-label font-weight-bold">CEP:</label>
                                <p id="cep">{{ $user->address->cep }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="created_at" class="form-label font-weight-bold">Criado em:</label>
                        <p id="created_at">{{ $user->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('users.atualizar', $user->id) }}" class="btn btn-primary">Editar Perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
