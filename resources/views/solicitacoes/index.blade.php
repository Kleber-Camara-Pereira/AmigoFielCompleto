@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-light rounded shadow" style="background-color: #b0c4e1; padding: 20px; margin-top: 50px; margin-bottom: 50px;">
                <h1 class="text-center">Solicitações de Adoção</h1>

                <!-- Formulário de Filtro Centralizado -->
                <form method="GET" action="{{ route('solicitacoes.index') }}" class="mb-4 text-center">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <select name="situacao" class="form-select" aria-label="Filtrar por Situação">
                                <option value="">Todas as Situações</option>
                                <option value="Em analise" {{ request('situacao') == 'Em analise' ? 'selected' : '' }}>Em Análise</option>
                                <option value="Aprovada" {{ request('situacao') == 'Aprovada' ? 'selected' : '' }}>Aprovada</option>
                                <option value="Rejeitada" {{ request('situacao') == 'Rejeitada' ? 'selected' : '' }}>Rejeitada</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome do Usuário</th>
                            <th>Nome do Animal</th>
                            <th>Situação</th>
                            <th>Ações</th> <!-- Coluna para os botões -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitacoes as $solicitacao)
                        <tr>
                            <td>{{ $solicitacao->user->name }}</td> <!-- Nome do usuário -->
                            <td>{{ $solicitacao->animal->nome }}</td> <!-- Nome do animal -->
                            <td>
                                @if ($solicitacao->situacao == 'Em analise')
                                    <span class="badge bg-warning text-dark">Em Análise</span>
                                @elseif ($solicitacao->situacao == 'Aprovada')
                                    <span class="badge bg-success">Aprovada</span>
                                @else
                                    <span class="badge bg-danger">Rejeitada</span>
                                @endif
                            </td>
                            <td class="text-end"> <!-- Alinha os botões à direita -->
                                <!-- Formulário para aceitar a solicitação -->
                                <form action="{{ route('solicitacoes.aceitar', $solicitacao->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Aceitar</button>
                                </form>

                                <!-- Formulário para rejeitar a solicitação -->
                                <form action="{{ route('solicitacoes.recusar', $solicitacao->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Rejeitar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Links de paginação -->
                <div class="d-flex justify-content-center">
                    {{ $solicitacoes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
