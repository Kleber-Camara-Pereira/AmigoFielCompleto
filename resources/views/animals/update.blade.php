@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-light rounded shadow" style="background-color: #b0c4e1; padding: 20px; margin-top: 50px; margin-bottom: 50px;">
                <h1 class="text-center">Atualizar Dados do Animal</h1>

                <form method="POST" action="{{ route('animals.update', $animal->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nome do Animal -->
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control rounded" placeholder="Ex: Rex" value="{{ old('nome', $animal->nome) }}" required maxlength="255">
                    </div>

                    <!-- Espécie do Animal -->
                    <div class="mb-3">
                        <label for="especie" class="form-label">Espécie</label>
                        <input type="text" id="especie" name="especie" class="form-control rounded" placeholder="Ex: Cachorro" value="{{ old('especie', $animal->especie) }}" required maxlength="255">
                    </div>

                    <!-- Raça do Animal -->
                    <div class="mb-3">
                        <label for="raca" class="form-label">Raça</label>
                        <input type="text" id="raca" name="raca" class="form-control rounded" placeholder="Ex: Labrador" value="{{ old('raca', $animal->raca) }}" required maxlength="255">
                    </div>

                    <!-- Idade do Animal -->
                    <div class="mb-3">
                        <label for="idade" class="form-label">Idade</label>
                        <input type="number" id="idade" name="idade" class="form-control rounded" placeholder="Ex: 5" value="{{ old('idade', $animal->idade) }}" required min="0" maxlength="255">
                    </div>

                    <!-- Sexo do Animal -->
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select id="sexo" name="sexo" class="form-select rounded" required>
                            <option value="M" {{ old('sexo', $animal->sexo) == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('sexo', $animal->sexo) == 'F' ? 'selected' : '' }}>Feminino</option>
                        </select>
                    </div>

                    <!-- Temperamento do Animal -->
                    <div class="mb-3">
                        <label for="temperamento" class="form-label">Temperamento</label>
                        <input type="text" id="temperamento" name="temperamento" class="form-control rounded" placeholder="Ex: Amigável, tímido" value="{{ old('temperamento', $animal->temperamento) }}" required maxlength="255">
                    </div>

                    <!-- Foto do Animal (somente se desejar alterar) -->
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control rounded" accept="image/*">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Atualizar Animal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
