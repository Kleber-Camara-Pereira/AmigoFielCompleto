@extends('app')

@section('content')
<div class="container mt-7">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Painel para exibir os dados do animal -->
            <div class="bg-light rounded shadow" style="background-color: #f0f8ff; padding: 20px; margin-top: 80px;">
                <div class="text-center">
                    <h1>Detalhes do Animal</h1>
                </div>
                <div class="row">
                    @csrf
                    <!-- Foto do animal com um placeholder -->
                    <div class="col-md-4">
                        <img src="{{ url("storage/" . $animal->foto) }}" alt="Foto do Animal" class="img-fluid rounded">
                    </div>

                    <!-- Informações do animal -->
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nome</th>
                                    <td>{{ $animal->nome }}</td>
                                </tr>
                                <tr>
                                    <th>Raça</th>
                                    <td>{{ $animal->raca }}</td>
                                </tr>
                                <tr>
                                    <th>Idade</th>
                                    <td>{{ $animal->idade }} anos</td>
                                </tr>
                                <tr>
                                    <th>Sexo</th>
                                    <td>{{ $animal->sexo }}</td>
                                </tr>
                                <tr>
                                    <th>Temperamento</th>
                                    <td>{{ $animal->temperamento }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($animal->status == 'Adotado')
                                            <span class="badge bg-success">Adotado</span>
                                        @elseif ($animal->status == 'Disponível')
                                            <span class="badge bg-warning text-dark">Disponível</span>
                                        @else
                                            <span class="badge bg-secondary">Indefinido</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Botão para voltar -->
            <div class="text-center mt-4">
                <a href="{{ route('animals.index') }}" class="btn btn-secondary">Voltar à lista</a>
            </div>
            @if (auth()->user()->is_admin == 1)
                <div class="text-center mt-4">
                    <a href="{{ route('animals.atualizar', $animal->id) }}" class="btn btn-primary">Editar</a>
                </div>
            @else
                <!-- Formulário para solicitar adoção -->
                <div class="text-center mt-4">
                    <form action="{{ route('solicitacoes.store') }}" method="POST">
                        @csrf

                        <!-- Campos ocultos para enviar os IDs do usuário e do animal -->
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="animal_id" value="{{ $animal->id }}">

                        <!-- Botão para enviar a solicitação de adoção -->
                        <button type="submit" class="btn btn-primary">Solicitar Adoção</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
