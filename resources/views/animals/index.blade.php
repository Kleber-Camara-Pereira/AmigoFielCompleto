@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Painel que envolve a lista de Animais -->
            <div class="bg-light rounded shadow" style="background-color: #b0c4e1; padding: 20px; margin-top: 70px; margin-bottom: 50px;">
                <div class="text-center">
                    <h1>Lista de Animais</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Espécie</th>
                                <th class="text-center">Ações</th> <!-- Centraliza o cabeçalho "Ações" -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($animais as $animal)
                                <tr>
                                    <td>{{ $animal->nome }}</td>
                                    <td>{{ $animal->especie }}</td>
                                    <td class="text-center"> <!-- Centraliza os botões dentro da coluna "Ações" -->
                                        <!-- Botão de Detalhes -->
                                        <a href="{{ route('animals.show', $animal->id) }}" class="btn" style="background-color: #0486C9; color: white; border: none; transition: background-color 0.3s ease;">Detalhes</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilo adicional para o hover -->
<style>
    .btn:hover {
        background-color: #0371A4; /* Cor mais escura para o hover */
    }
</style>

@endsection
