@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-light rounded shadow" style="background-color: #b0c4e1; padding: 20px; margin-top: 50px; margin-bottom: 50px;">
                <div class="text-center">
                    <h1>Login</h1>
                </div>

                <form id="loginForm">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" id="password" name="password" class="form-control rounded" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('loginForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const response = await fetch("{{ route('auth.authorize') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email, password, device_name: 'web' })
        });

        if (response.ok) {
            const data = await response.json();
            // Armazena o token e o email no localStorage
            localStorage.setItem('token', data.token);
            localStorage.setItem('id', data.user_id);
            
            window.location.href = '{{ route('index') }}'; // por exemplo
        } else {
            // Lida com o erro
            const errorData = await response.json();
            alert(errorData.message || 'Erro no login.');
        }
    });
</script>
@endsection
