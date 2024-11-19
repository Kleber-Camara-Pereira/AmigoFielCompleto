@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-light rounded shadow" style="background-color: #b0c4e1; padding: 20px; margin-top: 50px; margin-bottom: 50px;">
                <h1 class="text-center">Criar Novo Usuário</h1>

                <form id="userForm" method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" id="name" name="name" class="form-control rounded" placeholder="Ex: João Silva" required maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control rounded" placeholder="Ex: joao.silva@email.com" required maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" id="password" name="password" class="form-control rounded" placeholder="Mínimo 8 caracteres" maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control rounded" placeholder="Ex: 123.456.789-00" required maxlength="255">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="text" id="phone" name="phone" class="form-control rounded" placeholder="Ex: (11) 91234-5678" required maxlength="255">
                    </div>

                    <fieldset class="border p-3 mb-3 rounded" style="border-radius: 10px;">
                        <legend class="w-auto">Endereço</legend>

                        <div class="mb-3">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" id="cep" name="cep" class="form-control rounded" placeholder="Ex: 01234-567" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label for="rua" class="form-label">Rua</label>
                            <input type="text" id="rua" name="rua" class="form-control rounded" placeholder="Ex: Avenida Brasil" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label for="numero" class="form-label">Número</label>
                            <input type="text" id="numero" name="numero" class="form-control rounded" placeholder="Ex: 123" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" id="bairro" name="bairro" class="form-control rounded" placeholder="Ex: Centro" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label for="municipio" class="form-label">Município</label>
                            <input type="text" id="municipio" name="municipio" class="form-control rounded" placeholder="Ex: São Paulo" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select id="estado" name="estado" class="form-select rounded" required>
                                <option value="" disabled selected>Selecione o estado</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                    </fieldset>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
