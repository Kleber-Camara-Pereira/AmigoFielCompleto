@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-light rounded shadow" style="background-color: #b0c4e1; padding: 20px; margin-top: 50px; margin-bottom: 50px;">
                <h1 class="text-center">Cadastrar Novo Animal</h1>

                <form method="POST" action="{{ route('animals.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Nome do Animal -->
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control rounded" placeholder="Ex: Rex" required maxlength="255">
                    </div>

                    <!-- Espécie do Animal -->
                    <div class="mb-3">
                        <label for="especie" class="form-label">Espécie</label>
                        <input type="text" id="especie" name="especie" class="form-control rounded" placeholder="Ex: Cachorro" required maxlength="255">
                    </div>

                    <!-- Raça do Animal -->
                    <div class="mb-3">
                        <label for="raca" class="form-label">Raça</label>
                        <input type="text" id="raca" name="raca" class="form-control rounded" placeholder="Ex: Labrador" required maxlength="255">
                    </div>

                    <!-- Idade do Animal -->
                    <div class="mb-3">
                        <label for="idade" class="form-label">Idade</label>
                        <input type="number" id="idade" name="idade" class="form-control rounded" placeholder="Ex: 5" required min="0" maxlength="255">
                    </div>

                    <!-- Sexo do Animal -->
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select id="sexo" name="sexo" class="form-select rounded" required>
                            <option value="" disabled selected>Selecione o sexo</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>

                    <!-- Temperamento do Animal -->
                    <div class="mb-3">
                        <label for="temperamento" class="form-label">Temperamento</label>
                        <input type="text" id="temperamento" name="temperamento" class="form-control rounded" placeholder="Ex: Amigável, tímido" required maxlength="255">
                    </div>

                    <!-- Foto do Animal -->
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control rounded" accept="image/*" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Cadastrar Animal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
